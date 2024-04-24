<?php
// Start the session
session_start();

// Include the database connection
include "1db.php";

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $itemID = $_POST['itemID'];
    $itemName = $_POST['itemName'];
    $itemDescription = $_POST['itemDescription'];
    $category = $_POST['category'];
    $itemQuantity = $_POST['itemQuantity'];
    $otherCategory = $_POST['otherCategory'] ?? '';
    $itemAvailability = $_POST['itemAvailability'];

    // Ensure session user_id is set
    $userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // Get request types and format them as a comma-separated string
    $requestTypes = isset($_POST['requestType']) ? implode(',', $_POST['requestType']) : '';

    // Set buyPrice and borrowPrice to null if their respective request types are not selected
    $buyPrice = in_array('Buy', $_POST['requestType']) ? $_POST['buyPrice'] : null;
    $borrowPrice = in_array('Borrow', $_POST['requestType']) ? $_POST['borrowPrice'] : null;

    // Set borrowDuration to null if 'Borrow' request type is not selected
    $borrowDuration = in_array('Borrow', $_POST['requestType']) ? $_POST['borrowDuration'] : null;

    // Handle file upload
    $itemPicture = $_FILES['itemPicture'] ?? null;
    if ($itemPicture && $itemPicture['error'] == UPLOAD_ERR_OK) {
        // Generate a unique file name
        $fileExtension = pathinfo($itemPicture['name'], PATHINFO_EXTENSION);
        $uniqueFileName = uniqid() . '.' . $fileExtension;

        // Move the uploaded file to the pictures directory
        $targetDir = 'pictures/';
        $targetFile = $targetDir . $uniqueFileName;
        if (move_uploaded_file($itemPicture['tmp_name'], $targetFile)) {
            $itemImagePath = $uniqueFileName;

        
        } else {
            echo json_encode(["status" => "error", "message" => "Error uploading file."]);
            exit();
        }
    } else {
        // Retrieve the existing item image path from the database
        $sqlSelectImage = "SELECT itemImage_path FROM item WHERE itemID = ?";
        $stmtSelectImage = $conn->prepare($sqlSelectImage);
        $stmtSelectImage->bind_param("i", $itemID);
        if ($stmtSelectImage->execute() && $result = $stmtSelectImage->get_result()) {
            $existingImagePath = $result->fetch_assoc()['itemImage_path'];
            $itemImagePath = $existingImagePath;
        } else {
            echo json_encode(["status" => "error", "message" => "Error retrieving existing image path."]);
            exit();
        }
    }

    // Update the database with the new item information and image path
    $sqlUpdate = "UPDATE item 
                  SET itemName = ?, 
                      ItemDescription = ?, 
                      itemQuantity = ?,
                      category = ?, 
                      itemAvailability = ?, 
                      buyPrice = ?, 
                      borrowPrice = ?, 
                      borrowDuration = ?, 
                      requestType = ?, 
                      itemImage_path = ?
                  WHERE itemID = ?";
    $stmt = $conn->prepare($sqlUpdate);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ssissddsssi", $itemName, $itemDescription, $itemQuantity, $category, $itemAvailability, $buyPrice, $borrowPrice, $borrowDuration, $requestTypes, $itemImagePath, $itemID);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Item updated successfully"]);
            exit();
        } else {
            echo json_encode(["status" => "error", "message" => "Error updating item: " . $stmt->error]);
            exit();
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Error preparing statement"]);
        exit();
    }
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>