<?php
include "1db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestID = $_POST['requestID'];
    $status = $_POST['status'];

    // Update the request status in the Request table
    $query = "UPDATE Request SET status = ? WHERE requestID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $requestID);

    if ($stmt->execute()) {
        // Update the borrow status in the Borrow table
        if ($status === 'Accepted') {
            $query = "UPDATE borrow SET status = 'Ongoing' WHERE requestID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $requestID);

            if ($stmt->execute()) {
                echo "success"; // Return a success response
            } else {
                echo "Error updating borrow status: " . $conn->error;
            }
        } else {
            // If the status is 'Declined', update the Borrow table status to 'Declined'
            $query = "UPDATE borrow SET status = 'Declined' WHERE requestID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $requestID);

            if ($stmt->execute()) {
                echo "success"; // Return a success response
            } else {
                echo "Error updating borrow status: " . $conn->error;
            }
        }
    } else {
        echo "Error updating request status: " . $conn->error;
    }

    $stmt->close();
}
?>