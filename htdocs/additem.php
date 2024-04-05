<?php
include "nav.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Inventory</title>


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
        <br>
        <h1 class="text-center mb-4"><i class="bi bi-archive-fill"></i> MY ITEMS</h1>
        <div class="container">
            <button id="but" type="button" class="btn btn btn-outline-success btn-add mb-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#uploadModal">
                <i class="bi bi-plus"></i> Add New Item
            </button>
        </div>

        <div class="container">
            <div class="container-box">
                <div class="row row-cols-1 row-cols-md-6 g-4">
                    <?php foreach ($items as $item) { ?>
                        <!-- Item Card -->
                        <div class="col">
                            <div class="card" data-bs-toggle="modal" data-bs-target="#itemDetailModal" onclick="populateModal('<?php echo $item['itemName']; ?>', '<?php echo $item['itemImage_path']; ?>', '<?php echo $item['itemAvailability']; ?>', '<?php echo $item['requestType']; ?>')">
                                <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="card-img-top" alt="<?php echo $item['itemName']; ?>">

                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $item['itemName']; ?></h5>
                                    <p class="text-start text-secondary">
                                        <?php
                                        $availability = $item['itemAvailability'];
                                        $badgeColor = ($availability == 'Available') ? 'bg-success -subtle text-light -emphasis' : 'bg-danger -subtle text-light -emphasis';
                                        echo "<span class='badge $badgeColor rounded-pill'>$availability</span>";
                                        ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

 <!-- Item Detail Modal -->
        <?php
        include "itemdetailmodal.php";
        ?>

        <!-- Upload Modal -->
        <?php
        include "uploadmodal.php";
        ?>
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>