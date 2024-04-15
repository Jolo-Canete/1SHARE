<?php ob_start(); ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login/Signup</title>
    <style>
        * {
            font-size: 20px;
        }
        .container {
            display: grid;
            justify-content: center;
            align-items: center;
            height: 500px; /* Set a height for the container */
        }
        .form-group {
            margin-bottom: 10px; /* Adjust spacing between form groups */
        }
        label {
            display: inline-block;
            width: 150px; /* Set the width of the labels */
            text-align: right; /* Align labels to the right */
            margin-right: 10px; /* Adjust spacing between labels and input fields */
        }
        input[type="text"],
        input[type="password"] {
            width: 200px; /* Set the width of text and password inputs */
        }
    </style>
</head>
<body>
    <?php include "1db.php"; ?>
    <h1 align="center">ADMIN PAGE</h1> <hr>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <h3>Login</h3>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <input type="submit" value="Enter" name="login">
            </div>
            <hr>
            <div class="form-group">
                <h3>Signup</h3>
            </div>
            <div class="form-group">
                <label for="adFirstName">First name:</label>
                <input type="text" name="adFirstName" id="adFirstName">
            </div>
            <div class="form-group">
                <label for="adMiddleName">Middle name:</label>
                <input type="text" name="adMiddleName" id="adMiddleName">
            </div>
            <div class="form-group">
                <label for="adLastName">Last name:</label>
                <input type="text" name="adLastName" id="adLastName">
            </div>
            <div class="form-group">
                <label for="barangayPosition">Barangay Position:</label>
                <input type="text" name="barangayPosition" id="barangayPosition">
            </div>
            <div class="form-group">
                <label for="adUsername">Username:</label>
                <input type="text" name="adUsername" id="adUsername">
            </div>
            <div class="form-group">
                <label for="adPassword">Password:</label>
                <input type="password" name="adPassword" id="adPassword">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" name="signup">
            </div>
        </form>
    </div>


<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT * FROM admin WHERE adUsername = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row["adPassword"];

        // Compare the entered password with the stored password
        if ($password == $stored_password) {
            // Passwords match, login successful
            echo '<script>alert("You have successfully logged in '. $username .'"); window.location.href = "home.php"; </script>';
            exit();
        } else {
            // Invalid password
            echo "Invalid username or password.";
        }
    } else {
        // User not found
        echo "User is not found.";
    }
}

// Handle sign-up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $adFirstName = $_POST["adFirstName"];
    $adMiddleName = $_POST["adMiddleName"];
    $adLastName = $_POST["adLastName"];
    $barangayPosition = $_POST["barangayPosition"];
    $adUsername = $_POST["adUsername"];
    $adPassword = $_POST["adPassword"];


    $sql = "INSERT INTO admin (adFirstname, adMiddleName, adLastName, barangayPosition, adUsername, adPassword) VALUES ('$adFirstName', '$adMiddleName', '$adLastName', '$barangayPosition', '$adUsername', '$adPassword')";

    if ($conn->query($sql) === TRUE) {
        // Sign-up successful, redirect to the login page
        echo '<script>alert("You have successfully signed in '. $adFirstName .'"); window.location.href = "home.php"; </script>';;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
ob_end_flush();
?>
</body>
</html>