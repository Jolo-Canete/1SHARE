<?php
include "1db.php";

if (isset($_GET['requestId'])) {
    $requestID = $_GET['requestId'];

    // Query to fetch request details, item information, and buy details from the database
    $query = "SELECT r.*, b.*, i.*, u.username, i.itemID AS item_id, i.itemName AS item_name, i.itemImage_path AS item_image
              FROM Request r
              JOIN buy b ON r.requestID = b.requestID
              JOIN item i ON r.itemID = i.itemID
              JOIN user u ON r.userID = u.userID
              WHERE r.requestID = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $requestID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the row
        $row = $result->fetch_assoc();

        // Extract the information
        $requestType = $row['requestType'];
        $itemName = $row['item_name'];
        $username = $row['username'];
        $userID = $row['userID'];
        $itemImage = $row['item_image'];
        $requestDateTime = $row['request_DateTime'];
        $dateMeet = $row['DateTimeMeet'];
        $buyPrice = number_format($row['buyPrice'], 2);
        $quantity = $row['quantity'];
        $totals = $row['buyPrice'] * $row['quantity'];
        $total =      number_format($totals, 2);

        // Output the modal content
?>

        <style>
            .modal .table-responsive {
                margin-top: 20px;
            }

            .modal .table {
                border-radius: 0px;
                overflow: hidden;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .modal .table th,
            .modal .table td {
                padding: 12px 16px;
            }

            .modal .table th {
                background-color: #f5f5f5;
                font-weight: bold;
                color: #333;
            }

            .modal .table td {
                background-color: #fff;
                color: #666;
            }

            .modal .table .bi {
                font-size: 1.2rem;
                margin-right: 8px;
                vertical-align: middle;
            }

            .modal .table .badge {
                font-size: 0.9rem;
                padding: 4px 8px;
            }

            .modal-footer {
        position: sticky;
        bottom: 0;
        background-color: #fff;
    }
        </style>
        <div class="row">
            <!-- Item picture and request detail -->
            <div class="col-md-12">
                <!-- Item picture -->
                <h4 class="fw-bold text-dark text-center mb-2">Requested Item</h4>
                <div class="text-center mb-3">
                    <img src="pictures/<?php echo $itemImage; ?>" class="img-fluid shadow-sm" alt="Item Image" style="max-width: 300px;">
                </div>

                <!-- Request detail -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th><span class="bi bi-card-heading"></span> Item Name</th>
                                <td class="text-center"><?php echo $itemName; ?></td>
                            </tr>
                            <tr>
                                <th><span class="bi bi-person-circle"></span>Requested by</th>
                                <td class="text-center">
                                    <a href="otherprofile.php?userID=<?php echo $userID; ?>" target="_blank"><span class="badge align-items-center text-light-emphasis bg-primary-subtle border border-primary-subtle rounded-pill"><?php echo $username; ?></a>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th><span class="bi bi-calendar-event"></span> Requested on</th>
                                <td class="text-center"><?php echo date('F j, Y, g:i a', strtotime($requestDateTime)); ?></td>
                            </tr>
                            <tr>
                                <th><span class="bi bi-pin-map-fill"></span> Meet at</th>
                                <td class="text-center">Barangay Hall/Gym</td>
                            </tr>
                            <tr>
                                <th><span class="bi bi-calendar-event"></span> Meet on</th>
                                <td class="text-center"><?php echo date('F j, Y, g:i a', strtotime($dateMeet)); ?></td>
                            </tr>
                            <tr>
                                <th><span class="bi bi-cash-coin"></span> Buy Price</th>
                                <td class="text-center">₱<?php echo $buyPrice; ?></td>
                            </tr>
                            <tr>
                                <th><span class="bi bi-box"></span> Item Requested Quantity</th>
                                <td class="text-center"><?php echo $quantity; ?></td>
                            </tr>
                            <tr>
                                <th><span class="bi bi-cash"></span> Price Total:</th>
                                <td class="text-center">₱<?php echo $total; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal-footer">
        <div class="d-flex justify-content-center mt-2">
            <?php

            if (isset($_GET['requestId'])) {
                $requestID = $_GET['requestId'];

                // Fetch the request details
                $query = "SELECT r.requestType 
  FROM Request r
  WHERE r.requestID = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $requestID);
                $stmt->execute();
                $stmt->bind_result($requestType);
                $stmt->fetch();
                $stmt->close();
            }

            ?>
            <?php
            $currentDate = new DateTime();
            $meetingDate = new DateTime($dateMeet);

            if ($meetingDate <= $currentDate) {
                $isButtonEnabled = true;
            } else {
                $isButtonEnabled = false;
            }
            ?>

            <button type="button" class="btn btn-primary me-2 <?php echo $isButtonEnabled ? '' : 'disabled'; ?>" id="openButton" onclick="redirectToTransaction('<?php echo $requestType; ?>', '<?php echo $requestID; ?>')">Confirmation</button>

            <script>
                function redirectToTransaction(requestType, requestID) {
                    switch (requestType) {
                        case 'Barter':
                            window.open('receivebarter.php?requestId=' + requestID, );
                            break;
                        case 'Borrow':
                            window.open('receiveborrow.php?requestId=' + requestID, );
                            break;
                        case 'Buy':
                            window.open('receivebuy.php?requestId=' + requestID, );
                            break;
                        default:
                            alert('Invalid request type.');
                            break;
                    }
                }
            </script>
            
            <?php
            $currentDate = new DateTime();
            $meetingDate = new DateTime($dateMeet);

            // Set the time to the start of the day for both dates
            $currentDate->setTime(0, 0, 0);
            $meetingDate->setTime(0, 0, 0);

            if ($meetingDate <= $currentDate) {

                $isCancelButtonEnabled = false;
            } else {
                $isCancelButtonEnabled = true;
            }
            ?>

            <button type="button" class="btn btn-danger me-2 <?php echo $isCancelButtonEnabled ? '' : 'disabled'; ?>" id="cancelButton">Cancel</button>


            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>





        <input type="hidden" id="requestID" value="<?php echo $requestID; ?>">
<?php
    } else {
        // No results found
        echo "No data found for this request.";
    }
} else {
    // Request ID is not set or empty
    echo "Invalid request ID.";
}
?>
<script>
    function cancelRequest() {
        const requestID = document.getElementById('requestID').value;

        // Ask the user for confirmation before deleting the request
        if (confirm("Are you sure you want to cancel this transaction?")) {
            // Send an AJAX request to the server to delete the request
            $.ajax({
                url: 'canceltran.php',
                type: 'GET',
                data: {
                    requestId: requestID
                },
                success: function(data) {
                    if (data === 'success') {
                        // Request deletion was successful, you can display a success message or update the UI
                        alert('Transaction has been canceled successfully.');
                        // Reload the page
                        location.reload();
                    } else {
                        // There was an error deleting the request, display an error message
                        alert('Error canceling the request: ' + data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('An error occurred while canceling the request.');
                }
            });
        }
    }

    // Attach the cancelRequest function to the cancel button
    document.getElementById('cancelButton').addEventListener('click', cancelRequest);
</script>