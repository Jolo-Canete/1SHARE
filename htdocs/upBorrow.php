<?php
include "1db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestID = $_POST['requestID'];
    $status = $_POST['status'];
    $requestClosedDateTime = date('Y-m-d H:i:s'); // Get the current date and time

    // Update the request status in the Request table
    $query = "UPDATE Request SET status = ?, request_DateTimeClosed = ? WHERE requestID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $status, $requestClosedDateTime, $requestID);

    if ($stmt->execute()) {
        // Update the borrow status in the Borrow table
        if ($status === 'Accepted') {
            $query = "UPDATE borrow SET status = 'Ongoing' WHERE requestID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $requestID);

            if ($stmt->execute()) {
                // Fetch the itemID and quantity from the Request table
                $query = "SELECT itemID, quantity FROM Request WHERE requestID = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $requestID);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $itemID = $row['itemID'];
                $requestedQuantity = $row['quantity'];

                // Decrease the itemQuantity in the item table
                $query = "UPDATE item SET itemQuantity = itemQuantity - ? WHERE itemID = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ii", $requestedQuantity, $itemID);
                $stmt->execute();

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