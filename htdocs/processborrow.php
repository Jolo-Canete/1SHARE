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
    $dateTimeMeet = $_POST['dateTimeMeet'];
    $itemId = $_POST['itemId']; // Assuming itemId is sent via AJAX
    $quantity = $_POST['quantity']; // Retrieve the quantity input

    // Ensure $user_id is defined and contains the correct user ID
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Insert into request table
        $requestDateTime = date('Y-m-d H:i:s'); // Current date and time
        $userId = $user_id;

        // Prepare the insert query for request table
        $insertRequestQuery = "INSERT INTO Request (status, RequestType, quantity, request_DateTime, userID, itemID) 
                            VALUES ('pending', 'Borrow', ?, ?, ?, ?)";

        // Prepare and bind parameters for the insert query
        $stmt = $conn->prepare($insertRequestQuery);
        $stmt->bind_param("ssss", $quantity, $requestDateTime, $userId, $itemId);

        // Execute the insert query for request table
        if ($stmt->execute()) {
            // Retrieve the generated request ID
            $requestId = $stmt->insert_id;

            // Format dateTimeMeet variable to match MySQL datetime format
            $formattedDateTimeMeet = date('Y-m-d H:i:s', strtotime($dateTimeMeet));

            // Insert into transaction table (borrow)
            $transactionQuery = "INSERT INTO borrow (requestID, item1, DateTimeMeet, status) 
                                VALUES (?, ?, ?, 'pending')";
            
            // Prepare and bind parameters for the insert query
            $stmt2 = $conn->prepare($transactionQuery);
            $stmt2->bind_param("iss", $requestId, $itemId, $formattedDateTimeMeet);

            // Execute the insert query for borrow table
            if ($stmt2->execute()) {
                echo "Success"; // Return success message
            } else {
                echo "Error: " . $stmt2->error; // Return error message
            }

            // Close statement
            $stmt2->close();
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
