Wasadadoadasdw
poya sa ert



> Make a check index if username is taken (apog)

yes yes x pag dle tas nag red sya or username already taken tas ano sa pag okay ano green 
(si paula ray bahala sa design gogogo :> -apog)




<?php 
if (isset($_POST['signup'])) {
    // Gather the Input data
    $first_name = trim($_POST['first_name']);
    $middle_name = trim($_POST['middle_name']);
    $last_name = trim($_POST['last_name']);
    $purok = trim($_POST['purok']);
    $zone = trim($_POST['zone']);
    $mobile_number = trim($_POST['mobile_number']);
    $email = trim($_POST['email_address']);
    $username = trim($_POST['username']);
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);

    if (empty($first_name) || empty($middle_name) || empty($last_name) || empty($purok) || empty($zone) || empty($mobile_number) || empty($email) || empty($username) || empty($password1) || empty($password2)) {
        echo "<div class='alert alert-warning mt-3'>Error: Signup Failed is incomplete.</div>" ;
        return;
    }

    // Upload Image to the different directory
    $targetDirectory = "verify/";
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    // Get the uploaded image information
    $uploadedImagePath = $_FILES['fileToUpload']['tmp_name'];
    $uploadedImageName = $_FILES['fileToUpload']['name'];

    // Move the uploaded file to the target directory
    $targetFile = $targetDirectory . basename($uploadedImageName);
    if (move_uploaded_file($uploadedImagePath, $targetFile)) {
        echo "<div class='alert alert-success mt-3'>The file " . basename($uploadedImageName) . " has been uploaded.</div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Failed to move uploaded file.</div>";
        return;
    }

    // Capture the correct time and date
    $dateJoined = date('Y-m-d H:i:s');

    // Check if password matched
    if ($password1 !== $password2) {
        echo 'Password does not match';
    } else {
        // rename the password
        $default_password = password_hash($password1, PASSWORD_DEFAULT);

        // Start a transaction
        $conn->begin_transaction();

        // Insert into user table without the verifyImage_path
        $sql_user = "INSERT INTO user (firstName, middleName, lastName, contactNumber, zone, purok, dateJoined, userEmail, username, password) VALUES ('$first_name', '$middle_name', '$last_name', '$mobile_number', '$zone', '$purok', '$dateJoined', '$email', '$username', '$default_password')";

        if ($conn->query($sql_user) === TRUE) {
            // Get the last inserted ID
            $last_id = $conn->insert_id;

            // Rename the uploaded file to its corresponding auto-incremented primary key
            $newFileName = $last_id . '.' . pathinfo($uploadedImageName, PATHINFO_EXTENSION);
            rename($targetFile, $targetDirectory . $newFileName);

            // Update the verifyImage_path in the database
            $sql_update = "UPDATE user SET verifyImage_path = '$newFileName' WHERE id = $last_id";
            $conn->query($sql_update);

            $conn->commit();
            echo '<script>alert("You have successfully Signed up ' . $first_name . '"); window.location.href = "loading.php"; </script>';
        } else {
            // Rollback the transaction if there is an error in the first query
            $conn->rollback();
            echo 'Error: ' . $sql_user . '<br>' . $conn->error;
        }
    }
}



?>