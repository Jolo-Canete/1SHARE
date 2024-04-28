<?php

session_start();

include "1db.php";
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: login.php");
    exit;
}

// If the user is logged in, retrieve their information from the session
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];


$sql = "SELECT * FROM item WHERE itemAvailability = 'Available'";

$result = $conn->query($sql);
$items = $result->fetch_all(MYSQLI_ASSOC);

// Handle the logout process
if (isset($_GET['logout'])) {
    // Destroy the session and all its data
    session_destroy();
    // Redirect the user to the login page
    header("Location: login.php");
    exit;
}
$sql = "SELECT * FROM item WHERE itemQuantity = 0 AND itemAvailability = 'Available'";
$result = mysqli_query($conn, $sql);

// Check if there are any items with quantity 0 and availability 'Available'
if (mysqli_num_rows($result) > 0) {
    // Loop through each item and update its availability to 'Unavailable'
    while ($row = mysqli_fetch_assoc($result)) {
        $itemID = $row['itemID'];

        // Update the item availability
        $updateSql = "UPDATE item SET itemAvailability = 'Unavailable' WHERE itemID = $itemID";
        if (mysqli_query($conn, $updateSql)) {
            // Updated successfully
        } else {
            // Error updating item
        }
    }
}

date_default_timezone_set('Asia/Manila');



?>
