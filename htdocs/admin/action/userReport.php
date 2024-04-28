<?php 
$userID = $_GET['userReportID'];

// Prepare the SQL query to fetch the userreport details and its foreign keys
$sql = "SELECT ur.*, 
        u1.firstName as reporterFirstName, u1.lastName as reporterLastName, 
        u2.firstName as reportedFirstName, u2.lastName as reportedLastName
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

    // Properly format the birth date
    $Birthday = date('Y-m-d', strtotime($userData['birthDay']));
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Report</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
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
            <p>Reported By: <span class="report-owner"><?php echo $userData['ReporterfirstName'] . ''. $userData['ReporterlastName'] ?></span></p>
            <h5>Reported Resident:  <span class="reported-name">John Doe</span></h5>
            <div class="mb-3">
              <label for="reason" class="form-label">Reason for Report:</label>
              <textarea class="form-control" id="reason" rows="8" cols="50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</textarea>
            </div>
          </div>
          <div class="col-md-6">
            <h5>Proof of Violation</h5>
            <img src="https://via.placeholder.com/400x300" alt="Proof Image" class="img-fluid mb-3">
            <p>Additional details about the proof image.</p>
          </div>
        </div>
        <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-warning me-2">Warn User</button>
        <a class="btn btn-secondary me-4" href="#">Deny Request</a>
        <a class="btn btn-primary me-1" href="../ad_userReport.php">Return</a>



        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>