<?php

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: login.php");
    exit;
}

// If the user is logged in, retrieve their information from the session
$logged_in_user_id = $_SESSION['user_id'];

// Query to get the count of requests with null dismiss attribute for the logged-in user
$request_count_query = "SELECT COUNT(*) as request_count 
FROM Request r
JOIN item i ON r.itemID = i.itemID
WHERE r.userID = $logged_in_user_id 
AND i.userID != $logged_in_user_id
AND r.status != 'pending'
AND r.dismiss IS NULL";
$request_count_result = mysqli_query($conn, $request_count_query);

if ($request_count_result === false) {
    echo "Error executing request_count_query: " . mysqli_error($conn);
} else {
    $request_count_row = mysqli_fetch_assoc($request_count_result);
    $request_count = ($request_count_row) ? $request_count_row['request_count'] : 0;
}


$item_count_query = "SELECT COUNT(*) as item_count
FROM Request r
JOIN item i ON r.itemID = i.itemID
WHERE r.incomingDismiss IS NULL
AND r.status = 'pending'
AND r.userID != $logged_in_user_id
AND i.userID = $logged_in_user_id";
$item_count_result = mysqli_query($conn, $item_count_query);

if ($item_count_result === false) {
    echo "Error executing item_count_query: " . mysqli_error($conn);
} else {
    $item_count_row = mysqli_fetch_assoc($item_count_result);
    $item_count = ($item_count_row) ? $item_count_row['item_count'] : 0;
}


$transact_count_query = "
SELECT COUNT(*) as transact_count
FROM Request r
LEFT JOIN item i ON r.itemID = i.itemID
WHERE (
    (i.userID = $logged_in_user_id AND r.ownerTranDismiss IS NULL) 
    OR 
    (r.userID = $logged_in_user_id AND r.requesterTranDismiss IS NULL)
)
AND (r.complete = 'Yes' OR r.failed = 'Yes')
";



$transact_count_result = mysqli_query($conn, $transact_count_query);

if ($transact_count_result === false) {
    echo "Error executing transact_count_query: " . mysqli_error($conn);
} else {
    $transact_count_row = mysqli_fetch_assoc($transact_count_result);
    $transact_count = ($transact_count_row) ? $transact_count_row['transact_count'] : 0;
}

$meet_count_query = "SELECT COUNT(*) AS meet_count
FROM Request r
JOIN item i ON r.itemID = i.itemID
WHERE r.meetdissmiss IS NULL
AND r.status != 'pending'
AND r.complete IS NULL
AND r.failed IS NULL
AND r.remove IS NULL
AND (r.userID = $logged_in_user_id OR i.userID = $logged_in_user_id)";



$meet_count_result = mysqli_query($conn, $meet_count_query);

if ($meet_count_result === false) {
    echo "Error executing meet_count_query: " . mysqli_error($conn);
} else {
    $meet_count_row = mysqli_fetch_assoc($meet_count_result);
    $meet_count = ($meet_count_row) ? $meet_count_row['meet_count'] : 0;
}




// Calculate the total unread messages count
$total_unread_count = $request_count + $item_count +  $transact_count + $meet_count;



