<?php
// Include nav.php to access user information
include "nav.php";

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];

    // Prepare the SQL statement to fetch cart items for the logged-in user
    $sql = "SELECT item.itemID, item.itemName, item.itemImage_path, item.itemDescription, item.requestType, item.category, item.itemCondition, item.itemAvailability, item.buyPrice, cart.quantity
            FROM cart
            INNER JOIN item ON cart.itemID = item.itemID
            WHERE cart.userID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();





    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}
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


    <div class="page-content" id="content">
        <br>
        <h1 class="text-center mb-4"><i class="bi bi-cart-fill"></i> CART</h1>
        <div class="container">
            <div class="container-box">
                <div class="row row-cols-1 row-cols-md-6 g-4">
                    <?php if ($result->num_rows === 0) { ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="card-title">No Item Owned</h5>
                                </div>
                            </div>
                        </div>
                        <?php } else {
                        while ($item = $result->fetch_assoc()) { ?>
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
                                        <p class="text-start text-secondary"><b>Quantity:</b> <?php echo $item['quantity']; ?></p>
                                    </div>
                                </div>
                            </div>

                    <?php }
                    } ?>
                </div>
            </div>
            <?php
            include "cartmodal.php";
            ?>
        </div>



</body>

</html>