<?php
// Include database connection
include "1db.php";

// Check if itemImagePath is provided
if (isset($_POST['itemImagePath'])) {
    $itemImagePath = $_POST['itemImagePath'];

    // Prepare and execute query to fetch item details
    $sql = "SELECT i.*, u.username, u.contactNumber , u.userImage_path FROM item i 
            INNER JOIN user u ON i.userID = u.userID 
            WHERE i.itemImage_path = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $itemImagePath);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Fetch item details
        $item = $result->fetch_assoc();

        // Return item details as JSON response
        echo json_encode($item);
    } else {
        // Item not found
        http_response_code(404);
        echo json_encode(array("message" => "Item not found."));
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // No itemImagePath provided
    http_response_code(400);
    echo json_encode(array("message" => "Missing itemImagePath parameter."));
}
?>