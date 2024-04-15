<?php
include "1db.php";

if (isset($_GET['requestId'])) {
    $requestID = $_GET['requestId'];

    // Delete the request from the Request table
    $query = "DELETE FROM Request WHERE requestID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $requestID);

    if ($stmt->execute()) {
        echo "success"; // Return a success response
    } else {
        echo "Error deleting request: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Invalid request ID.";
}
?>