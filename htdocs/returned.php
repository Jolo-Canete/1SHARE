<?php
include "1db.php";
include "upper.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the values from the POST request
    $received = mysqli_real_escape_string($conn, $_POST['received']);
    $proof = !empty($_FILES['proof']['name']) ? mysqli_real_escape_string($conn, $_FILES['proof']['name']) : null;
    $requestId = mysqli_real_escape_string($conn, $_POST['requestId']);

    // Get the logged-in user ID
    $userId = $_SESSION['user_id'];

    $dateTimeComplete = date("Y-m-d H:i:s");

    // Handle the "No" case
    if ($received === 'No') {
        // Update the Request table with failed = 'Yes' and no proof file
        $sql = "UPDATE Request SET complete = NULL, failed = 'Yes', requesterSuccess = NULL, ownerSuccess = NULL WHERE requestID = '$requestId'";
        if (mysqli_query($conn, $sql)) {
            // Update the DateTimeCompleted in the buy table
            $sqlBuy = "UPDATE borrow SET DateTimeCompleted = '$dateTimeComplete' WHERE requestID = '$requestId'";
            if (mysqli_query($conn, $sqlBuy)) {
                echo "success";
            } else {
                echo "Error updating DateTimeCompleted: " . mysqli_error($conn);
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        exit; // Exit the script to prevent further file upload processing
    }

    // Generate a unique file name
    $fileExtension = pathinfo($proof, PATHINFO_EXTENSION);
    $uniqueFileName = uniqid() . "." . $fileExtension;

    // Handle the proof file upload
    $targetDir = "proof/";
    $targetFile = $targetDir . $uniqueFileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image or a fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["proof"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    // Check if the file already exists
    if (file_exists($targetFile)) {
        $uploadOk = 0;
    }

    // Check the file size
    if ($_FILES["proof"]["size"] > 5000000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
    }

    // If everything is OK, upload the file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["proof"]["tmp_name"], $targetFile)) {
            // Retrieve the userId from the Request table
            $sql = "SELECT userID FROM Request WHERE requestID = '$requestId'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $requestUserId = $row['userID'];

            // Update the appropriate column based on the logged-in user and the received value
            if ($userId == $requestUserId) {
                $sql = "UPDATE Request SET requesterSuccess = '$uniqueFileName', complete = 'Yes', failed = Null WHERE requestID = '$requestId'";
            } else {
                $sql = "UPDATE Request SET ownerSuccess = '$uniqueFileName', complete = 'Yes', failed = Null WHERE requestID = '$requestId'";
            }

            if (mysqli_query($conn, $sql)) {
                // Update the DateTimeCompleted in the buy table
                $sqlBuy = "UPDATE borrow SET DateTimeCompleted = '$dateTimeComplete' WHERE requestID = '$requestId'";
                if (mysqli_query($conn, $sqlBuy)) {
                    echo "success";
                } else {
                    echo "Error updating DateTimeCompleted: " . mysqli_error($conn);
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading the proof file.";
        }
    } else {
        echo "Error: The proof file is not a valid image.";
    }
}
?>