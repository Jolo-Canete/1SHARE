<?php

include 'upper.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect them to the login page
    echo "<script>window.location.href = 'login.php';</script>";
    exit;
}

// If the user is logged in, retrieve their information from the session
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];

// Prepare and bind the parameter
$stmt = $conn->prepare("SELECT * FROM user WHERE userID = ?");
$stmt->bind_param("i", $user_id);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();

    // Access the columns
    $username = $row['username'];
    // Access other columns as needed

    // Check status and redirect if necessary
    $status = $row['status']; // Assuming status column contains the user status
    if ($status == 'Unverified') {
        // JavaScript redirection to ban.php
        echo "<script>window.location.href = 'wait.php';</script>";
        exit(); // Make sure to exit after redirection
    } elseif ($status == 'Verified') {
        // JavaScript redirection to wait.php
        echo "<script>window.location.href = 'home.php';</script>";
        exit(); // Make sure to exit after redirection
    }

    // Proceed with other code if the user status is neither 'ban' nor 'Unverified'
} else {
    // Handle case where no user with the given userID is found
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Ban Notification</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 400px;
            width: 90%;
        }

        h1 {
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .emoji {
            font-size: 3rem;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="emoji">🚫</div>
        <h1>ACCOUNT BANNED!</h1>
        <p>Your account has been banned by our system due to violations of our terms and conditions.</p>
        <p>The barangay office is open from Monday to Friday, 8:00 AM to 5:00 PM.</p>
        <p>To appeal this decision, please contact your barangay or visit the barangay office within 7 days from the date of this notification.</p>
        <p>Failure to appeal within the given time frame may result in permanent account suspension.</p>
    </div>
</body>

</html>
