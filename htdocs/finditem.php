<?php
include "nav.php";

// Sorting logic
$sortBy = isset($_GET['sort_by']) ? $_GET['sort_by'] : '';

if ($sortBy == 'date_uploaded') {
    $orderBy = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'ASC' : 'DESC';
    $sql = "SELECT * FROM item WHERE itemAvailability = 'Available' AND userID != '$user_id' ORDER BY DateTimePosted $orderBy";
} elseif ($sortBy == 'item_category') {
    $category = isset($_GET['category']) ? $_GET['category'] : '';
    if ($category == 'all') {
        $sql = "SELECT * FROM item WHERE itemAvailability = 'Available' AND userID != '$user_id'";
    } elseif ($category == 'Others') {
        $sql = "SELECT * FROM item 
                WHERE itemAvailability = 'Available' 
                AND userID != '$user_id'
                AND category NOT IN ('Toys', 'Clothes', 'Kitchen Utensils', 'Tools', 'Sports Items', 'School Supply')";
    } else {
        $sql = "SELECT * FROM item 
                WHERE itemAvailability = 'Available' 
                AND userID != '$user_id'
                AND category = '$category'";
    }
} elseif ($sortBy == 'open_for') {
    $openFor = isset($_GET['open_for']) ? $_GET['open_for'] : '';
    if ($openFor == 'all') {
        $sql = "SELECT * FROM item WHERE itemAvailability = 'Available' AND userID != '$user_id'";
    } else {
        $sql = "SELECT * FROM item 
                WHERE itemAvailability = 'Available' 
                AND userID != '$user_id'
                AND requestType = '$openFor'";
    }
} else {
    $sql = "SELECT * FROM item WHERE itemAvailability = 'Available' AND userID != '$user_id'";
}

$items = [];

if (isset($_GET['search_term'])) {
    $searchTerm = $_GET['search_term'];

    $searchSql = "SELECT * FROM item 
                  WHERE itemAvailability = 'Available' 
                  AND userID != '$user_id'
                  AND itemName LIKE '%$searchTerm%'";

    $searchResult = $conn->query($searchSql);
    $items = $searchResult->fetch_all(MYSQLI_ASSOC);

    if (empty($items)) {
        echo "";
    }
} else {
    $items = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Item</title>

    <style>
        <?php include "additem.css"; ?><?php include "find.css"; ?>
    </style>

</head>

<body>

    <div class="page-content" id="content">
        <br>

        <!-- Display the search term if it's set -->

        <!--- Dropdown --->
        <div class="container">
            <?php if (isset($_GET['search_term'])) { ?>
                <p>You've searched for: <?php echo htmlspecialchars($_GET['search_term']); ?></p>
            <?php } ?>
            <div class="d-md-none">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="d-md-block">
                            <div class="btn-group">
                                <button id="item_category" type="button" class="btn btn-outline-dark btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">Category</button>
                                <ul class="dropdown-menu dropdown-menu-sm" aria-labelledby="item_category">
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=all">All</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=Toys">Toys</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=Cloths">Cloths</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=Kitchen Utensils">Kitchen Utensils</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=Tools">Tools</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=Sports Items">Sports Items</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=School Supply">School Supply</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=Others">Others</a></li>
                                </ul>
                            </div>
                            &nbsp;
                            <div class="btn-group">
                                <button id="sort_by_item" type="button" class="btn btn-outline-dark btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">Date Uploaded</button>
                                <ul class="dropdown-menu dropdown-menu-sm" aria-labelledby="sort_by_item">
                                    <li><a class="dropdown-item" href="?sort_by=date_uploaded&order=desc">Most Recent</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=date_uploaded&order=asc">Least Recent</a></li>
                                </ul>
                            </div>
                            &nbsp;&nbsp;
                            <div class="btn-group">
                                <button id="sort_by_open_for" type="button" class="btn btn-outline-dark btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">Open For</button>
                                <ul class="dropdown-menu dropdown-menu-sm" aria-labelledby="sort_by_open_for">
                                    <li><a class="dropdown-item" href="?sort_by=open_for&open_for=all">All</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=open_for&open_for=Barter">Barter</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=open_for&open_for=Borrow">Borrow</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=open_for&open_for=Buy">Buy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="d-none d-md-block">

                <!--- End of Dropdown --->
                <div class="row">
                    <div class="col-custom-column">
                        <div class="d-grid gap-2 d-md-block">
                            <!-- Category Dropdown -->
                            <div class="btn-group">
                                <button id="item_category" type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">
                                    Category
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="item_category">
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=all">All</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=Toys">Toys</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=Cloths">Cloths</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=Kitchen Utensils">Kitchen Utensils</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=Tools">Tools</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=Sports Items">Sports Items</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=School Supply">School Supply</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=item_category&category=Others">Others</a></li>
                                </ul>
                            </div>
                            &nbsp;

                            <!-- Sorting Dropdown (Date Uploaded) -->
                            <div class="btn-group">
                                <button id="sort_by_item" type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">
                                    Sort By: Date Uploaded
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="sort_by_item">
                                    <li><a class="dropdown-item" href="?sort_by=date_uploaded&order=desc">Most Recent</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=date_uploaded&order=asc">Least Recent</a></li>
                                </ul>
                            </div>
                            &nbsp;&nbsp;

                            <!-- Sorting Dropdown (Open For) -->
                            <div class="btn-group">
                                <button id="sort_by_open_for" type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">
                                    Sort By: Open For
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="sort_by_open_for">
                                    <li><a class="dropdown-item" href="?sort_by=open_for&open_for=all">All</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=open_for&open_for=Barter">Barter</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=open_for&open_for=Borrow">Borrow</a></li>
                                    <li><a class="dropdown-item" href="?sort_by=open_for&open_for=Buy">Buy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!--- End of Dropdown --->

            <!-- Item Display -->
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
                                        <!-- PHP code to display average rating -->
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
                                            }
                                            ?>
                                        </div>

                                        <!-- Display the total number of ratings -->
                                        <?php echo "<div> <span class='text-secondary ms-1'><small>({$totalRatings} rated)</small></span></div>"; ?>



                                        <div class="mb-2"></div>
                                        <!-- Other item details -->
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
            </div>
            <!--- End of Item Display --->

        </div>
</body>

</html>
<div class="d-md-none">
    <br><br>
</div>