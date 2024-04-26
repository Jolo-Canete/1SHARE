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

        <div class="d-flex justify-content-center mt-4">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>


        <input type="hidden" id="requestID" value="<?php echo $requestID; ?>">
<?php
    } else {
        // No results found
        echo "No data found for this request.";
    }
    $stmt->close();
} else {
    // Request ID is not set or empty
    echo "Invalid request ID.";
}
?>