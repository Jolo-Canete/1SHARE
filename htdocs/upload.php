<?php
session_start();
include "1db.php";

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $itemName = $_POST['itemName'];
    $itemDescription = $_POST['itemDescription'];
    $category = $_POST['category'];
    $itemCondition = $_POST['itemCondition'];
    $itemAvailability = $_POST['itemAvailability'];
    $userID = $_SESSION['user_id']; // Use the logged-in user's ID
    $requestTypes = explode(',', $_POST['requestTypes']);
    $requestType = implode(',', $requestTypes); // Combine request types into a single string

    // Validate the form data
    $isValid = true;
    if (empty($itemName)) {
        $isValid = false;
        echo "Item name is required.\n";
    }
    if (empty($itemDescription)) {
        $isValid = false;
        echo "Item description is required.\n";
    }
    if (empty($category)) {
        $isValid = false;
        echo "Category is required.\n";
    }
    if (empty($itemCondition)) {
        $isValid = false;
        echo "Item condition is required.\n";
    }
    if (empty($itemAvailability)) {
        $isValid = false;
        echo "Item availability is required.\n";
    }
    if (empty($requestTypes)) {
        $isValid = false;
        echo "At least one request type is required.\n";
    }

    // Get the price if the request type is "buy"
    if (in_array('buy', $requestTypes)) {
        $price = $_POST['price'];
        if (empty($price)) {
            $isValid = false;
            echo "Price is required for the 'buy' request type.\n";
        }
    } else {
        $price = null;
    }

    // Handle the file upload
    $targetDirectory = "pictures/";
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    // Get the uploaded image information
    $uploadedFile = $_FILES['fileToUpload'];
    $fileName = $uploadedFile['name'];
    $fileSize = $uploadedFile['size'];
    $fileTmpName = $uploadedFile['tmp_name'];
    $fileError = $uploadedFile['error'];

    // Generate a unique file name based on the item ID
    $itemID = uniqid(); // Generate a unique ID for the item
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $newFileName = $itemID . '.' . $fileExtension;
    $targetFilePath = $targetDirectory . $newFileName;

    // Move the uploaded file to the target directory
    if ($fileError === UPLOAD_ERR_OK) {
        if (move_uploaded_file($fileTmpName, $targetFilePath)) {
            // Update the database with the new item information
            if ($isValid) {
                $sqlInsert = "INSERT INTO item (itemName, ItemDescription, category, itemCondition, itemAvailability, itemImage_path, price, userID, requestType) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sqlInsert);
                $stmt->bind_param("ssssssdis", $itemName, $itemDescription, $category, $itemCondition, $itemAvailability, $newFileName, $price, $userID, $requestType);
                if ($stmt->execute()) {
                    echo "Item uploaded successfully";
                    header("Location: additem.php");

                } else {
                    $error = $stmt->error;
                    echo "Error: $error";
                }
                $stmt->close();
            }
        } else {
            echo "Error uploading file";
        }
    } else {
        echo "Error uploading file";
    }
}
?>