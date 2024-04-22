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
        .product-image {
            max-width: 200px;
            height: auto;
        }

        .form-box {
            background-color: #f8f9fa;
            padding: 10px 12px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>

</head>
<body>
    <div class="page-content" id="content">
        <div class="container my-4">
        <div class="col">
                        <div class="text-dark">
                            <h1 class="display-4 fw-bold text-dark text-center mt-3 mb-3"><i class="bi bi-info-circle" style="font-size: 2.8rem;"></i> ITEM DETAILS</h1>
                        </div>
                    </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="item-name" class="form-label"><i class="bi bi-card-heading"></i> <b>Item Name</b></label>
                        <div class="form-box" readonly><?php echo $item['itemName']; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="item-description" class="form-label"><i class="bi bi-card-text"></i> <b>Description</b></label>
                        <div class="form-box" readonly><?php echo $item['ItemDescription']; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="item-category" class="form-label"><i class="bi bi-tag"></i> <b>Category</b></label>
                        <div class="form-box" readonly></b><?php echo $item['category']; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="contact_number" class="form-label"><i class="bi bi-telephone"></i> <b>Contact Number</b></label>
                        <div class="form-box" readonly></b><?php echo $item['owner_contact']; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="item-pickup-location" class="form-label"><i class="bi bi-pin-map"></i> <b>Pick Up Location</b></label>
                        <div class="form-box" readonly></b>Barangay Hall/Gym</div>
                    </div>
                    <div class="mb-3">
                        <label for="item-ownedby" class="form-label"><i class="bi bi-person-circle"></i> <b>Owned By</b></label>
                        <div>
                            <span class="badge align-items-center text-light-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
                                <?php echo '<a href="otherprofile.php?userID=' . $item['userID'] . '">';
                                echo $item['owner_name'];
                                echo '</a>'; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-image"></i> <b>Item Image</b></label>
                        <div class="d-flex justify-content-center">
                        <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="rounded" style="max-width: 540px;" height="490px" alt="<?php echo $item['itemName']; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>