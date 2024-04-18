<?php
include "1db.php";

if (isset($_GET['requestId'])) {
    $requestID = $_GET['requestId'];

    // Update the "remove" attribute of the request to "Yes"
    $query = "UPDATE Request SET remove = 'Yes' WHERE requestID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $requestID);

    if ($stmt->execute()) {
        // Get the requestType, itemID, and quantity for the given requestID
        $getRequestInfoQuery = "SELECT requestType, itemID, quantity FROM Request WHERE requestID = ?";
        $getRequestInfoStmt = $conn->prepare($getRequestInfoQuery);
        $getRequestInfoStmt->bind_param("i", $requestID);
        $getRequestInfoStmt->execute();
        $getRequestInfoStmt->bind_result($requestType, $itemID, $quantity);
        $getRequestInfoStmt->fetch();
        $getRequestInfoStmt->close();

        // Update the corresponding table based on the requestType
        switch ($requestType) {
            case 'Barter':
                // Update the status of the barter table to 'Cancelled'
                $getBarterItemsQuery = "SELECT item1, item2, item3 FROM barter WHERE requestID = ?";
                $getBarterItemsStmt = $conn->prepare($getBarterItemsQuery);
                $getBarterItemsStmt->bind_param("i", $requestID);
                $getBarterItemsStmt->execute();
                $getBarterItemsStmt->bind_result($item1, $item2, $item3);
                $getBarterItemsStmt->fetch();
                $getBarterItemsStmt->close();

                // Update itemQuantity in the Item table for item1, item2, and item3
                $updateItemQuantityQuery = "UPDATE item SET itemQuantity = itemQuantity + 1 WHERE itemID IN (?, ?, ?)";
                $updateItemQuantityStmt = $conn->prepare($updateItemQuantityQuery);
                $updateItemQuantityStmt->bind_param("iii", $item1, $item2, $item3);
                $updateItemQuantityStmt->execute();
                $updateItemQuantityStmt->close();

                // Update the status of the barter table to 'Cancelled'
                $updateBarterQuery = "UPDATE barter SET status = 'Cancelled', DateTimeCompleted = NOW() WHERE requestID = ?";
                $updateBarterStmt = $conn->prepare($updateBarterQuery);
                $updateBarterStmt->bind_param("i", $requestID);
                $updateBarterStmt->execute();
                $updateBarterStmt->close();

                   // Increase itemQuantity in the Item table
                $increaseQuantityQuery = "UPDATE item SET itemQuantity = itemQuantity + 1 WHERE itemID = ?";
                $increaseQuantityStmt = $conn->prepare($increaseQuantityQuery);
                $increaseQuantityStmt->bind_param("i",  $itemID);
                $increaseQuantityStmt->execute();
                $increaseQuantityStmt->close();
                break;

            case 'Borrow':
                // Update the status of the borrow table to 'Cancelled'
                $updateBorrowQuery = "UPDATE borrow SET status = 'Cancelled', DateTimeCompleted = NOW() WHERE requestID = ?";
                $updateBorrowStmt = $conn->prepare($updateBorrowQuery);
                $updateBorrowStmt->bind_param("i", $requestID);
                $updateBorrowStmt->execute();
                $updateBorrowStmt->close();

                // Increase itemQuantity in the Item table
                $increaseQuantityQuery = "UPDATE item SET itemQuantity = itemQuantity + ? WHERE itemID = ?";
                $increaseQuantityStmt = $conn->prepare($increaseQuantityQuery);
                $increaseQuantityStmt->bind_param("ii", $quantity, $itemID);
                $increaseQuantityStmt->execute();
                $increaseQuantityStmt->close();
                break;
            case 'Buy':
                // Update the status of the buy table to 'Cancelled'
                $updateBuyQuery = "UPDATE buy SET status = 'Cancelled', DateTimeCompleted = NOW() WHERE requestID = ?";
                $updateBuyStmt = $conn->prepare($updateBuyQuery);
                $updateBuyStmt->bind_param("i", $requestID);
                $updateBuyStmt->execute();
                $updateBuyStmt->close();

                // Increase itemQuantity in the Item table
                $increaseQuantityQuery = "UPDATE item SET itemQuantity = itemQuantity + ? WHERE itemID = ?";
                $increaseQuantityStmt = $conn->prepare($increaseQuantityQuery);
                $increaseQuantityStmt->bind_param("ii", $quantity, $itemID);
                $increaseQuantityStmt->execute();
                $increaseQuantityStmt->close();
                break;
        }

        echo "success"; // Return a success response
    } else {
        echo "Error updating request: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Invalid request ID.";
}
