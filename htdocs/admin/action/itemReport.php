<?php 
include '../1db.php';
$itemID = $_GET['item_id'];

// Prepare the sql statement to get all the data from user,item and reporteditem
$sql = "SELECT re.*, 
        u1.firstName as reporterFirstName, u1.lastName as reporterLastName, 
        u2.firstName as reportedFirstName, u2.lastName as reportedLastName,
        i.itemName as itemName, i.itemReports as itemReports, i.itemID as itemID,
        u2.userID as userID, u2.userReports as userReports
        FROM reportedItem re
        JOIN user u1 ON re.userID = u1.userID
        JOIN item i ON re.itemID = i.itemID
        JOIN user u2 ON i.userID = u2.userID
        WHERE re.reportedItemID = $itemID";


// Execute the SQL query
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    // Display an error message and redirect the user
    echo "<script>alert('Error updating Action, please try again')</script>";
    echo "<script>window.location.href='../ad_itemReport.php'</script>";
    exit;

// Check if the query returned any rows
} elseif($result->num_rows == 0) {

    // Display a message indicating that the user was not found and redirect the user
    echo "<script>alert('Item not found')</script>";
    echo "<script>window.location.href='../ad_itemReport.php'</script>";
    exit;
    
} else {
    // Fetch the result as an associative array
    $itemData = $result->fetch_assoc();

    $itemDateTIme = $itemData['dateTime'];

    // seperate the date and time
    $ReportDate = date('Y-m-d', strtotime($itemDateTIme));
    $time = date('H:i:s', strtotime($itemDateTIme));

    // Sort the date to month, day and year
    $date = explode('-', $ReportDate);
    $year = $date[0];
    $month = $date[1];
    $day = $date[2];

    // I want the month and day to readable
    $monthName = date('F', mktime(0, 0, 0, $month, 10));
    $dayName = date('l', mktime(0, 0, 0, $month, $day, $year));

    $ReportDate = "$monthName $day, $year";

    // Sort the time to hour, minute and second and use AM/PM
    $time = explode(':', $time);
    $hour = $time[0];
    $minute = $time[1];
    $second = $time[2];

    if ($hour > 12) {
        $hour = $hour - 12;
        $time = "$hour:$minute PM";
    } else {
        $time = "$hour:$minute AM";
    }

}

  // Make the image src dynamic
  $base_dir = '/htdocs/';
  $imagePath = $base_dir . 'reportedItem/' . $itemData['ss_path'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Report</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <style>
    .owner-name {
      color: #0047ab;
    }

    .item-name {
        color: blue;
    }

    .report-owner{
        color:firebrick;
    }

    .card-header{
        background-color: #c5adad;
    }

    .card-header, .card-body {
      padding: 0.75rem 1.25rem; /* Adjust the padding as needed */
    }
  </style>
</head>
<body>
  <div class="container my-5">
    <div class="card card-outline-primary">
      <div class="card-header">
        <h4>Item Report</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <p>Reported By: <span class="report-owner"><?php echo $itemData['reporterFirstName'] . ' ' . $itemData['reporterLastName'] ?></span></p>
            <h5>Reported Item:  <span class="item-name"><?php echo $itemData['itemName'] ?></span></h5>
            <p>Item owned by: <span class="owner-name"><?php echo $itemData['reportedFirstName'] . ' ' . $itemData['reportedLastName'] ?></span></p>
            <div class="mb-3">
              <label for="reason" class="form-label">Reason for Report:</label>
              <textarea class="form-control" id="reason" rows="8" cols="50"><?php echo $itemData['reason'] ?></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <h5>Proof of Violation</h5>
            <img src="<?php echo $imagePath?>" width="400px" height="400px" alt="Proof Image" class="img-fluid mb-3">
            <div class="d-flex align-items-center">
            <i class="bi bi-calendar3 me-2"></i>
            <span>
              <?php echo $ReportDate; ?>
            </span>
          </div>
          <div class="d-flex align-items-center">
            <i class="bi bi-clock me-2"></i>
            <span>
              <?php echo $time; ?>
            </span>
          </div>
          </div>
        </div>
        <div class="d-flex justify-content-end">
        <form action="" method="post">
          <button type="submit" class="btn btn-warning btn-sm me-1  rounded" name="flagItem">Flag Owner and Item</button>
          <button type="submit" class="btn btn-warning btn-sm me-1  rounded" name="denyItem">Deny Request</button>
          <a class="btn btn-primary btn-sm me-2  rounded" href="../ad_itemReport.php">Return</a>
        </form>

        <?php 
          // Check if the itemReports went over 5 flags if not disable the button
          if ($itemData['itemReports'] > 5) {
            echo '<button type="button" class="btn btn-danger btn-sm me-2" name="confirmDelete" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Delete Item</button>';
          } else {
            echo '<button type="button" class="btn btn-danger btn-sm me-2  rounded" disabled>Unlocked after 5 flags</button>';
          }   
        ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for Confirm Delete -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form method="post" action="">
          <button type="submit" class="btn btn-danger" name="deleteItem">Confirm Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<?php 
// If the flagitem is set
if (isset($_POST['flagItem'])) {

    // Get the ID's of the item and user
    $itemID_true = $itemData['itemID'];
    $userID = $itemData['userID'];


    $itemReports = $itemData['itemReports'] + 1;
    $userReports = $itemData['userReports'] + 1;

// Start the transaction
$conn->begin_transaction();

try {


          // Delete the image file
          $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/htdocs/reportedItem/' . $itemData['ss_path'];
          if (file_exists($imagePath)) {
              unlink($imagePath);
          } else{
            echo "<script>alert('The Image Cannot be deleted de to uncertain problems')</script>";
          }

    // Update the item reports
    $conn->query("UPDATE item SET itemReports = $itemReports WHERE itemID = $itemID_true");

    // Update the user reports
    $conn->query("UPDATE user SET userReports = $userReports WHERE userID = $userID");

    // Delete the reported item
    $conn->query("DELETE FROM reportedItem WHERE reportedItemID = $itemID");

    // Commit the transaction
    $conn->commit();

    // Display a success message and redirect the user
    echo "<script>alert('Item has been flagged')</script>";
    echo "<script>window.location.href='../ad_itemReport.php'</script>";
    exit;
} catch (Exception $e) {
    // Rollback the transaction on failure
    $conn->rollback();

    // Display the error message
    echo "Error: " . $e->getMessage();

  }
}

// If the denyItem is set
if (isset($_POST['denyItem'])) {


    // Start the transaction
    $conn->begin_transaction();

    try {

          // Delete the image file
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/htdocs/reportedItem/' . $itemData['ss_path'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
          } else{
            echo "<script>alert('The Image Cannot be deleted de to uncertain problems')</script>";
          }

        // Delete the reported item
        $conn->query("DELETE FROM reportedItem WHERE reportedItemID = $itemID");

        // Commit the transaction
        $conn->commit();

        // Display a success message and redirect the user
        echo "<script>alert('Request has been successfully denied')</script>";
        echo "<script>window.location.href='../ad_itemReport.php'</script>";
        exit;
    } catch (Exception $e) {
        // Rollback the transaction on failure
        $conn->rollback();

        // Display the error message
        echo "Error: " . $e->getMessage();
    }
}

if(isset($_POST['deleteItem'])){

    // Get the ID's of the item and user
    $itemID_true = $itemData['itemID'];

    // Start the transaction
    $conn->begin_transaction();

    try {

          // Delete the image file
          $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/htdocs/reportedItem/' . $itemData['ss_path'];
          if (file_exists($imagePath)) {
              unlink($imagePath);
          } else{
            echo "<script>alert('The Image Cannot be deleted de to uncertain problems')</script>";
          }

        // Delete the reported item
        $conn->query("DELETE FROM reportedItem WHERE reportedItemID = $itemID");

        // Delete the item
        $conn->query("DELETE FROM item WHERE itemID = $itemID_true");

        // Commit the transaction
        $conn->commit();

        // Display a success message and redirect the user
        echo "<script>alert('Item has been successfully deleted')</script>";
        echo "<script>window.location.href='../ad_itemReport.php'</script>";
        exit;
    } catch (Exception $e) {
        // Rollback the transaction on failure
        $conn->rollback();

        // Display the error message
        echo "Error: " . $e->getMessage();
    }
}





?>



</body>
</html>