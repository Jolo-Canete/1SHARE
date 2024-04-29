<?php
// Include nav.php to access user information
include "nav.php";

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];

    // Prepare the SQL statement to fetch cart items for the logged-in user
    $sql = "SELECT item.itemID, item.itemName, item.itemImage_path, item.itemDescription, item.requestType, item.category, item.itemAvailability, item.buyPrice, cart.quantity
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
        ?>.no-item {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .no-item .card {
            box-shadow: none;
            border: none;
        }

        .no-item .card-title {
            margin-top: 0;
            font-size: 24px;
        }

        .no-item .card-text {
            margin-bottom: 10px;
        }

        .no-item .btn {
            width: 200px;
        }

        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        <?php include "additem.css"; ?><?php include "find.css"; ?>
    </style>

</head>

<body>
    <div class="page-content" id="content">
        <div class="row">
            <div class="col">
                <div class="text-dark">
                    <h1 class="display-4 fw-bold text-dark text-center mt-3 mb-0"><i class="bi bi-cart" style="font-size: 2.8rem;"></i> MY CART</h1>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <?php if ($result->num_rows === 0) { ?>
                <div class="no-item" id="no-item">
                    <div class="row justify-content-center">
                        <div class="col d-flex justify-content-center">
                            <div class="card w-75 mb-3 border-0">
                                <div class="card-body">
                                    <h1 class="card-title text-center">No Items</h1>
                                    <p class="card-text text-center text-secondary">
                                        It seems that you don't have any items in you cart yet. Start exploring and engaging with items in our community!
                                    </p>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                        <a href="finditem.php" class="btn btn-outline-dark me-md-2" type="button">Find Items</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-1">
                    <?php while ($item = $result->fetch_assoc()) { ?>
                        <!-- Item Card -->
                        <div class="col">
                            <div class="card" data-bs-toggle="modal" data-bs-target="#itemDetailModal" onclick="populateModal('<?php echo $item['itemName']; ?>', '<?php echo $item['itemImage_path']; ?>', '<?php echo $item['itemAvailability']; ?>', '<?php echo $item['requestType']; ?>')">
                                <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="card-img-top" alt="<?php echo $item['itemName']; ?>" style="border-radius: 0px;">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div>
                                        <h5 class="card-title"><?php echo $item['itemName']; ?></h5>
                                        <p class="text-start text-secondary">
                                            <?php
                                            $availability = $item['itemAvailability'];
                                            $badgeColor = ($availability == 'Available') ? 'bg-success-subtle text-success-emphasis' : 'bg-danger-subtle text-danger-emphasis';
                                            echo "<span class='badge $badgeColor rounded-pill'>$availability</span>";
                                            ?>
                                        </p>
                                    </div>
                                    <p class="text-start text-secondary mb-0"><b>Quantity:</b> <?php echo $item['quantity']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

        <?php
        include "cartmodal.php";
        ?>
    </div>
</body>

</html>