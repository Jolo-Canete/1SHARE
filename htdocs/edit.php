<?php
include "nav.php";

// Check if itemID is provided in the query parameter
if(isset($_GET['itemID'])) {
    // Sanitize the input
    $itemID = $_GET['itemID'];

    // Retrieve item details from the database using the provided itemID
    $sql = "SELECT * FROM item WHERE itemID = '$itemID'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        // Output the retrieved item details
        $item = mysqli_fetch_assoc($result);
        echo "<h1>Edit Item: {$item['itemName']}</h1>";
        echo "<p>Item ID: {$item['itemID']}</p>";
        echo "<p>Category: {$item['category']}</p>";
        echo "<p>Description: {$item['ItemDescription']}</p>";
        echo "<p>Condition: {$item['itemCondition']}</p>";
        echo "<p>Availability: {$item['itemAvailability']}</p>";
        echo "<p>Request Type: {$item['requestType']}</p>";
        // Add more details as needed

        // You can use the retrieved item details to pre-fill the edit form fields
    } else {
        // Handle error if itemID is not found
        echo 'Item not found';
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle error if itemID is not provided
    echo 'Item ID is required';
}
?>
