<?php
include "nav.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Items</title>

    <style>
        <?php
        include "additem.css";
        ?>
    </style>

</head>

<body>
    <?php
    // Retrieve the user's items
    $userID = $_SESSION['user_id'];
    $sqlSelect = "SELECT * FROM item WHERE userID = ?";
    $stmt = $conn->prepare($sqlSelect);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $items = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    ?>

    <div class="page-content" id="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-dark">
                        <h1 class="display-4 fw-bold text-dark text-center mt-3 mb-3"><i class="bi bi-box" style="font-size: 2.5rem;"></i> MY ITEMS</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-12 mb-3">
                    <!-- Upload Button on the left -->
                    <button id="butter" type="button" class="btn btn btn-outline-success btn-add mb-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#uploadModal">
                        <i class="bi bi-plus"></i> Add New Item
                    </button>
                </div>
                <div class="col-md-8 col-12 mb-3 mb-3">
                    <!-- Sort Dropdowns -->
                    <div class="d-flex justify-content-end">
                        <div class="btn-group me-1">
                            <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">
                                Sort by Availability
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="sortByAvailability('all')">Show All</a></li>
                                <li><a class="dropdown-item" href="#" onclick="sortByAvailability('Available')">Available</a></li>
                                <li><a class="dropdown-item" href="#" onclick="sortByAvailability('Unavailable')">Unavailable</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">
                                Sort by Upload Date
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" onclick="sortByUploadDate('newest')">Newest to Oldest</a></li>
                                <li><a class="dropdown-item" href="#" onclick="sortByUploadDate('oldest')">Oldest to Newest</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (empty($items)) { ?>
                <div class="no-item" id="no-item">
                    <div class="row justify-content-center">
                        <div class="col d-flex justify-content-center">
                            <div class="card w-75 mb-3 border-0">
                                <div class="card-body">
                                    <h1 class="card-title text-center">No Items</h1>
                                    <p class="card-text text-center text-secondary">
                                        It seems that you don't own any items yet. Try adding an Item!
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-1">
                    <?php foreach ($items as $item) { ?>
                        <!-- Item Card -->
                        <div class="col">
                            <div class="card" data-bs-toggle="modal" data-bs-target="#itemDetailModal" onclick="populateModal('<?php echo $item['itemName']; ?>', '<?php echo $item['itemImage_path']; ?>', '<?php echo $item['itemAvailability']; ?>', '<?php echo $item['requestType']; ?>')">
                                <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="card-img-top" alt="<?php echo $item['itemName']; ?>" style="border-radius: 0px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $item['itemName']; ?></h5>
                                    <p style="display: none;"><i class="bi bi-calendar"></i> Date Time Posted: <span style="display: none;" class="upload-date"><?php echo date("F j, Y, g:i a", strtotime($item['DateTimePosted'])); ?></span></p>
                                    <p class="text-start text-secondary">
                                        <?php
                                        $availability = $item['itemAvailability'];
                                        $badgeColor = ($availability == 'Available') ? 'bg-success-subtle text-success-emphasis' : 'bg-danger-subtle text-danger-emphasis';
                                        echo "<span class='badge $badgeColor rounded-pill'>$availability</span>";
                                        ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                </div>


                <!-- Item Detail Modal -->
                <div> <?php
                        include "itemdetailmodal.php";
                        ?>
                </div>
                <div> <!-- Upload Modal -->
                    <?php
                    include "uploadmodal.php";
                    ?>
                </div>




                <script>
                    function sortByAvailability(filter) {
                        var container = document.querySelector(".row.row-cols-2.row-cols-md-4.row-cols-lg-6.g-4");
                        var items = container.querySelectorAll(".col");

                        // Loop through all items
                        items.forEach(function(item) {
                            var availability = item.querySelector(".badge").textContent.trim();

                            // Check if the item should be displayed based on the filter
                            if (filter === 'all' || availability === filter) {
                                item.style.display = 'block'; // Display the item
                            } else {
                                item.style.display = 'none'; // Hide the item
                            }
                        });
                    }

                    function sortByUploadDate(order) {
                        var container = document.querySelector(".row.row-cols-2.row-cols-md-4.row-cols-lg-6.g-4");
                        var items = Array.from(container.querySelectorAll(".col"));

                        items.sort(function(a, b) {
                            var dateA = new Date(a.querySelector('.upload-date').textContent);
                            var dateB = new Date(b.querySelector('.upload-date').textContent);

                            if (order === 'newest') {
                                return dateB - dateA; // Sort from newest to oldest
                            } else {
                                return dateA - dateB; // Sort from oldest to newest
                            }
                        });

                        // Remove all items from the container
                        items.forEach(function(item) {
                            container.removeChild(item);
                        });

                        // Append sorted items back to the container
                        items.forEach(function(item) {
                            container.appendChild(item);
                        });
                    }
                </script>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>