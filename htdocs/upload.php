<?php
session_start(); // Start the session to access the current user's information

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $itemName = $_POST['itemName'];
    $itemDescription = $_POST['itemDescription'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $userID = $_SESSION['userID']; // Get the current user's ID from the session

    // Handle the file upload
    $targetDirectory = "pictures/";
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    // Get the uploaded image information
    $uploadedImagePath = $_FILES["fileToUpload"]["tmp_name"];
    $uploadedImageName = $_FILES["fileToUpload"]["name"];
    $uploadedImageExtension = pathinfo($uploadedImageName, PATHINFO_EXTENSION);

    // Get the last inserted item ID
    $db = new PDO('mysql:host=localhost;dbname=mariadb', 'your_username', 'your_password');
    $stmt = $db->prepare("SELECT MAX(itemID) AS last_id FROM item");
    $stmt->execute();
    $lastInsertedId = $stmt->fetchColumn() + 1;

    // Construct the target file path
    $targetFile = $targetDirectory . $lastInsertedId . "." . $uploadedImageExtension;

    // Move the uploaded file to the target directory
    if (move_uploaded_file($uploadedImagePath, $targetFile)) {
        // Save the item details to the database
        $stmt = $db->prepare("INSERT INTO item (itemName, itemDescription, category, price, userID, imagePath) VALUES (:itemName, :itemDescription, :category, :price, :userID, :imagePath)");
        $stmt->bindParam(':itemName', $itemName);
        $stmt->bindParam(':itemDescription', $itemDescription);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':imagePath', $targetFile);
        $stmt->execute();

        // Return a success response
        echo "Item uploaded successfully";
    } else {
        // File upload failed
        echo "Error uploading file";
    }
} else {
    // Return an error response for non-POST requests
    echo "Invalid request";
}
?>