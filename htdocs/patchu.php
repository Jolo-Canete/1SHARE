<?php
include "1db.php";

if (isset($_GET['requestId'])) {
    $requestID = $_GET['requestId'];

    // Query to fetch request details, item information, and requester's items from the database
    $query = "SELECT r.*, b.*, i.*, u.username, i1.itemID AS item1_id, i1.itemName AS item1_name, i1.itemImage_path AS item1_image, 
                     i2.itemID AS item2_id, i2.itemName AS item2_name, i2.itemImage_path AS item2_image, 
                     i3.itemID AS item3_id, i3.itemName AS item3_name, i3.itemImage_path AS item3_image
              FROM Request r
              JOIN barter b ON r.requestID = b.requestID
              JOIN item i ON r.itemID = i.itemID
              JOIN user u ON r.userID = u.userID
              LEFT JOIN item i1 ON b.item1 = i1.itemID
              LEFT JOIN item i2 ON b.item2 = i2.itemID
              LEFT JOIN item i3 ON b.item3 = i3.itemID
              WHERE r.requestID = $requestID";

    // Execute the query
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch the row
        $row = $result->fetch_assoc();

        // Extract the information
        $requestType = $row['requestType'];
        $itemName = $row['itemName'];
        $username = $row['username'];
        $userID = $row['userID'];
        $itemImage = $row['itemImage_path'];
        $item1_id = $row['item1_id'];
        $item1_name = $row['item1_name'];
        $item1_image = $row['item1_image'];
        $item2_id = $row['item2_id'];
        $item2_name = $row['item2_name'];
        $item2_image = $row['item2_image'];
        $item3_id = $row['item3_id'];
        $item3_name = $row['item3_name'];
        $item3_image = $row['item3_image'];
        $requestDateTime = $row['request_DateTime'];
        $dateMeet = $row['DateTimeMeet'];

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
            <!-- Right side: Item picture and request detail -->
            <div class="col-md-6">
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
                                <th><span class="bi bi-calendar-event"></span>&nbsp;Requested on</th>
                                <td class="text-center"> <?php echo date('F j, Y, g:i a', strtotime($requestDateTime)); ?></td>
                            </tr>
                            <tr>
                                <th><span class="bi bi-pin-map-fill"></span>&nbsp;Meet at</th>
                                <td class="text-center"> Barangay Hall/Gym</td>
                            </tr>
                            <tr>
                                <th><span class="bi bi-calendar-event"></span>&nbsp;Meet on</th>
                                <td class="text-center"><?php echo date('F j, Y, g:i a', strtotime($dateMeet)); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Left side: Requester's items from the barter table -->
            <div class="col-md-6">
                <h4 class="fw-bold text-dark text-center mb-2">Requester's Item</h4>
                <div class="row gy-4">
                    <?php
                    // Output item details
                    if ($item1_id) {
                        echo "<div class='col-md-6'>
                                <div class='card h-100 shadow-sm'>
                                    <a href='detail.php?itemID=$item1_id' target='_blank' class='card-link'>
                                        <img src='pictures/$item1_image' class='card-img-top' alt='Item 1 Image' style='border-radius: 0px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'><span class='bi bi-arrow-left-right' style='font-size: 1rem;'></span> <strong></strong> $item1_name</h5>
                                        </div>
                                    </a>
                                </div>
                              </div>";
                    }
                    if ($item2_id) {
                        echo "<div class='col-md-6'>
                                <div class='card h-100 shadow-sm'>
                                    <a href='detail.php?itemID=$item2_id' target='_blank' class='card-link'>
                                        <img src='pictures/$item2_image' class='card-img-top' alt='Item 2 Image' style='border-radius: 0px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'><span class='bi bi-arrow-left-right' style='font-size: 1rem;'></span> <strong></strong> $item2_name</h5>
                                        </div>
                                    </a>
                                </div>
                              </div>";
                    }
                    if ($item3_id) {
                        echo "<div class='col-md-6'>
                                <div class='card h-100 shadow-sm'>
                                    <a href='detail.php?itemID=$item3_id' target='_blank' class='card-link'>
                                        <img src='pictures/$item3_image' class='card-img-top' alt='Item 3 Image' style='border-radius: 0px;'>
                                        <div class='card-body'>
                                            <h5 class='card-title'><span class='bi bi-arrow-left-right' style='font-size: 1rem;'></span> <strong></strong> $item3_name</h5>
                                        </div>
                                    </a>
                                </div>
                              </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
                    <div class="modal-footer">
        <div class="d-flex justify-content-center">
            <div class="d-flex align-items-center">
                <span class="bi bi-arrow-left me-2" style="font-size: 1.5rem;"></span>
                <hr class="flex-grow-1 me-2" style="height: 2px; background-color: #ccc;">
                <span class="bi bi-arrows-exchange" style="font-size: 1.5rem;"></span>
                <hr class="flex-grow-1 ms-2" style="height: 2px; background-color: #ccc;">
                <span class="bi bi-arrow-right ms-2" style="font-size: 1.5rem;"></span>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
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