<?php
include "1db.php";

if (isset($_GET['requestId'])) {
    $requestID = $_GET['requestId'];

    // Query to fetch request details, item information, and borrow details from the database
    $query = "SELECT r.*, b.*, i.*, u.username, i.itemID AS item_id, i.itemName AS item_name, i.itemImage_path AS item_image
              FROM Request r
              JOIN borrow b ON r.requestID = b.requestID
              JOIN item i ON r.itemID = i.itemID
              JOIN user u ON r.userID = u.userID
              WHERE r.requestID = $requestID";

    // Execute the query
    $result = $conn->query($query);

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
        $borrowDuration = $row['borrowDuration']; // Get the borrow duration
        $borrowPrice = number_format($row['borrowPrice'], 2); 

        // Output the modal content
        ?>
        <div class="row">
            <!-- Item picture and request detail -->
            <div class="col-md-12">
                <!-- Item picture -->
                <h5 class="fw-bold mb-3 text-center">Requested Item:</h5>
                <div class="text-center mb-3">
                    <img src="pictures/<?php echo $itemImage; ?>" class="img-fluid rounded" alt="Item Image" style="max-width: 300px;">
                </div>

                <!-- Request detail -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th><span class="bi bi-box"></span> Item Name</th>
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
                                <th><span class="bi bi-hourglass"></span> Borrow Duration</th>
                                <td class="text-center"><?php echo $borrowDuration; ?> days</td>
                            </tr>
                            <tr>
                                <th><span class="bi bi-cash-coin"></span> Borrow Price</th>
                                <td class="text-center">₱<?php echo $borrowPrice; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr class="my-4">
      

        <!-- Accept and Decline Buttons -->
        <div class="d-flex justify-content-center mt-4">
            <button type="button" class="btn btn-success me-2" id="acceptButton">Accept</button>
            <button type="button" class="btn btn-danger me-2" id="declineButton">Decline</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

<style>
    .card-link {
        text-decoration: none;
        color: inherit;
    }

    .card-link:hover .card {
        transform: translateY(-5px);
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.2);
    }

    .bi-arrow-left-right {
        font-size: 1.2rem;
        margin-right: 5px;
    }

    .bi-arrows-exchange {
        font-size: 1.5rem;
        margin-left: 5px;
    }

    .bi-person-circle {
        font-size: 1.2rem;
        margin-right: 5px;
    }
</style>

<script>
    $(document).ready(function() {
        // Handle Accept button click
        $('#acceptButton').click(function() {
            var requestID = $('#requestID').val();
            if (confirm('Are you sure you want to accept this request?')) {
                $.ajax({
                    type: 'POST',
                    url: 'upBorrow.php', // Update the URL to the appropriate PHP script
                    data: {
                        requestID: requestID,
                        status: 'Accepted'
                    },
                    success: function(response) {
                        // Handle the successful update
                        console.log(response);
                        if (response === "success") {
                            location.reload(); // Reload the page to reflect the updated status
                        } else {
                            alert("Failed to update request status");
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle the error
                        console.error(xhr.responseText);
                        alert("Error updating request status");
                    }
                });
            }
        });

        // Handle Decline button click
        $('#declineButton').click(function() {
            var requestID = $('#requestID').val();
            if (confirm('Are you sure you want to decline this request?')) {
                $.ajax({
                    type: 'POST',
                    url: 'upBorrow.php', // Update the URL to the appropriate PHP script
                    data: {
                        requestID: requestID,
                        status: 'Declined'
                    },
                    success: function(response) {
                        // Handle the successful update
                        console.log(response);
                        if (response === "success") {
                            location.reload(); // Reload the page to reflect the updated status
                        } else {
                            alert("Failed to update request status");
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle the error
                        console.error(xhr.responseText);
                        alert("Error updating request status");
                    }
                });
            }
        });
    });
</script>