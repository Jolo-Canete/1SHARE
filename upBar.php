<?php
include "1db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestID = $_POST['requestID'];
    $status = $_POST['status'];

    // Get the current date and time
    $closedDateTime = date('Y-m-d H:i:s');

    // Update the request status and request_DateTimeClosed in the Request table
    $query = "UPDATE Request SET status = ?, request_DateTimeClosed = ? WHERE requestID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $status, $closedDateTime, $requestID);

    if ($stmt->execute()) {
        // Update the barter status in the Barter table
        if ($status === 'Accepted') {
            // Fetch the itemID from the Request table
            $query = "SELECT itemID FROM Request WHERE requestID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $requestID);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $itemID = $row['itemID'];

            // Decrease the itemQuantity in the item table
            $query = "UPDATE item SET itemQuantity = itemQuantity - 1 WHERE itemID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $itemID);
            $stmt->execute();

            // Fetch the barter details
            $query = "SELECT item1, item2, item3 FROM barter WHERE requestID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $requestID);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $item1 = $row['item1'];
            $item2 = $row['item2'];
            $item3 = $row['item3'];

            // Decrease the itemQuantity for the items in the barter
            if ($item1 !== null) {
                $query = "UPDATE item SET itemQuantity = itemQuantity - 1 WHERE itemID = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $item1);
                $stmt->execute();
            }
            if ($item2 !== null) {
                $query = "UPDATE item SET itemQuantity = itemQuantity - 1 WHERE itemID = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $item2);
                $stmt->execute();
            }
            if ($item3 !== null) {
                $query = "UPDATE item SET itemQuantity = itemQuantity - 1 WHERE itemID = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $item3);
                $stmt->execute();
            }

            echo "success"; // Return a success response
        } else {
            // If the status is 'Declined', update the Barter table status to 'Declined'
            $query = "UPDATE barter SET status = 'Declined' WHERE requestID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $requestID);

            if ($stmt->execute()) {
                echo "success"; // Return a success response
            } else {
                echo "Error updating barter status: " . $conn->error;
            }
        }
    } else {
        echo "Error updating request status: " . $conn->error;
    }

    $stmt->close();
}
?>