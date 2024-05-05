<?php include "nav.php";

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
        <?php include "find.css"; ?>.rating>label {
            font-size: 20px;
            padding: 3px;
        }
    </style>
</head>

<body>




    <div class="page-content" id="content">
        <!-- Your HTML content -->
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
                                    <p><i class="bi bi-cash"></i> <b>Maintenance Fee:</b> ₱<?php echo number_format($item['borrowPrice'], 2); ?></p>
                                    <p><i class="bi-clock"></i> <b>Borrow Duration:</b> <?php echo $item['borrowDuration']; ?> Day/s</p>
                                <?php endif; ?>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center d-grid gap-1 col-7 mx-auto">
                                <button type="button" class="btn btn-outline-dark <?php echo !in_array('Barter', explode(',', $item['requestType'])) ? 'disabled' : ''; ?>" data-bs-toggle="modal" data-bs-target="#barterModal" <?php echo !in_array('Barter', explode(',', $item['requestType'])) ? 'disabled' : ''; ?>>Barter</button>
                                <button type="button" class="btn btn-outline-success <?php echo !in_array('Borrow', explode(',', $item['requestType'])) ? 'disabled' : ''; ?>" data-bs-toggle="modal" data-bs-target="#borrowModal" <?php echo !in_array('Borrow', explode(',', $item['requestType'])) ? 'disabled' : ''; ?>>Borrow</button>
                                <button type="button" class="btn btn-outline-danger <?php echo !in_array('Buy', explode(',', $item['requestType'])) ? 'disabled' : ''; ?>" data-bs-toggle="modal" data-bs-target="#buyRequestModal" <?php echo !in_array('Buy', explode(',', $item['requestType'])) ? 'disabled' : ''; ?>>Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div><?php
                include "bartermodals.php"; ?>
        </div>
        <div><?php
                include "borrowmodals.php"; ?>
        </div>
        <div><?php
                include "buymodals.php"; ?>
        </div>

        <!-- Closing div tag for the row -->

        <div class="container text-start mt-0">
            <table class="table table-borderless table-bg-transparent">
                <thead>
                    <tr>
                        <th class="h4 fw-bold text-center" id="specs-header"><b>OVERALL RATING</b>
                            <?php
                            // Open the database connection
                            include "1db.php";

                            // Check if the connection was successful
                            if (!$conn) {
                                // Handle connection error
                                echo 'Database connection error: ' . mysqli_connect_error();
                                exit;
                            }

                            // Prepare and execute the query to fetch the average rating
                            $averageQuery = "SELECT AVG(rate) AS averageRating, COUNT(*) AS totalRatings FROM itemRating WHERE itemID = ?";
                            $averageStmt = $conn->prepare($averageQuery);
                            $averageStmt->bind_param("i", $itemID);
                            $averageStmt->execute();
                            $averageResult = $averageStmt->get_result();
                            $row = $averageResult->fetch_assoc();
                            $averageRating = $row["averageRating"];
                            $totalRatings = $row["totalRatings"];
                            $averageStmt->close();

                            // Close the database connection
                            mysqli_close($conn);

                            // Display the stars based on the average rating
                            ?>
                            <div class="rating">
                                <?php
                                // Loop to display stars based on average rating
                                for ($i = 1; $i <= 5; $i++) {
                                    echo "<label for='star{$i}'><i class='fas fa-star";
                                    // Add 'text-warning' class if average rating is not null and greater than or equal to current star value
                                    if ($averageRating !== null && $averageRating >= $i) {
                                        echo " text-warning"; // Add 'text-warning' class to color the star yellow
                                    }
                                    echo "'></i></label>";
                                    echo "<input type='radio' name='rating' id='star{$i}' value='{$i}'";
                                    // Mark the radio button as checked if average rating is not null and greater than or equal to current star value
                                    if ($averageRating !== null && $averageRating >= $i) {
                                        echo " checked";
                                    }
                                    echo ">";
                                }
                                // Display the average rating with one decimal place, if not null
                                if ($averageRating !== null) {
                                    $averageRatingFormatted = number_format($averageRating, 1);
                                    echo "<span class='text-warning ms-1'><small>{$averageRatingFormatted}/5.0</small></span>";
                                    echo "<span class='ms-1'><small>({$totalRatings} rated)</small></span>";
                                }
                                ?>
                            </div>

                        </th>
                    </tr>
                </thead>
                <br>
                <tbody id="review-table">
                    <?php
                    include "1db.php";

                    // Check if the connection was successful
                    if (!$conn) {
                        // Handle connection error
                        echo 'Database connection error: ' . mysqli_connect_error();
                        exit;
                    }
                    $query = "SELECT itemRating.*, user.username , user.userImage_path
                          FROM itemRating 
                          JOIN user ON itemRating.userID = user.userID 
                          JOIN item ON itemRating.itemID = item.itemID
                          WHERE itemRating.itemID = ?
                          ORDER BY itemRating.DateTimeRate DESC";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $itemID);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Check if there are any reviews for the current item
                    if ($result->num_rows > 0) {
                        // Loop through each review and output the HTML for each
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-10 mb-3 mb-sm-0">
                                            <div class="card shadow-lg">
                                                <div class="card-header">
                                                    <div class="d-flex align-items-center">
                                                        <img id="modalUserImages" src="picture/<?php echo $row['userImage_path']; ?>" alt="Owner's Profile Image" class="img-fluid rounded-circle me-2" style="width: 40px; height: 40px; border: 1px solid #ccc;">

                                                        <a href="otherprofile.php?userID=<?php echo $row['userID']; ?>" class="h5 fw-bold link-offset-2 link-underline link-underline-opacity-0 pt-1"><?php echo $row['username']; ?></a>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <div class="d-flex align-items-start">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="d-flex flex-column align-items-start">
                                                                    <div class="d-flex align-items-center mb-1
                                                                    ">
                                                                        <?php
                                                                        // Output star ratings based on the review rating
                                                                        $rating = $row['rate'];
                                                                        for ($i = 1; $i <= 5; $i++) {
                                                                            echo "<i class='bi bi-star-fill text-warning";
                                                                            // Add 'text-muted' class to empty stars
                                                                            if ($i > $rating) {
                                                                                echo " text-muted";
                                                                            }
                                                                            echo "' style='padding: 2px; font-size: 1.2rem;'></i>";
                                                                        }
                                                                        ?>
                                                                        <span class="text-warning ms-2"><?php echo $rating; ?></span>
                                                                    </div>
                                                                    <p><?php echo $row['comment']; ?></p>
                                                                    <div class="mt-2">
                                                                        <img id="" src="rate/<?php echo $row['rate_path']; ?>" alt="rate" class="img-fluid" style="width: 100px; height: 100px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Display review datetime -->
                                                <div class="card-footer">
                                                    <div class="d-flex align-items-center">
                                                        <small class="text-muted"><?php echo date('F j, Y, g:i a', strtotime($row['DateTimeRate'])); ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
        </div>

<?php
                        }
                    } else {
                        // If there are no reviews for the current item, display a message
                        echo "<tr><td colspan='2'>No reviews found for this item.</td></tr>";
                    }
                    // Close the prepared statement
                    $stmt->close();
?>
</tbody>
</table>
    </div>
    </div>
</body>

</html>