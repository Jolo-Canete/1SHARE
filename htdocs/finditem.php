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

        <?php include "additem.css"; ?>.card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .card-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
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
            <div class="row">
                <div class="col-custom-column">
                    <div class="d-grid gap-2 d-md-block">
                        <!-- Category Dropdown -->
                        <div class="btn-group">
                            <button id="item_category" type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <button id="sort_by_item" type="button" class="btn btn-outline-dark rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <button id="sort_by_open_for" type="button" class="btn btn-outline-dark rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
</body>

</html>