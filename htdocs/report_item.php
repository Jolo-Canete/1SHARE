<?php

include "1db.php"; // Include database connection
include "upper.php"; // Include any necessary files

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $reportReason = $_POST['reportReason'] ?? '';
    $screenshot = $_FILES['screenshot'] ?? null;
    $itemId = $_POST['itemId'] ?? '';

    // Validate the user session
    $user_id = $_SESSION['user_id'] ?? null;
    if (!$user_id) {
        echo "User not logged in.";
        exit;
    }

    // Validate the form data (e.g., check if the required fields are filled)
    if (empty($reportReason) || empty($screenshot['name'])) {
        echo "Please fill in all the required fields.";
        exit;
    }

    // Get the current date and time
    $reported_at = date('Y-m-d H:i:s');

    // Define file paths
    $uploadDir = 'reportedItem/';
    $fileExtension = pathinfo($screenshot['name'], PATHINFO_EXTENSION);
    $uniqueFileName = uniqid('', true) . '.' . $fileExtension; 
    $uploadFile = $uploadDir . $uniqueFileName;

    // Save the screenshot to the server (e.g., using the `move_uploaded_file()` function)
    if (move_uploaded_file($screenshot['tmp_name'], $uploadFile)) {
        // Prepare the insert query for reportedItem table
        $insertReportedItemQuery = "INSERT INTO reportedItem (itemID, userID, reason, ss_path, dateTime) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertReportedItemQuery);
        $stmt->bind_param("iisss", $itemId, $user_id, $reportReason, $uniqueFileName, $reported_at);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Item reported successfully.";
        } else {
            echo "Error inserting data into database.";
        }
    } else {
        echo "Error uploading the screenshot.";
    }
} else {
    echo "Invalid request method.";
}
?>
