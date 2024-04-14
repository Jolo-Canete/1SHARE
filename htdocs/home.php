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
    <?php include "additem.css"; ?>body {
        padding-bottom: 1rem;
        min-height: 100vh;
        overflow-x: hidden;
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

    .rating>input {
        display: none;
    }

    .rating>label {
        font-size: 15px;
        color: #FFD700;
        display: inline-block;
        cursor: pointer;
    }

    .rating>input:checked~label {
        color: #f8de7e;
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

    .item img {
        border-radius: 5px;
        margin-bottom: 10px;
        width: 300px;
        height: 300px;
        object-fit: cover;
    }

    .item .content {
        text-align: center;
    }

    .item h3 {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .item p {
        font-size: 1.2rem;
        color: #666;
    }
</style>

<body>
    <header>

    </header>

    <main>
        <div class="page-content" id="content">
            <div class="mt-4"></div>
            <div class="container">
                <?php
                // SQL query to retrieve three random available items excluding those posted by the current user
                $carouselSql = "SELECT * FROM item WHERE itemAvailability = 'Available' AND userID != ? ORDER BY RAND() LIMIT 4";
                $stmt = $conn->prepare($carouselSql);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $carouselResult = $stmt->get_result();
                $carouselItems = $carouselResult->fetch_all(MYSQLI_ASSOC);
                ?>
                <div class="col">
                    <div class="text-dark">
                        <h1 class="display-4 fw-bold text-dark text-center">ADD TO CART NOW!</h1>
                        <p class="lead text-secondary text-center mb-5">Explore our items and add to cart now!</p>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($carouselItems as $index => $item) { ?>
                        <div class="col-6 col-md-3 item">
                            <img src="pictures/<?php echo $item['itemImage_path']; ?>" alt="<?php echo $item['itemName']; ?>" class="img-fluid shadow-lg">
                            <div class="content">
                                <h3 class="display-4 fw-bold text-dark text-center mb-1"><?php echo $item['itemName']; ?></h3>
                                <p><a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary lead" href="itemdetail.php?id=<?php echo $item['itemID']; ?>"><small>Shop Now</small></a></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!--- Categories --->
                <div class="row">
                    <div class="col">
                        <div class="text-dark">
                            <h1 class="display-4 fw-bold text-dark text-center">TOP CATEGORIES</h1>
                            <p class="lead text-secondary text-center mb-0">Explore our top category of items</p>
                        </div>
                    </div>
                    <div class="row row-cols-3 row-cols-sm-4 row-cols-md-5 row-cols-lg-6 g-4">
                        <?php foreach ($topCategories as $category) { ?>
                            <div class="col">
                                <a href="finditem.php?sort_by=item_category&category=<?php echo urlencode($category['category']); ?>" class="text-decoration-none">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body text-center">
                                            <?php
                                            $randomImage = getRandomItemImage($conn, $category['category']);
                                            ?>
                                            <img src="pictures/<?php echo $randomImage; ?>" class="img-fluid rounded-circle mb-3" width="100" height="100" alt="<?php echo $category['category']; ?>">
                                            <h5 class="card-title text-dark" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo $category['category']; ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <!--- End of Category --->

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
                        <div class="row row-cols-3 row-cols-sm-4 row-cols-md-5 row-cols-lg-6 g-4">
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
                                        <div class="card" data-bs-toggle="modal" data-bs-target="#itemDetailModal" onclick="populateModal('<?php echo $item['itemName']; ?>', '<?php echo $item['itemImage_path']; ?>', '<?php echo $item['itemAvailability']; ?>', '<?php echo $item['requestType']; ?>', '<?php echo $item['itemID']; ?>')">
                                            <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="card-img-top" alt="<?php echo $item['itemName']; ?>" style="border-radius: 0px;">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $item['itemName']; ?></h5>
                                                <div class="rating">
                                                    <label for="star5"><i class="fas fa-star"></i></label>
                                                    <input type="radio" name="rating" id="star5" value="5">
                                                    <label for="star4"><i class="fas fa-star"></i></label>
                                                    <input type="radio" name="rating" id="star4" value="4">
                                                    <label for="star3"><i class="fas fa-star"></i></label>
                                                    <input type="radio" name="rating" id="star3" value="3">
                                                    <label for="star2"><i class="fas fa-star"></i></label>
                                                    <input type="radio" name="rating" id="star2" value="2">
                                                    <label for="star1"><i class="fas fa-star"></i></label>
                                                    <input type="radio" name="rating" id="star1" value="1">
                                                </div>
                                                <div class="mb-2"></div>
                                                <div>
                                                    <p class="mb-0 text-secondary"><i class="bi bi-tags-fill"></i> <small> <?php echo $item['category']; ?></small></p>
                                                    <p class="text-secondary mb-0"><i class="bi bi-arrow-repeat"></i> <small> <?php echo $item['requestType']; ?></small></p>
                                                </div>
                                                <p style="display: none;"><i class="bi bi-calendar"></i> Date Time Posted: <span style="display: none;" class="upload-date"><?php echo date("F j, Y, g:i a", strtotime($item['DateTimePosted'])); ?></span></p>
                                                <p class="text-start text-secondary">
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
                    </div>
                </div>

                <footer>
                    <div class="container">
                        <div class="mt-3"></div>
                        <div class="row justify-content-center">
                            <div class="col-auto"> <a class="btn btn-outline-dark" href="finditem.php" role="button">See More</a> </div>
                            <div class="mb-2"></div>
                        </div>
                </footer>
    </main>
    </div>
</body>

</html>