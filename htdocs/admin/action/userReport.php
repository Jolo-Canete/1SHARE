<?php  include '../1db.php';
$userID = $_GET['userReportID'];

// Prepare the SQL query to fetch the userreport details and its foreign keys
$sql = "SELECT ur.*, 
        u1.firstName as reporterFirstName, u1.lastName as reporterLastName, 
        u2.firstName as reportedFirstName, u2.lastName as reportedLastName,
        u2.userReports as userReports, u2.userID as u2userID
        FROM userreport ur
        JOIN user u1 ON ur.userReporter = u1.userID
        JOIN user u2 ON ur.userReported = u2.userID
        WHERE ur.userReportID = $userID";

// Execute the SQL query
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {

    // Display an error message and redirect the user
    echo "<script>alert('Error updating Action, please try again')</script>";
    echo "<script>window.location.href='../ad_userReport.php'</script>";
    exit;

// Check if the query returned any rows
} elseif($result->num_rows == 0) {

    // Display a message indicating that the user was not found and redirect the user
    echo "<script>alert('User not found')</script>";
    echo "<script>window.location.href='../ad_userReport.php'</script>";
    exit;
    
} else {
    // Fetch the result as an associative array
    $userData = $result->fetch_assoc();

    $userReportDate = $userData['userReportDate'];

    // seperate the date and time
    $ReportDate = date('Y-m-d', strtotime($userReportDate));
    $time = date('H:i:s', strtotime($userReportDate));

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
  $imagePath = $base_dir . 'reporteduser/' . $userData['userReportImage_path'];

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
    .reported-name {
      color: red;
    }



    .report-owner{
        color: blue;
    }

    .card-header{
        background-color: #2081d9;
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
        <h4>Resident Report</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <p>Reported By: <span class="report-owner"><?php echo $userData['reporterFirstName'] . ' '. $userData['reporterLastName'] ?></span></p>
            <h5>Reported Resident:  <span class="reported-name"> <?php echo $userData['reportedFirstName'] . ' '. $userData['reportedLastName'] ?></span></h5>
            <div class="mb-3">
              <label for="reason" class="form-label">Reason for Report:</label>
              <textarea class="form-control" id="reason" rows="8" cols="50"><?php echo $userData['userReportReason'] ?></textarea>
            </div>
          </div>
          <div class="col-md-6">
          <h5>Proof of Violation</h5>
          <img src="<?php echo $imagePath ?>" height="400px" width="400px" alt="Proof Image" class="img-fluid mb-3">
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
        <button type="submit" name="flagUser" class="btn btn-warning me-2">Flag User</button>
        <button type="submit" class="btn btn-secondary me-4" name="denyFlag">Deny Request</button>
          <a class="btn btn-primary me-1" href="../ad_userReport.php">Return</a>
        </form>

        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<?php 
// SERVER REQUEST METHOD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the user clicked the flag user button
    if (isset($_POST['flagUser'])) {
      
      // Get the userID of the reported user
      $u2userID = $userData['u2userID'];

      $addUserReport = $userData['userReports'] + 1;

      try {

          // Delete the image file
          $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/htdocs/reporteduser/' . $itemData['userReportImage_path'];
          if (file_exists($imagePath)) {
              unlink($imagePath);
          } else{
            echo "<script>alert('The Image Cannot be deleted de to uncertain problems')</script>";
          }

          // Update the user reports
          $conn->query("UPDATE user SET userReports = $addUserReport WHERE userID = $u2userID");

          // Delete the user report
          $conn->query("DELETE FROM userreport WHERE userReportID = $userID");

          // Commit the transaction
          $conn->commit();

          // Display a success message and redirect the user
          echo "<script>alert('User has been successfully flagged')</script>";
          echo "<script>window.location.href='../ad_userReport.php'</script>";
      } catch (Exception $e) {
          // Rollback the transaction on failure
          $conn->rollback();

          // Display an error message and redirect the user
          echo "<script>alert('Error updating Action, please try again')</script>";
          echo "<script>window.location.href='../ad_userReport.php'</script>";
          exit;
      }
    }


    // Check if the user clicked the deny request button
    if (isset($_POST['denyFlag'])) {

      // Delete the image file
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/htdocs/reporteduser/' . $itemData['userReportImage_path'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        } else{
          echo "<script>alert('The Image Cannot be deleted de to uncertain problems')</script>";
          return;
        }


      // Prepare the SQL query to delete the user report and add foreign key checks before deleting
      $sql = "DELETE FROM userreport WHERE userReportID = $userID";

      // Execute the SQL query
      $result = $conn->query($sql);

            // Check if the query was successful
            if (!$result) {

              // Display an error message and redirect the user
              echo "<script>alert('Error updating Action, please try again')</script>";
              echo "<script>window.location.href='../ad_userReport.php'</script>";
              exit;
    
          } else {
              // Display a success message and redirect the user
              echo "<script>alert('Successfully Denied Residents Report ')</script>";
              echo "<script>window.location.href='../ad_userReport.php'</script>";
              exit;
          }  
        }
      }

?>




</body>
</html>