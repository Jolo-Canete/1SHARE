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
        <div class="d-flex justify-content-center mt-4">
            <button type="button" class="btn btn-danger me-2" id="cancelButton">Cancel</button>
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
  function cancelRequest() {
  const requestID = document.getElementById('requestID').value;

  // Ask the user for confirmation before deleting the request
  if (confirm("Are you sure you want to cancel this request?")) {
    // Send an AJAX request to the server to delete the request
    $.ajax({
      url: 'deleteRequest.php',
      type: 'GET',
      data: { requestId: requestID },
      success: function(data) {
        if (data === 'success') {
          // Request deletion was successful, you can display a success message or update the UI
          alert('Request has been canceled successfully.');
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


