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
            border-radius: 0px;
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

        .dropdown-menu a.dropdown-item:hover {
            background-color: #e9ecef;
            padding-left: 1rem;
            transition: background-color 0.3s, color 0.3s, font-weight 0.3s, padding-left 0.3s;
        }


        .btn-close-red {
            filter: invert(1) grayscale(100%) brightness(200%) sepia(100%) hue-rotate(-50deg) saturate(600%) contrast(0.8);
        }

        .sell-price-banner {
            background-color: #f8f8f8;
            /* light gray */
            border-radius: 6px;
            padding: 12px;
            display: flex;
            align-items: center;
            max-width: 280px;
            width: 100%;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            animation: pulse 2s infinite;
        }

        .banner-content {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .banner-border {
            border: 2px solid #ff0000;
            /* red */
            border-radius: 4px;
            padding: 4px 8px;
            margin-right: 12px;
            font-size: 14px;
            font-weight: 700;
            color: #ff0000;
            display: flex;
            align-items: center;
        }

        .bi-tag-fill {
            margin-left: 6px;
            font-size: 16px;
            color: #ff0000;
        }

        .price-container {
            display: flex;
            align-items: center;
            font-size: 16px;
            font-weight: 700;
            color: #333;
            flex-grow: 1;
            justify-content: flex-end;
        }

        .bi-cash-coin {
            margin-right: 4px;
            font-size: 16px;
            color: #ff0000;
        }

        .price-value {
            color: #ff0000;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            }

            50% {
                box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);
            }

            100% {
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            }
        }

        .price-banner {
            background-color: #fffaf0;
            /* light green */
            border: 3px solid #34c759;
            /* green */
            border-radius: 8px;
            padding: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 350px;
            width: 100%;
            box-shadow: 0 2px 8px rgba(52, 199, 89, 0.3);
            animation: pulse 2s infinite;
        }

        .price-border {
            display: flex;
            align-items: center;
            font-size: 14px;
            font-weight: 700;
            color: #34c759;
            margin-right: 12px;
        }

        .price-label {
            text-transform: uppercase;
        }

        .price-value {
            font-size: 16px;
            font-weight: 700;
            color: #333;
            flex-grow: 1;
            text-align: right;
        }

        #buyField {
            border: 3px solid #ff0000;
            /* red */
        }

        #buyField.price-border {
            color: #ff0000;
        }

        #buyField.price-label {
            color: #ff0000;

        }

        /* Default styles */
        .price-banner {
            font-size: 16px;
        }

        /* Media query for smaller screens */
        @media (max-width: 768px) {
            .price-banner {
                font-size: 14px;
            }

            .price-label {
                font-size: 13px;
            }

            .price-value {
                font-size: 13px;
            }
        }


        @media (max-width: 768px) {
            .image-container {
                width: 100% !important;
                height: 200px !important;
            }

            #modalItemImage {
                width: 100% !important;
                height: 200px !important;
            }
        }


        @media (max-width: 768px) {
            .d-flex {
                flex-wrap: wrap;
            }

            button {
                font-size: 12px;
                padding: 4px 8px;
            }

            #cart-popup {
                font-size: 12px;
            }
        }

        @media (max-width: 768px) {
            .modal-body {
                overflow-y: auto;
                max-height: 100%;
                /* adjust the height to your liking */
            }
        }

        @media (max-width: 768px) {
            #specifications-table {
                font-size: 12px;
            }

            #specifications-icon {
                font-size: 12px;
            }
        }

        @media only screen and (max-width: 600px) {
            .specs-header {
                font-size: 14px;
                padding: 5px;
                white-space: nowrap;
            }
        }

        #button-container .btn {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            /* adjust the padding to fit the container */
            /* or */
            width: calc(100% - 20px);
            /* adjust the width to fit the container */
        }

        .owned-by-container {
            background-color: #f8f9fa;
            padding: 24px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .owned-by-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #495057;
            transition: color 0.3s ease;
        }

        .owned-by-link:hover {
            color: #343a40;
        }

        .image-container {
            margin-right: 16px;
        }

        .owned-by-info {
            display: fixed;
            flex-direction: column;
        }

        .owned-by-info p {
            margin-bottom: 0;
        }

        .owned-by-badge {
            background-color: #e7f5ff;
            color: #0b5ed7;
            font-size: 16px;
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 20px;
            cursor: pointer;
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

            <!--- Item Display --->
            <div class="container">
                <div class="row row-cols-2 row-cols-md-6 g-4">
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
                                            <p class="text-secondary mb-0"><i class="bi bi-tags-fill"></i> <small><b></b> <?php echo $item['category']; ?></small></p>
                                            <p class="text-secondary mb-0"><i class="bi bi-arrow-repeat"></i> <small><b></b> <?php echo $item['requestType']; ?></small></p>
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
                <?php include "test2.php"; ?>
            </div>
            <!--- End of Item Display --->

        </div>
</body>

</html>
<div class="d-md-none">
    <br><br>
</div>