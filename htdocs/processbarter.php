<?php
// Include the database connection file
include "1db.php";
include "upper.php";

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the request is made using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the AJAX request
    $selectedItems = $_POST['selectedItems'];
    $dateTimeMeet = $_POST['dateTimeMeet'];
    $itemId = $_POST['itemId']; // Assuming itemId is sent via AJAX

    // Ensure $user_id is defined and contains the correct user ID
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Insert into request table
        $requestDateTime = date('Y-m-d H:i:s'); // Current date and time
        $userId = $user_id;

        // Prepare the insert query for request table
        $insertRequestQuery = "INSERT INTO Request (status, RequestType, request_DateTime, userID, itemID) 
                            VALUES ('pending', 'Barter', ?, ?, ?)";

        // Prepare and bind parameters for the insert query
        $stmt = $conn->prepare($insertRequestQuery);
        $stmt->bind_param("sss", $requestDateTime, $userId, $itemId);

        // Execute the insert query for request table
        if ($stmt->execute()) {
            // Insert into transaction table (barter)
            $transactionQuery = "INSERT INTO barter (requestID, item1, item2, item3, DateTimeMeet, status) 
                                VALUES (LAST_INSERT_ID(), ?, ?, ?, ?, 'pending')";
            
            // Prepare and bind parameters for the insert query
            $stmt = $conn->prepare($transactionQuery);
            $stmt->bind_param("ssss", $selectedItems[0], $selectedItems[1], $selectedItems[2], $dateTimeMeet);

            // Execute the insert query for barter table
            if ($stmt->execute()) {
                echo "Success"; // Return success message
            } else {
                echo "Error: " . $stmt->error; // Return error message
            }
        } else {
            echo "Error: " . $stmt->error; // Return error message
        }

        // Close statement
        $stmt->close();
    } else {
        echo "User ID not found"; // Return error message if user ID is not defined
    }
} else {
    echo "Invalid request"; // Return message for invalid request method
}
?>