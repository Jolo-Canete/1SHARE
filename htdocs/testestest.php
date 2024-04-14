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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>
        .card {
            height: 100%;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            margin-bottom: 10px;
        }

        .card-text {
            margin-bottom: 0;
        }
    </style>

</head>

<body>

    <main>
        <div class="page-content" id="content">
        <div class="container">

            <?php
            // SQL query to retrieve three random available items excluding those posted by the current user
            $carouselSql = "SELECT * FROM item WHERE itemAvailability = 'Available' AND userID != '$user_id' ORDER BY RAND() LIMIT 3";
            $carouselResult = $conn->query($carouselSql);
            $carouselItems = $carouselResult->fetch_all(MYSQLI_ASSOC);
            ?>

            <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php for ($i = 0; $i < count($carouselItems); $i++) { ?>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $i; ?>" <?php echo $i === 0 ? 'class="active"' : ''; ?> aria-label="Slide <?php echo $i + 1; ?>"></button>
                    <?php } ?>
                </div>
                <div class="carousel-inner">
                    <?php foreach ($carouselItems as $index => $item) { ?>
                    <div class="carousel-item active <?php echo $index === 0 ? 'active' : ''; ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="card-img-top" alt="Image 1">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $item['itemName']; ?></h5>
                                        <p><a class="btn btn-sm btn-primary mt-2" href="itemdetail.php?id=<?php echo $item['itemID']; ?>">View Details</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="card-img-top" alt="Image 2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $item['itemName']; ?></h5>
                                        <p class="card-text">This is the description of card 2.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="image3.jpg" class="card-img-top" alt="Image 3">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 3</h5>
                                        <p class="card-text">This is the description of card 3.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="image4.jpg" class="card-img-top" alt="Image 4">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 4</h5>
                                        <p class="card-text">This is the description of card 4.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="image5.jpg" class="card-img-top" alt="Image 5">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 5</h5>
                                        <p class="card-text">This is the description of card 5.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="image6.jpg" class="card-img-top" alt="Image 6">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 6</h5>
                                        <p class="card-text">This is the description of card 6.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        </div>
    </main>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap 5 JavaScript bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize the carousel
            $('#cardCarousel').carousel();
        });
    </script>
</body>

</html>