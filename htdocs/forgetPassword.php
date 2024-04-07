<?php session_start();   ?>

<!-- get the session variables -->
<?php 
  $username = $_SESSION['username'] ;
 $email= $_SESSION['email'] ;

// Check if the user is logged in
if (isset($_GET['logout'])) {
    // Destroy the session and all its data
    session_destroy();
    // Redirect the user to the login page
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="?logout=true">Back to login</a>
    <?php
    // Display errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

      // Post the form
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            $email = trim($_POST['email']);
    
            // Check if the email is empty
              if (empty($email)) {
                echo 'Please enter your email. <br>
                <form method="POST" action="">
                <label for="email">Please enter your registered email again:</label>
                <input type="text" id="email" name="email" required>
                <input type="submit" name="submit" value="Submit">
                </form>';
            } elseif ($email != $legitEmail) {
                echo 'The email you entered is not the same as the registered email, Please try again. <br>
                <form method="POST" action="">
                <label for="email">Please enter your registered email again:</label>
                <input type="text" id="email" name="email" required>
                <input type="submit" name="submit" value="Submit">
                </form>';
            } else {
                // Display the new password input field
                    echo '
                    <form method="POST" action="">
                        <input type="hidden" name="email" value="' . $email . '">
                        <label for="new_password">New Password:</label>
                        <input type="password" id="new_password" name="new_password" required>
                        <input type="submit" value="Change Password">
                    </form>';
            }
    // Update the password
        } else if (isset($_POST['new_password'])) {
            $email = trim($_POST['email']);
            $newPassword =trim($_POST['new_password']);
    
            // Update the password in the database
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE user SET password = '$hashedPassword' WHERE userEmail = '$email'";
    
            if ($conn->query($sql) === TRUE) {
                echo "Password changed successfully!";
                header("Location: login.php");
                exit();
            } else {
                echo "Error updating password: " . $conn->error;
            }
        }
    } else {
        // Display the email input field
        echo '
        <form method="POST" action="">
            <label for="text">Please enter your registered email</label>
            <input type="text" id="email" name="email" required>
            <input type="submit" name="submit" value="Submit">
        </form>

        ';
    }
    

    
    $conn->close();
    ?>
</body>
</html>