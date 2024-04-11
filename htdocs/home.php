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

    /* Carousel */
    .carousel {
        margin-bottom: 2rem;
    }

    /* Carousel Caption */
    .carousel-caption {
        bottom: 3rem;
        z-index: 10;
    }

    /* Carousel Image Height */
    .carousel-item {
        height: 38rem;
    }

    .carousel-item>img {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        height: 38rem;
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

    /* Responsive CSS */

    @media (min-width: 40em) {

        /* Bump up size of carousel content */
        .carousel-caption p {
            margin-bottom: 1.25rem;
            font-size: 1.25rem;
            line-height: 1.4;
        }

        .featurette-heading {
            font-size: 50px;
        }
    }

    @media (min-width: 62em) {
        .featurette-heading {
            margin-top: 7rem;
        }
    }
</style>

<body>
    <header>

    </header>

    <main>
        <div class="page-content" id="content">
            <div class="mt-3"></div>
            <div class="container">
                <?php
                // SQL query to retrieve three random available items excluding those posted by the current user
                $carouselSql = "SELECT * FROM item WHERE itemAvailability = 'Available' AND userID != '$user_id' ORDER BY RAND() LIMIT 3";
                $carouselResult = $conn->query($carouselSql);
                $carouselItems = $carouselResult->fetch_all(MYSQLI_ASSOC);
                ?>

                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php for ($i = 0; $i < count($carouselItems); $i++) { ?>
                            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $i; ?>" <?php echo $i === 0 ? 'class="active"' : ''; ?> aria-label="Slide <?php echo $i + 1; ?>"></button>
                        <?php } ?>
                    </div>
                    <div class="carousel-inner">
                        <?php foreach ($carouselItems as $index => $item) { ?>
                            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="d-block w-100" alt="Image Description">
                                <div class="container-fluid">
                                    <div class="carousel-caption text-start w-100">
                                        <div class="bg-dark bg-opacity-75 w-100 px-4 py-2 rounded">
                                            <h1 class="display-1 font-weight-bold text-shadow-lg text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"><?php echo $item['itemName']; ?></h1>
                                        </div>
                                        <!-- Button to open item detail page -->
                                        <p><a class="btn btn-sm btn-primary mt-2" href="itemdetail.php?id=<?php echo $item['itemID']; ?>">View Details</a></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div> <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>

                <!--- Categories --->
                <div class="row">
                    <div class="col">
                        <p class="h1"><b>TOP CATEGORIES</b></p>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($topCategories as $category) { ?>
                        <div class="col">
                            <a href="finditem.php?sort_by=item_category&category=<?php echo urlencode($category['category']); ?>" class="box-link">
                                <div class="box">
                                    <?php
                                    $randomImage = getRandomItemImage($conn, $category['category']);
                                    ?>
                                    <img src="pictures/<?php echo $randomImage; ?>" class="bd-placeholder-img rounded-circle" width="100" height="100" alt="<?php echo $category['category']; ?>">
                                    <div class="mb-2"></div>
                                    <div class="h3" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo $category['category']; ?></div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <!--- End of Category --->

                <div class="row">
                    <div class="col">
                        <p class="h1 border-bottom border-dark border-5 p-2 text-center">DAILY DISCOVER</p>
                    </div>
                </div>
                <!--- Item Display --->
                <div class="container">
                    <div class="container-box">
                        <div class="row row-cols-1 row-cols-md-5 g-4">
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
                                            <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="card-img-top" alt="<?php echo $item['itemName']; ?>">
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
                                                <hr>
                                                <div>
                                                    <p class="mb-0 text-secondary"><i class="bi bi-tags-fill"></i> <small><b>Category:</b> <?php echo $item['category']; ?></small></p>
                                                    <p class="text-secondary mb-0"><i class="bi bi-arrow-repeat"></i> <small><b>Open For:</b> <?php echo $item['requestType']; ?></small></p>
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
                    </div>
                    <?php include "finddetailmodal.php"; ?>
                </div>
            </div>

            <footer>
                <div class="container">
                    <div class="mt-3"></div>
                    <div class="row justify-content-center">
                        <div class="col-auto"> <a class="btn btn-outline-dark" href="finditem.php" role="button">See More</a> </div>
                    </div>


            </footer>
    </main>
    </div>

</body>

</html>