<?php
include "1db.php"; // Include your database connection file

// Check if the requestID and notificationType parameters are set
if (isset($_POST['requestID']) && isset($_POST['notificationType'])) {
    // Get the requestID and notificationType from the POST parameters
    $requestID = $_POST['requestID'];
    $notificationType = $_POST['notificationType'];

    // Update the database based on the notificationType
    if ($notificationType === 'outgoing') {
        // For outgoing notifications, you might update a 'dismiss' column to 'Yes'
        // For example:
        $update_query = "UPDATE Request SET dismiss = 'Yes' WHERE requestID = ?";
    } elseif ($notificationType === 'incoming') {
        // For incoming notifications, update the 'incomingDismiss' column to 'Yes'
        // For example:
        $update_query = "UPDATE Request SET incomingDismiss = 'Yes' WHERE requestID = ?";
    }

    // Prepare and execute the update query using prepared statements
    $stmt_update = $conn->prepare($update_query);
    $stmt_update->bind_param("i", $requestID);
    $stmt_update->execute();

    // Check if the update was successful
    if ($stmt_update->affected_rows > 0) {
        // The update was successful
        echo "Notification dismissed successfully.";
    } else {
        // The update failed
        echo "Error: Notification dismissal failed.";
    }
} else {
    // Required parameters are missing
    echo "Error: Missing parameters.";
}
?>
