<?php
include "nav.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: login.php");
    exit;
}

// If the user is logged in, retrieve their information from the session
$user_id = $_SESSION['user_id'];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if requestId is set and valid
    if (isset($_POST['requestId']) && is_numeric($_POST['requestId'])) {
        $requestId = $_POST['requestId'];

        // Check the value of the received checkbox
        if (isset($_POST['received'])) {
            $receivedValue = $_POST['received'];

            // Update the Request table based on user_id and requestId and received value
            $query = "UPDATE Request SET ";
            if ($receivedValue === "Yes") {
                $query .= ($user_id == $row['userID']) ? "requesterSuccess = 'Yes' " : "ownerSuccess = 'Yes' ";
            } elseif ($receivedValue === "No") {
                $query .= ($user_id == $row['userID']) ? "requesterSuccess = 'No' " : "ownerSuccess = 'No' ";

                // Check if both requesterSuccess and ownerSuccess are 'No', then update fail to 'Yes' if no proof is provided
                $checkFailQuery = "SELECT requesterProof, ownerProof FROM buy WHERE requestID = $requestId";
                $result = $conn->query($checkFailQuery);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if (empty($row['requesterProof']) && empty($row['ownerProof'])) {
                        $query .= "; UPDATE Request SET fail = 'Yes' WHERE requestID = $requestId AND requesterSuccess = 'No' AND ownerSuccess = 'No'";
                    }
                }
            }

            // Update the Request table
            $query .= " WHERE requestID = $requestId";

            // Execute the query
            if ($conn->query($query) === TRUE) {
                // Redirect back to the page
                header("Location: receive_buy_item.php");
                exit;
            } else {
                echo "Failed to update request. Error: " . $conn->error;
                exit;
            }
        } else {
            echo "Received value not set.";
            exit;
        }
    } else {
        echo "Invalid request ID.";
        exit;
    }
}

// If the form is not submitted, do nothing
?>
