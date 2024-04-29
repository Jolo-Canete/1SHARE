<?php
session_start();
include "1db.php";

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $itemName = $_POST['itemName'];
    $itemQuantity = $_POST['itemQuantity'];
    $itemDescription = $_POST['itemDescription'];
    $category = $_POST['category'];
    if ($category === 'Others') {
        // If "Others" is selected, set category to the value of otherCategory
        $category = $_POST['otherCategory'];
    }
    $itemAvailability = $_POST['itemAvailability'];
    $userID = $_SESSION['user_id']; // Use the logged-in user's ID
    $requestTypes = explode(',', $_POST['requestTypes']);
    $requestType = implode(',', $requestTypes); // Combine request types into a single string

    // Validate the form data
    $isValid = true;
    $errors = [];


    // Get the price if the request type is "Buy"
    if (in_array('Buy', $requestTypes)) {
        $buyPrice = $_POST['buyPrice'];
        if (is_numeric($buyPrice)) {
            $buyPrice = floatval($buyPrice);
        } else {
            $isValid = false;
            $errors[] = "Please enter a valid buy price.";
        }
    } else {
        $buyPrice = null;
    }

    // Get the price and duration if the request type is "Borrow"
    if (in_array('Borrow', $requestTypes)) {
        $borrowPrice = $_POST['borrowPrice'];
        if (is_numeric($borrowPrice)) {
            $borrowPrice = floatval($borrowPrice);
        } else {
            $isValid = false;
            $errors[] = "Please enter a valid borrow price.";
        }
        $borrowDuration = $_POST['borrowDuration']; // Get the borrow duration from the request
        if (is_numeric($borrowDuration)) {
            $borrowDuration = floatval($borrowDuration);
        } else {
            $isValid = false;
            $errors[] = "Please enter a valid borrow duration.";
        }
    } else {
        $borrowPrice = null;
        $borrowDuration = null;
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
            // Get the current date and time
            $currentDateTime = date('Y-m-d H:i:s');

            // Update the database with the new item information
            if ($isValid) {
                $sqlInsert = "INSERT INTO item (itemName, ItemDescription, category, itemAvailability, itemImage_path, buyPrice, borrowPrice, borrowDuration, userID, requestType, DateTimePosted, itemQuantity ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sqlInsert);


                // Bind parameters
                $stmt->bind_param("sssssddisssi", $itemName, $itemDescription, $category, $itemAvailability, $newFileName, $buyPrice, $borrowPrice, $borrowDuration, $userID, $requestType, $currentDateTime, $itemQuantity);


                if ($stmt->execute()) {
                    echo "Goods";



                    exit(); // Ensure no further execution after redirect
                } else {
                    $error = $stmt->error;
                    echo "Error: $error";
                }
                $stmt->close();
            }
        } else {
            echo "Error moving uploaded file";
        }
    } else {
        echo "Error uploading file: $fileError";
    }

    // Output validation errors
    if (!$isValid) {
        echo implode("\n", $errors);
    }
}
