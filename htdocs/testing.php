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
    <title>15 Payday Shopee Mall Outlet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .item {
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .item:hover {
            transform: translateY(5px);
        }

        .item img {
            border-radius: 10px;
            margin-bottom: 10px;
            width: 300px;
            height: 300px;
            object-fit: cover;
            transition: width 0.3s ease, height 0.3s ease;
        }

        .item:hover img {
            width: 320px;
            height: 320px;
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
</head>

<body>
    <div class="page-content" id="content">
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
            <div class="row">
                <?php foreach ($carouselItems as $index => $item) { ?>
                    <div class="col-6 col-md-3 item">
                        <img src="pictures/<?php echo $item['itemImage_path']; ?>" alt="<?php echo $item['itemName']; ?>" class="img-fluid">
                        <div class="content">
                            <h3 class="display-4 fw-bold text-dark text-center mb-1"><?php echo $item['itemName']; ?></h3>
                            <p><a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary lead" href="itemdetail.php?id=<?php echo $item['itemID']; ?>"><small>Shop Now</small></a></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>