<?php
// Include nav.php to access user information
include "nav.php";


// Check if the user is logged in
if(isset($_SESSION['user_id'])) {
    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];

    // Check if itemID is set in the POST request
    if(isset($_POST['itemID'])) {
        // Get the itemID from the POST request
        $itemID = $_POST['itemID'];

        // Check if the item is already in the cart for this user
        $sqlCheckCart = "SELECT * FROM cart WHERE userID = ? AND itemID = ?";
        $stmtCheckCart = $conn->prepare($sqlCheckCart);
        $stmtCheckCart->bind_param("ii", $user_id, $itemID);
        $stmtCheckCart->execute();
        $resultCheckCart = $stmtCheckCart->get_result();

        if($resultCheckCart->num_rows > 0) {
            // Item already exists in the cart, update the quantity
            $sqlUpdateQuantity = "UPDATE cart SET quantity = quantity + 1 WHERE userID = ? AND itemID = ?";
            $stmtUpdateQuantity = $conn->prepare($sqlUpdateQuantity);
            $stmtUpdateQuantity->bind_param("ii", $user_id, $itemID);

            if($stmtUpdateQuantity->execute()) {
                echo "Item quantity updated successfully.";
            } else {
                echo "Error updating item quantity: " . $stmtUpdateQuantity->error;
            }
        } else {
            // Item does not exist in the cart, insert a new row
            $sqlInsert = "INSERT INTO cart (userID, itemID, quantity) VALUES (?, ?, 1)";
            $stmtInsert = $conn->prepare($sqlInsert);
            $stmtInsert->bind_param("ii", $user_id, $itemID);

            if ($stmtInsert->execute()) {
                echo "Item added to cart successfully.";
            } else {
                echo "Error adding item to cart: " . $stmtInsert->error;
            }
        }

        // Close the statements
        $stmtCheckCart->close();
        $stmtUpdateQuantity->close();
        $stmtInsert->close();
    } else {
        echo "Error: itemID is not set in the POST request.";
    }
} else {
    echo "Error: User not logged in.";
}

// Close the connection
$conn->close();

?>
