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

        // Prepare the SQL statement to remove the item from the cart
        $sql = "DELETE FROM cart WHERE userID = ? AND itemID = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Error preparing the SQL statement"]);
            exit();
        }

        // Bind the parameters
        $stmt->bind_param("ii", $user_id, $itemID);

        // Execute the statement
        if ($stmt->execute()) {
            // Return a success message
            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "Item removed from cart successfully"]);
            exit();
        } else {
            // Return an error message
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Error removing item from cart"]);
            exit();
        }

        // Close the statement
        $stmt->close();
    } else {
        // Return an error message if itemID is not set in the POST request
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "itemID is not set in the POST request"]);
    }
} else {
    // Return an error message if the user is not logged in
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "User not logged in"]);
}

// Close the connection
$conn->close();
?>