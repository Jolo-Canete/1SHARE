<?php
include "1db.php"; // Include your database connection file

// Check if the requestID and notificationType parameters are set
if (isset($_POST['requestID']) && isset($_POST['notificationType'])) {
    // Get the requestID and notificationType from the POST parameters
    $requestID = $_POST['requestID'];
    $notificationType = $_POST['notificationType'];

    // Update the database based on the notificationType
    if ($notificationType === 'outgoing') {
        // For outgoing notifications, update the 'dismiss' column to 'Yes'
        $update_query = "UPDATE Request SET dismiss = 'Yes' WHERE requestID = ?";
    } elseif ($notificationType === 'incoming') {
        // For incoming notifications, update the 'incomingDismiss' column to 'Yes'
        $update_query = "UPDATE Request SET incomingDismiss = 'Yes' WHERE requestID = ?";
    } elseif ($notificationType === 'completed') {
        // For completed notifications, update the appropriate 'tranDismiss' column based on the logged-in user
        $update_query = "";
        $userID_query = "SELECT userID FROM Request WHERE requestID = ?";
        
        // Prepare and execute the query to fetch userID from Request table
        $stmt_userID = $conn->prepare($userID_query);
        $stmt_userID->bind_param("i", $requestID);
        $stmt_userID->execute();
        $result_userID = $stmt_userID->get_result();
        
        if ($result_userID->num_rows > 0) {
            // Fetch userID from the Request table
            $row_userID = $result_userID->fetch_assoc();
            $userID = $row_userID['userID'];
    
            // Check if the logged-in user is the requester
            if ($logged_in_user_id == $userID) {
                // If the logged-in user is the requester, update 'requesterTranDismiss'
                $update_query = "UPDATE Request SET requesterTranDismiss = 'Yes' WHERE requestID = ?";
            } else {
                // If the logged-in user is not the requester, update 'ownerTranDismiss'
                $update_query = "UPDATE Request SET ownerTranDismiss = 'Yes' WHERE requestID = ?";
            }
            
            // Prepare and execute the update query
            $stmt_update = $conn->prepare($update_query);
            $stmt_update->bind_param("i", $requestID);
            $stmt_update->execute();
        }
    
    } elseif ($notificationType === 'meeting') {
        // For meeting notifications, update the 'meetDismiss' column to 'Yes'
        $update_query = "UPDATE Request SET meetDissmiss = 'Yes' WHERE requestID = ?";
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
