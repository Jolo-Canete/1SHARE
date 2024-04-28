<?php
// Assuming you have a database connection established

// Check if requestID is provided
if (isset($_POST['requestID'])) {
    $requestID = $_POST['requestID'];

    // Prepare and execute SQL query to fetch userID based on requestID
    $stmt = $pdo->prepare("SELECT userID FROM Request WHERE requestID = ?");
    $stmt->execute([$requestID]);
    
    // Fetch the userID
    $userID = $stmt->fetchColumn();

    // Return the userID
    echo $userID;
} else {
    // If requestID is not provided, return an error message
    echo "Error: Request ID is not provided";
}
?>
