<?php
// Include upper.php to establish database connection
include "upper.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if reportedID and userID are set
    if (isset($_POST["reportedID"]) && isset($_POST["userID"]) && isset($_POST["review"]) && isset($_POST["rate"])) {
        // Retrieve the data from the POST request
        $reportedID = $_POST["reportedID"];
        $userID = $_POST["userID"];
        $review = $_POST["review"];
        $rate = $_POST["rate"];
        
        // Get current date and time
        $datetimeRated = date("Y-m-d H:i:s");

        // Check if a rating for the specified user and reportedID already exists
        $existingRatingQuery = "SELECT * FROM userRating WHERE userID = ? AND reportedID = ?";
        $existingRatingStmt = $conn->prepare($existingRatingQuery);
        $existingRatingStmt->bind_param("ii", $userID, $reportedID);
        $existingRatingStmt->execute();
        $existingRatingResult = $existingRatingStmt->get_result();

        if ($existingRatingResult->num_rows > 0) {
            // Rating already exists, update the existing record
            $updateQuery = "UPDATE userRating SET userComment = ?, userRate = ?, DateTimeRated = ? WHERE userID = ? AND reportedID = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("sssii", $review, $rate, $datetimeRated, $userID, $reportedID);
            if ($updateStmt->execute()) {
                // Rating successfully updated
                echo "Rating successfully updated.";
            } else {
                // Error updating rating
                echo "Error updating rating: " . $conn->error;
            }
        } else {
            // Rating doesn't exist, insert a new record
            $insertQuery = "INSERT INTO userRating (userID, reportedID, userComment, userRate, DateTimeRated) VALUES (?, ?, ?, ?, ?)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("iisis", $userID, $reportedID, $review, $rate, $datetimeRated);
            if ($insertStmt->execute()) {
                // Rating successfully inserted
                echo "Rating successfully inserted.";
            } else {
                // Error inserting rating
                echo "Error inserting rating: " . $conn->error;
            }
        }

        // Close statements
        $existingRatingStmt->close();
        $updateStmt->close();
        $insertStmt->close();
    } else {
        // Missing required parameters
        echo "Missing parameters.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

// Close database connection
mysqli_close($conn);
?>
