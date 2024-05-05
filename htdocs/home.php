<?php
include "nav.php";

function getRandomItemImage($conn, $category)
{
    $sql = "SELECT itemImage_path FROM item WHERE itemAvailability = 'Available' AND category = ? ORDER BY RAND() LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['itemImage_path'];
}

// Retrieve the top 6 most occurring categories
$categorySql = "SELECT category, COUNT(*) AS count FROM item WHERE itemAvailability = 'Available' GROUP BY category ORDER BY count DESC LIMIT 6";
$categoryResult = $conn->query($categorySql);
$topCategories = $categoryResult->fetch_all(MYSQLI_ASSOC);
$categorySql = "SELECT category, COUNT(*) AS count FROM item WHERE itemAvailability = 'Available' GROUP BY category ORDER BY count DESC LIMIT 6";
$categoryResult = $conn->query($categorySql);
$topCategories = $categoryResult->fetch_all(MYSQLI_ASSOC);

// Get 10 most recent items that the user does not own and are available
$sql = "SELECT * FROM item WHERE itemAvailability = 'Available' AND userID != ? ORDER BY DateTimePosted DESC LIMIT 10";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$items = $result->fetch_all(MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
</head>

<style>
    <?php include "additem.css"; ?><?php include "find.css"; ?>
    
    body {
        padding-bottom: 1rem;
        min-height: 100vh;
        overflow-x: hidden;
        background-color: #f5f5f5;
    }

    /* Box */
    .box {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .card {
        height: 100%;
        display: flex;
        flex-direction: column;
        border-radius: 0px;
    }

    body {
        font-family: Arial, sans-serif;
    }

    .item:hover {
        transform: translateY(-5px);
        transition: transform 0.4s;
    }

    #category-image {
        max-width: 100px;
        height: 100px;
        object-fit: cover;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<body>


    <main>
        <div class="page-content" id="content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="py-4 px-3 text-white">
                            <h1 class="display-4 fw-bold text-dark text-center">DAILY DISCOVER</h1>
                            <p class="lead text-center text-secondary">Explore our daily selection of items</p>
                        </div>
                    </div>
                </div>

                <!--- Item Display --->
                <div class="container">
                    <div class="row row-cols-2 row-cols-md-6 g-1">
                        <?php if (empty($items)) { ?>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">No Item</h5>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <?php foreach ($items as $item) { ?>

                                <!-- Item Card -->
                                <div class="col">
                                    <div class="card" data-bs-toggle="modal" data-bs-target="#itemDetailModal" onclick="populateModal('<?php echo $item['itemName']; ?>', '<?php echo $item['itemImage_path']; ?>', '<?php echo $item['itemQuantity']; ?>', '<?php echo $item['requestType']; ?>', '<?php echo $item['itemID']; ?>')">
                                        <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="card-img-top" alt="<?php echo $item['itemName']; ?>" style="border-radius: 0px;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $item['itemName']; ?></h5>
                                            <div class="rating">
                                                <?php
                                                $itemID = $item['itemID'];
                                                // Query for average rating
                                                $averageQuery = "SELECT AVG(rate) AS averageRating, COUNT(*) AS totalRatings FROM itemRating WHERE itemID = ?";
                                                $averageStmt = $conn->prepare($averageQuery);
                                                $averageStmt->bind_param("i", $itemID);
                                                $averageStmt->execute();
                                                $averageResult = $averageStmt->get_result();
                                                $row = $averageResult->fetch_assoc();
                                                $averageRating = $row["averageRating"];
                                                $totalRatings = $row["totalRatings"];
                                                $averageStmt->close();
                                                ?>
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
                                                }
                                                // Display total number of ratings
                                 
                                              
                                                ?>
                                            </div>
                                            <?php echo "<div> <span class='ms-1 text-secondary'><small>({$totalRatings} rated)</small></span></div>"; ?>

                                            <div class="mb-2"></div>
                                            <div>
                                                <p class="text-secondary mb-1"><i class="bi bi-tags-fill"></i> <small><b></b> <?php echo $item['category']; ?></small></p>
                                                <div class="text-secondary mb-0">
                                                    <small><b></b></small>
                                                    <?php foreach (explode(',', $item['requestType']) as $t) {
                                                        switch (trim($t)) {
                                                            case 'Barter':
                                                                $c = 'bg-dark';
                                                                break;
                                                            case 'Borrow':
                                                                $c = 'bg-success';
                                                                break;
                                                            case 'Buy':
                                                                $c = 'bg-danger';
                                                                break;
                                                            default:
                                                                $c = 'bg-secondary';
                                                        }
                                                        echo '<span class="ms-1 badge ' . $c . '">' . trim($t) . '</span>';
                                                    } ?>
                                                </div>

                                            </div>
                                            <p style="display: none;"><i class="bi bi-calendar"></i> Date Time Posted: <span style="display: none;" class="upload-date"><?php echo date("F j, Y, g:i a", strtotime($item['DateTimePosted'])); ?></span></p>
                                            <p class="text-start text-secondary mb-0">
                                                <?php
                                                $availability = $item['itemAvailability'];
                                                $badgeColor = ($availability == 'Available') ? 'bg-success -subtle text-light -emphasis' : 'bg-danger -subtle text-light -emphasis';
                                                echo "<span style='display: none;' class='badge $badgeColor rounded-pill'>$availability</span>";
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <?php include "finddetailmodal.php"; ?>
                    <!--- Categories --->
                    <div class="row mt-4">
                        <div class="col">
                            <div class="text-dark">
                                <h1 class="display-4 fw-bold text-dark text-center">TOP CATEGORIES</h1>
                                <p class="lead text-secondary text-center mb-0">Explore our top category of items</p>
                            </div>
                        </div>
                        <div class="row row-cols-3 row-cols-sm-4 row-cols-md-5 row-cols-lg-6 g-1 mt-2">
                            <?php foreach ($topCategories as $category) { ?>
                                <div class="col">
                                    <a href="finditem.php?sort_by=item_category&category=<?php echo urlencode($category['category']); ?>" class="text-decoration-none">
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-body text-center">
                                                <?php
                                                $randomImage = getRandomItemImage($conn, $category['category']);
                                                ?>
                                                <img id="category-image" src="pictures/<?php echo $randomImage; ?>" class="img-fluid rounded-circle mb-3" alt="<?php echo $category['category']; ?>">
                                                <h5 class="card-title text-dark" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo $category['category']; ?></h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3"></div>
                        <!--- End of Category --->
                    </div>
    </main>
    </div>
</body>

</html>