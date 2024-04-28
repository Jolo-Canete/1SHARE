<?php
include "upper.php"; // Include your upper.php file if necessary
include "1db.php"; // Include your database connection file

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $loggedInUserID = $_SESSION['user_id'];

    // Query to fetch outgoing notifications for the logged-in user
    $outgoing_query = "
    SELECT 
        r.requestID, 
        r.userID AS requesterID, 
        r.itemID, 
        r.requestType, 
        r.status, 
        r.remove,
        i.itemName, 
        i.userID AS itemOwnerID, 
        i.itemID AS notificationItemID
    FROM Request r
    JOIN item i ON r.itemID = i.itemID
    WHERE 
        r.userID = ? 
        AND r.dismiss IS NULL
        AND (r.status = 'Accepted' OR r.status = 'Declined')
        AND (r.complete IS NULL OR r.failed IS NULL)
    ";

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
                        <th>REQUESTED ITEM NOTIFICATION:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row_outgoing = $result_outgoing->fetch_assoc()) {
                        $requestID = $row_outgoing['requestID'];
                        $requestType = $row_outgoing['requestType'];
                        $itemName = $row_outgoing['itemName'];
                        $status = $row_outgoing['status'];
                        $remove = $row_outgoing['remove'];

                    ?>
                        <tr>
                            <td>
                                <?php if ($remove !== null) : ?>
                                    <a href="tranCancel.php" style="text-decoration:none;">Cancelled</a>
                                <?php elseif ($status == 'Accepted') : ?>
                                    <a href="tranOngoing.php" style="text-decoration:none;">
                                    <?php elseif ($status == 'Declined') : ?>
                                        <a href="unsuccessful.php" style="text-decoration:none;">
                                        <?php endif; ?>
                                        <?php if ($remove !== null) : ?>
                                            <del>The item owner has <?php echo $status; ?> <?php echo $requestType; ?> request for the item: <?php echo $itemName; ?></del>
                                        <?php else : ?>
                                            The item owner has <?php echo $status; ?> <?php echo $requestType; ?> request for the item: <?php echo $itemName; ?>
                                        <?php endif; ?>
                                        <?php if ($status == 'Accepted' || $status == 'Declined') : ?>
                                        </a>
                                    <?php endif; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger dismiss-btn" data-request-id="<?php echo $requestID; ?>" data-notification-type="outgoing">X</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }

    // Query to fetch notifications for meeting dates and return dates for borrow requests
    $notification_query = "SELECT r.complete, r.remove, r.failed, r.requestID, r.userID AS requesterID, r.itemID, r.requestType, r.status, i.itemName, i.userID AS itemOwnerID, i.itemID AS notificationItemID,
                                  CASE
                                    WHEN r.requestType = 'barter' THEN b.DateTimeMeet
                                    WHEN r.requestType = 'buy' THEN bu.DateTimeMeet
                                    WHEN r.requestType = 'borrow' THEN DATE_ADD(NOW(), INTERVAL i.borrowDuration DAY)
                                    ELSE NULL
                                  END AS MeetingDate,
                                  CASE
                                    WHEN r.requestType = 'borrow' THEN DATE_ADD(NOW(), INTERVAL i.borrowDuration DAY)
                                    ELSE NULL
                                  END AS ReturnDate
                                  FROM Request r
JOIN item i ON r.itemID = i.itemID
LEFT JOIN barter b ON r.requestID = b.requestID
LEFT JOIN buy bu ON r.requestID = bu.requestID
WHERE r.meetdissmiss IS NULL
AND r.status != 'pending'
AND r.complete IS NULL
AND r.failed IS NULL
AND r.remove IS NULL
AND (r.userID = ? OR i.userID = ?)";

    // Prepare and execute the notifications query using prepared statements
    $stmt_notification = $conn->prepare($notification_query);
    $stmt_notification->bind_param("ii", $loggedInUserID, $loggedInUserID);
    $stmt_notification->execute();
    $result_notification = $stmt_notification->get_result();

    // Output the notifications if there are any
    if ($result_notification->num_rows > 0) {
    ?>
        <div class="table-responsive">
            <table class="table" style="border: none;">
                <thead>
                    <tr>
                        <th>MEETING DATE NOTIFICATION:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row_notification = $result_notification->fetch_assoc()) {
                        // Output the notification details, including meeting date and return date based on request type
                        $requestID = $row_notification['requestID'];
                        $requestType = $row_notification['requestType'];
                        $itemName = $row_notification['itemName'];
                        $meetingDate = $row_notification['MeetingDate'] ?? '';
                        $returnDate = $row_notification['ReturnDate'] ?? '';

                        $meetingDateObj = new DateTime('', new DateTimeZone('Asia/Manila'));
                        $returnDateObj = new DateTime('', new DateTimeZone('Asia/Manila'));

                        if (!empty($meetingDate)) {
                            $meetingDateObj->setTimestamp(strtotime($meetingDate));
                        }

                        if (!empty($returnDate)) {
                            $returnDateObj->setTimestamp(strtotime($returnDate));
                        }

                        $meetingDateFormatted = $meetingDateObj->format('F j, Y g:i A T');
                        $returnDateFormatted = $returnDateObj->format('F j, Y g:i A T');

                    ?>
                        <tr>
                            <td>
                                <?php
                                if ($requestType === 'Borrow') {
                                    echo "You have a meeting scheduled on $meetingDateFormatted regarding your $requestType request for the item: ";
                                    echo "<a href='tranOngoing.php' style='text-decoration: none;'>$itemName</a>. ";
                                    echo "The item is expected to be returned by $returnDateFormatted.";
                                } elseif ($meetingDate !== null) {
                                    // Notify the user about the meeting date for other request types
                                    echo " You have a meeting scheduled on $meetingDateFormatted regarding your $requestType request for the item: ";
                                    echo "<a href='tranOngoing.php' style='text-decoration: none;'>$itemName</a>.";
                                } else {
                                    // Notify the user about the request without a meeting date
                                    echo "You have a $requestType request for the item: ";
                                    echo "<a href='tranOngoing.php' style='text-decoration: none;'>$itemName</a>, but no meeting date is scheduled yet.";
                                }
                                ?>
                            </td>
                            <td>
                                <button disabled type="button" class="btn btn-sm btn-danger dismiss-btn" data-request-id="<?php echo $requestID; ?>" data-notification-type="completed">X</button>
                            </td>
                        </tr>
                    <?php

                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }

    // Query to fetch completed transactions for the logged-in user
    $completed_query = "SELECT r.failed, r.requestID, r.userID AS requesterID, r.itemID, r.requestType, r.status, r.complete, i.itemName, i.userID AS itemOwnerID
   FROM Request r
LEFT JOIN item i ON r.itemID = i.itemID
WHERE (
    (i.userID = ? AND r.ownerTranDismiss IS NULL) 
    OR 
    (r.userID = ? AND r.requesterTranDismiss IS NULL)
)
AND (r.complete = 'Yes' OR r.failed = 'Yes')
";


    // Prepare and execute the completed transactions query using prepared statements
    $stmt_completed = $conn->prepare($completed_query);
    $stmt_completed->bind_param("ii", $loggedInUserID, $loggedInUserID);
    $stmt_completed->execute();
    $result_completed = $stmt_completed->get_result();

    // Output the completed transactions if there are any
    if ($result_completed->num_rows > 0) {
    ?>
        <div class="table-responsive">
            <table class="table" style="border: none;">
                <thead>
                    <tr>
                        <th>TRANSACTION UPDATE NOTIFICATION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row_completed = $result_completed->fetch_assoc()) {
                        $requestID = $row_completed['requestID'];
                        $requestType = $row_completed['requestType'];
                        $itemName = $row_completed['itemName'];
                        $complete = $row_completed['complete'];
                        $failed = $row_completed['failed'];

                        $output = "";
                        $redict = "";

                        if ($complete == null) {
                            $output = "failed";
                            $redict = "tranFailed.php";
                        } elseif ($complete !== null) {
                            $output = "completed";
                            $redict = "tranSuccessful.php";
                        };
                    ?>
                        <tr>
                            <td>
                                <a href="<?php echo $redict ?>" style="text-decoration:none;">
                                    <?php echo "Transaction for $requestType request for the item: $itemName is $output."; ?>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger dismiss-btn" data-request-id="<?php echo $requestID; ?>" data-notification-type="completed">X</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }

    // Query to fetch incoming notifications for the logged-in user
    $incoming_query = "SELECT r.requestID, r.userID AS requesterID, r.itemID, r.requestType, r.status, i.itemName, i.userID AS itemOwnerID, i.itemID AS notificationItemID, u.username AS requesterUsername
    FROM Request r
    JOIN user u ON r.userID = u.userID
    JOIN item i ON r.itemID = i.itemID
    WHERE (r.itemID IN (SELECT itemID FROM item WHERE userID = ? AND (r.status = 'Available' OR r.status = 'Pending')))
    AND (i.userID = ? AND r.incomingDismiss IS NULL)";


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
                        <th>INCOMING REQUEST NOTIFICATION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row_incoming = $result_incoming->fetch_assoc()) {
                        $requesterID = $row_incoming['requesterUsername'];
                        $requestType = $row_incoming['requestType'];
                        $itemName = $row_incoming['itemName'];
                        $requestID = $row_incoming['requestID']; // Add this line to fetch requestID
                    ?>
                        <tr>
                            <td>
                                <a href="incoming.php" style="text-decoration:none;">
                                    <?php echo "New $requestType request from  $requesterID for item: $itemName"; ?>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger dismiss-btn" data-request-id="<?php echo $requestID; ?>" data-notification-type="incoming">X</button>
                            </td>
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
    // Handle case when user is not logged in
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
                } else if (notificationType === 'completed') {
                    // Update tranDismiss to 'Yes' in the database
                    $('button[data-request-id="' + requestID + '"]').closest('tr').remove();
                } else if (notificationType === 'meeting') {
                    // Update meetDismiss to 'Yes' in the database
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