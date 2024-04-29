<?php
// Perform database insertion or update
try {
    // Check if the user has already rated the item
    $checkQuery = "SELECT * FROM itemRating WHERE itemID = ? AND userID = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("ii", $itemId, $user_id);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // Update existing rating
        $updateQuery = "UPDATE itemRating SET rate = ?, comment = ?, DateTimeRate = ? WHERE itemID = ? AND userID = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("isssi", $rating, $writeReview, $rated_at, $itemId, $user_id);
        $updateStmt->execute();
        echo "Rating updated successfully.";
    } else {
        // Insert new rating
        $insertQuery = "INSERT INTO itemRating (itemID, userID, rate, comment, DateTimeRate) VALUES (?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("iiiss", $itemId, $user_id, $rating, $writeReview, $rated_at);
        $insertStmt->execute();
        echo "Item rated successfully.";
    }

    // Save the file internally with its original name
    if ($uploadPath !== null) {
        $internalFilePath = "rate/" . $photoReviewName;
        if (!copy($uploadPath, $internalFilePath)) {
            echo "Error: Failed to save file internally.";
            exit;
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
