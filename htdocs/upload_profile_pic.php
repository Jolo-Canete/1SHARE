<?php
include "upper.php";
include "1db.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: login.php");
    exit;
}

// If the user is logged in, retrieve their information from the session
$user_id = $_SESSION['user_id'];

// File upload handling
$target_dir = "picture/";
$file_name = uniqid('img_', false) . "." . pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
$target_file = $target_dir . $file_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is an actual image
$check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
if ($check === false) {
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
}

// Check file size
if ($_FILES["profile_pic"]["size"] > 500000) {
    $uploadOk = 0;
}

// Allow only certain file formats
$allowed_formats = ["jpg", "png", "jpeg", "gif"];
if (!in_array($imageFileType, $allowed_formats)) {
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    // Error handling if file is not uploaded
    echo "Sorry, your file was not uploaded.";
} else {
    // If everything is ok, try to upload file
    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
        // Update file path in the user table
        $sql_update = "UPDATE user SET userImage_path = '$file_name'  WHERE userID = $user_id";
        if ($conn->query($sql_update) === TRUE) {
            // Success message
            echo "The file " . $file_name . " has been uploaded.";
            // Redirect the user back to the same page after a successful upload
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            // Error handling if query fails
            echo "Error updating database: " . $conn->error;
        }
    } else {
        // Error handling if file is not uploaded
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
