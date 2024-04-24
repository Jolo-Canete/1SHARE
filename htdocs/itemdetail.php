<?php
include "nav.php";

// Check if itemID is provided in the query parameter
if (isset($_GET['itemID'])) {
    // Sanitize the input
    $itemID = $_GET['itemID'];

    $sql = "SELECT item.*, user.username AS owner_name, user.contactNumber AS owner_contact
    FROM item 
    JOIN user ON item.userID = user.userID 
    WHERE item.itemID = '$itemID'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the retrieved item details
        $item = mysqli_fetch_assoc($result);
    } else {
        // Handle error if itemID is not found
        echo 'Item not found';
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle error if itemID is not provided
    echo 'Item ID is required';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Detail</title>
    <style>
        <?php
        include "additem.css";
        ?>.review-container {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
        }

        .review-box {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .rating {
            color: #ffd700;
            /* Yellow color for stars */
        }

        .star {
            font-size: 20px;
            margin-right: 5px;
        }

        .star-empty {
            color: #ccc;
        }

        .overall-rating {
            font-size: 24px;
            margin-top: 20px;
            color: orangered;
            /* Yellow color for overall rating */
        }

        .no-items-message {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="page-content" id="content">

        <br>
        <div class="container text-center">
            <div class="row">

                <div class="d-none d-md-block col-12 col-md-6 ">
                    <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="rounded" style="max-width: 540px;" height="490px" alt="<?php echo $item['itemName']; ?>">
                </div>
                <div class="d-md-none col-12 col-md-6 ">
                    <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="img-fluid rounded" alt="<?php echo $item['itemName']; ?>">
                    <br> <br>
                </div>
                <br>
                <div class="col-12 col-md-6">
                    <div class="d-md-block card overflow-auto shadow-sm p-3 mb-3 bg-body-tertiary rounded border-0" style="max-width: 530px; height: 30.7rem;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="card-title text-start"><?php echo $item['itemName']; ?></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="card-text text-start text-secondary"><?php echo $item['ItemDescription']; ?></p>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <p class="text-start"><i class="bi bi-box-seam"></i> <b>Quantity: </b><?php echo $item['itemQuantity']; ?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p class="text-start"><i class="bi bi-tag"></i> <b>Category: </b><?php echo $item['category']; ?></p>
                                </div>
                            </div>
                            <p class="text-start"><i class="bi bi-telephone"></i> <b>Contact Number: </b><?php echo $item['owner_contact']; ?></p>
                            <p class="text-start"><i class="bi bi-pin-map"></i> <b>Pick up Location:</b> Barangay Hall/Gym</p>
                            <p class="text-start"><i class="bi bi-person-circle"></i> <b>Owned by:</b>&nbsp;
                                <span class="badge align-items-center text-light-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
                                    <?php echo '<a href="otherprofile.php?userID=' . $item['userID'] . '">';
                                    echo $item['owner_name'];
                                    echo '</a>'; ?>
                                </span>
                            </p>

                            <p class="text-start"><i class="bi bi-arrow-repeat"></i> <b>Request Type:</b>
                                <?php
                                $requestTypes = explode(',', $item['requestType']);
                                foreach ($requestTypes as $type) {
                                    $badgeColor = '';
                                    switch ($type) {
                                        case 'Barter':
                                            $badgeColor = 'bg-dark';
                                            break;
                                        case 'Borrow':
                                            $badgeColor = 'bg-success';
                                            break;
                                        case 'Buy':
                                            $badgeColor = 'bg-danger';
                                            break;
                                        default:
                                            $badgeColor = 'bg-secondary';
                                            break;
                                    }
                                    echo '<span class="badge rounded-pill ' . $badgeColor . ' me-1">' . $type . '</span>';
                                }
                                ?>
                                </span>
                                <!-- Display Buy Price and Borrow Price with Duration -->
                            <div class="text-start">
                                <?php if (in_array('Buy', explode(',', $item['requestType']))) : ?>
                                    <p><i class="bi bi-cash"></i> <b>Sell Price:</b> ₱<?php echo number_format($item['buyPrice'], 2); ?></p>
                                <?php endif; ?>

                                <?php if (in_array('Borrow', explode(',', $item['requestType']))) : ?>
                                    <p><i class="bi bi-cash"></i> <b>Borrow Price:</b> ₱<?php echo number_format($item['borrowPrice'], 2); ?></p>
                                    <p><i class="bi-clock"></i> <b>Borrow Duration:</b> <?php echo $item['borrowDuration']; ?> Day/s</p>
                                <?php endif; ?>
                            </div>
                            <!-- Barter, Borrow, Buy Buttons -->
                            <hr>
                            <div class="d-flex justify-content-center d-grid gap-2 col-4 mx-auto">
                                <button type="button" class="btn btn-outline-dark <?php echo !in_array('Barter', explode(',', $item['requestType'])) ? 'disabled' : ''; ?>" data-bs-toggle="modal" data-bs-target="#barterModal" <?php echo !in_array('Barter', explode(',', $item['requestType'])) ? 'disabled' : ''; ?>>Barter</button>
                                <button type="button" class="btn btn-outline-success <?php echo !in_array('Borrow', explode(',', $item['requestType'])) ? 'disabled' : ''; ?>" data-bs-toggle="modal" data-bs-target="#borrowModal" <?php echo !in_array('Borrow', explode(',', $item['requestType'])) ? 'disabled' : ''; ?>>Borrow</button>
                                <button type="button" class="btn btn-outline-danger <?php echo !in_array('Buy', explode(',', $item['requestType'])) ? 'disabled' : ''; ?>" data-bs-toggle="modal" data-bs-target="#buyRequestModal" <?php echo !in_array('Buy', explode(',', $item['requestType'])) ? 'disabled' : ''; ?>>Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <div class="text-center fw-bold">
                                Write your Review
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="mb-3">
                                    <label for="photoReview" class="form-label"><b>Add Photo (Optional)</b></label>
                                    <input class="form-control" type="file" id="photoReview">
                                </div>
                                <div class="mb-3">
                                    <label for="writeReview" class="form-label"><b>Write your review</b></label>
                                    <textarea class="form-control" id="writeReview" rows="3" placeholder="Would you like to write anything about this item?"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="rate" class="form-label"><b>Rate:</b>
                                        <i class="bi bi-star-fill text-warning" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-star-fill text-warning ms-1" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-star-fill text-warning ms-1" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-star-fill text-warning ms-1" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-star-fill text-warning ms-1" style="font-size: 1.2rem;"></i>
                                    </label>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <button class="btn btn-primary">Submit Review</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3"></div>
        </div>
    </div>
    <div><?php
            include "bartermodal.php"; ?>
    </div>
    <div><?php
            include "borrowmodal.php"; ?>
    </div>
    <div><?php
            include "buymodal.php"; ?>
    </div>




</body>

</html>