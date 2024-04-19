<?php
include "upper.php"; // Include your upper.php file if necessary
include "1db.php"; // Include your database connection file

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $loggedInUserID = $_SESSION['user_id'];

    // Query to fetch outgoing notifications for the logged-in user
    $outgoing_query = "SELECT r.requestID, r.userID AS requesterID, r.itemID, r.requestType, r.status, i.itemName, i.userID AS itemOwnerID, i.itemID AS notificationItemID
              FROM Request r
              JOIN item i ON r.itemID = i.itemID
              WHERE r.userID = ? AND r.dismiss IS NULL AND (r.status = 'Accepted' OR r.status = 'Declined')";

    // Prepare and execute the outgoing notifications query using prepared statements
    $stmt_outgoing = $conn->prepare($outgoing_query);
    $stmt_outgoing->bind_param("i", $loggedInUserID);
    $stmt_outgoing->execute();
    $result_outgoing = $stmt_outgoing->get_result();

    // Output the outgoing notifications if there are any
    if ($result_outgoing->num_rows > 0) {
?>
        <div class="table-responsive">
            <table class="table" style="border: none;">
                <thead>
                    <tr>
                    <b>REQUESTED ITEM NOTIFICATION:</b> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row_outgoing = $result_outgoing->fetch_assoc()) {
                        $requestID = $row_outgoing['requestID'];
                        $requestType = $row_outgoing['requestType'];
                        $itemName = $row_outgoing['itemName'];
                        $status = $row_outgoing['status'];
                    ?>
                        <tr>
                            <td>The item owner has <?php echo $status; ?> <?php echo $requestType; ?> request for the item: <?php echo $itemName; ?></td>
                            <td><button type="button" class="btn btn-sm btn-danger dismiss-btn" data-request-id="<?php echo $requestID; ?>" data-notification-type="outgoing">X</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    } else {
       
    }
 
    
    // Query to fetch incoming notifications for the logged-in user
    $incoming_query = "SELECT r.requestID, r.userID AS requesterID, r.itemID, r.requestType, r.status, i.itemName, i.userID AS itemOwnerID, i.itemID AS notificationItemID, u.username AS requesterUsername
    FROM Request r
JOIN user u ON r.userID = u.userID
JOIN item i ON r.itemID = i.itemID
WHERE (r.itemID IN (SELECT itemID FROM item WHERE userID = ? AND r.status = 'Available' AND r.status = 'Pending'))
OR (i.userID = ? AND r.incomingDismiss IS NULL)";



    // Prepare and execute the incoming notifications query using prepared statements
    $stmt_incoming = $conn->prepare($incoming_query);
    $stmt_incoming->bind_param("ii", $loggedInUserID, $loggedInUserID);
    $stmt_incoming->execute();
    $result_incoming = $stmt_incoming->get_result();

    // Output incoming notifications
    if ($result_incoming->num_rows > 0) {
    ?>
   
        <div class="table-responsive">
            <table class="table" style="border: none;">
                <thead>
                    <tr>
                   <b>INCOMING REQUEST NOTIFICATION:</b> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row_incoming = $result_incoming->fetch_assoc()) {
                        $requesterID = $row_incoming['requesterUsername'];
                        $requestType = $row_incoming['requestType'];
                        $itemName = $row_incoming['itemName'];
                    ?>
                        <tr>
                            <td><?php echo "New $requestType request from  $requesterID for item: $itemName"; ?></td>
                            <td><button type="button" class="btn btn-sm btn-danger dismiss-btn" data-request-id="<?php echo $row_incoming['requestID']; ?>" data-notification-type="incoming">X</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
<?php
    } else {
        // Output message if there are no incoming notifications
    }
} else {

}
?>

<script>
    function dismissNotification(requestID, notificationType) {
        // Send AJAX request to dismiss the notification
        $.ajax({
            type: 'POST',
            url: 'dismiss_notification.php',
            data: {
                requestID: requestID,
                notificationType: notificationType // Pass notification type as a parameter
            },
            success: function(response) {
                // Remove the dismissed notification row from the DOM based on notification type
                if (notificationType === 'outgoing') {
                    $('button[data-request-id="' + requestID + '"]').closest('tr').remove();
                } else if (notificationType === 'incoming') {
                    // Update incomingDismiss to 'Yes' in the database
                    $('button[data-request-id="' + requestID + '"]').closest('tr').remove();
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Error dismissing notification");
            }
        });
    }
</script>
<script>
    // Handle click on dismiss button for both outgoing and incoming notifications
    $(document).on('click', '.dismiss-btn', function() {
        var requestID = $(this).data('request-id');
        var notificationType = $(this).data('notification-type'); // Get the notification type
        dismissNotification(requestID, notificationType);
    });
</script>