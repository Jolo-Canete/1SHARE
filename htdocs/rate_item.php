<?php
// Include upper.php which may contain session_start() and other necessary includes
include 'upper.php';
include '1db.php';

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: login.php");
    exit;
}

// If the user is logged in, retrieve their information from the session
$user_id = $_SESSION['user_id'];

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the values sent via AJAX
    $writeReview = isset($_POST['review']) ? $_POST['review'] : '';
    $rating = isset($_POST['rating']) ? $_POST['rating'] : '';
    $itemId = isset($_POST['itemID']) ? $_POST['itemID'] : '';
    $requestID = isset($_POST['requestID']) ? $_POST['requestID'] : '';
    $photoReviewName = isset($_POST['photoReviewName']) ? $_POST['photoReviewName'] : '';
    
    // Check if all required fields are provided
    if (empty($writeReview) || empty($rating) || empty($itemId) || empty($requestID)) {
        echo "Error: Missing data.";
        exit;
    }

    // Check if an image is uploaded
    if (isset($_FILES['photoReview']) && $_FILES['photoReview']['error'] === UPLOAD_ERR_OK) {
        $photoReview = $_FILES['photoReview'];

        // Example of renaming the file to a unique name with 6 characters
        $extension = pathinfo($photoReview['name'], PATHINFO_EXTENSION);
        $newFileName = substr(md5(uniqid()), 0, 6) . '.' . $extension;

        // Directory where the file will be uploaded
        $uploadDirectory = "rate/";

        // Move the uploaded file to the directory with the new name
        $uploadPath = $uploadDirectory . $newFileName;
        if (!move_uploaded_file($photoReview['tmp_name'], $uploadPath)) {
            echo "Error: Failed to move uploaded file.";
            exit;
        }
    } else {
        $uploadPath = null; // Set uploadPath to null if no image is uploaded
    }
    $rated_at = date('Y-m-d H:i:s');

    // Perform database insertion or update
    try {
        // Update the 'rated' attribute in the 'Request' table
        $updateQuery = "UPDATE Request SET rated = 'yes' WHERE requestID = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("i", $requestID);
        $updateStmt->execute();

        // Check if the user has already rated the item
        $checkQuery = "SELECT * FROM itemRating WHERE itemID = ? AND userID = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("ii", $itemId, $user_id);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            // Update existing rating
            $updateQuery = "UPDATE itemRating SET rate = ?, comment = ?, rate_path = ?, DateTimeRate = ? WHERE itemID = ? AND userID = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("issssi", $rating, $writeReview, $newFileName, $rated_at, $itemId, $user_id);
            $updateStmt->execute();
            echo "Rating updated successfully.";
        } else {
            // Insert new rating
            $insertQuery = "INSERT INTO itemRating (itemID, userID, rate, comment, rate_path, DateTimeRate) VALUES (?, ?, ?, ?, ?, ?)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("iiisss", $itemId, $user_id, $rating, $writeReview, $newFileName, $rated_at);
            $insertStmt->execute();
            echo "Item reported successfully.";
        }

        // Save the file internally with its original name
       
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>
