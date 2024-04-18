<?php
// Include the database connection file
include "1db.php";

// Check if the request method is GET and the itemId parameter is set
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['itemId'])) {
    $itemId = $_GET['itemId'];

    // Prepare the query to fetch the item quantity
    $quantityQuery = "SELECT itemQuantity FROM item WHERE itemID = ?";
    $stmt = $conn->prepare($quantityQuery);
    $stmt->bind_param("s", $itemId);

    // Execute the query
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['itemQuantity']; // Return the item quantity
        } else {
            echo "0"; // Return 0 if no item is found
        }
    } else {
        echo "Error"; // Return "Error" if query execution fails
    }

    $stmt->close();
} else {
    echo "Invalid request"; // Return message for invalid request
}
?>
