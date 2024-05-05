<?php include 'nav.php';
include '1db.php'; ?>
<?php
$sql = "SELECT * FROM user where userID = $user_id";
$query = mysqli_query($conn, $sql);

// Fetch the Data
$user = array();

while ($userRow = mysqli_fetch_assoc($query)) {
  $userData = array(
    'firstName' => $userRow['firstName'],
    'middleName' => $userRow['middleName'],
    'lastName' => $userRow['lastName'],
    'contactNumber' => $userRow['contactNumber'],
    'zone' => $userRow['zone'],
    'purok' => $userRow['purok'],
    'dateJoined' => $userRow['dateJoined'],
    'userEmail' => $userRow['userEmail'],
    'status' => $userRow['status'],
    'userImage_path' => $userRow['userEmail'],
    'username' => $userRow['username'],
    'password' => $userRow['password'],
    'birthDay' => $userRow['birthDay'],
  );

  array_push($user, $userData);

  // Split the DATETIME
  $dateTime = explode(" ", $userData['dateJoined']);
  $date = $dateTime[0];
  $time = $dateTime[1];
  // Convert the data to a timestamp
  $dateTimeStamp = strtotime($date);
  // Extract the year, month name, and day
  $dateJoinedYear = date('Y', $dateTimeStamp);
  $dateJoinedMonth = date('F', $dateTimeStamp);
  $dateJoinedDay = date('j', $dateTimeStamp);

  // Split the Time from datetime
  $time = explode(":", $time);
  $dateJoinedHour = $time[0];
  $dateJoinedMinute = $time[1];
  $dateJoinedSecond = $time[2];


  // Format the Birthdate to Date
  $Birthday = $userData['birthDay'];
  // Convert the date to a timestamp
  $BirthdayTimestamp = strtotime($Birthday);

  // Extract the year, month name, and day
  $birthYear = date('Y', $BirthdayTimestamp);
  $birthMonth = date('F', $BirthdayTimestamp);
  $birthDay = date('j', $BirthdayTimestamp);
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Profile</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <style>
    .profile-container {
      background-color: #e8e9e8;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
      padding: 20px;
      position: relative;
      width: 103%;
      margin: 0 auto;
      margin-bottom: 2rem;
    }

    .profile-header {
      background-color: #212529;
      color: #ffffff;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .profile-avatar img {
      width: 18%;
      height: 18%;
      object-fit: cover;
      border-radius: 50%;
      border: 5px solid #ffffff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .rating {
    display: inline-block;
    font-size: 15px;
    color: #FFD700;
    /* Default color for stars */
}

.rating>input {
    display: none;
    cursor: not-allowed; /* Change cursor to not-allowed */
    pointer-events: none; /* Disable pointer events */
}




/* CSS for rating stars */
.rating {
    display: inline-block;
}

.rating label {
    font-size: 15px;
    /* Adjust the font size as needed */
    color: #ddd;
    /* Default color for empty stars */
    cursor: not-allowed; /* Change cursor to not-allowed */
    pointer-events: none; /* Disable pointer events */}

.rating>input:checked~label {}

.rating label.text-warning {
    color: #f8ce0b;
}

.rating label i {
    transition: color 0.3s;
}


    .data {
      background-color: yellow;
      padding: 8px;
      margin-top: 15px;
      margin-bottom: 15px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .modal-content {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
      background: #212529;
      color: #ffffff;
      border-radius: 10px 10px 0 0;
      padding: 15px 20px;
    }

    .modal-title {
      font-size: 18px;
      font-weight: bold;
    }

    .modal-body {
      padding: 20px;
    }

    .modal-body p {
      margin-bottom: 10px;
    }

    .modal-body p i {
      margin-right: 10px;
    }

    #myTab {
      border-bottom: 2px solid #dee2e6;
    }

    #myTab .nav-link {
      color: #495057;
      font-weight: 600;
      padding: 0.5rem 1rem;
      border-bottom: 2px solid transparent;
      transition: color 0.3s ease, border-color 0.3s ease;
    }

    #myTab .nav-link.active,
    #myTab .nav-link:hover {
      color: #212529;
      border-bottom-color: #212529;
    }

    #myTab .nav-link.active {
      color: #212529;
    }

    .table-hover tbody tr.table-row:hover {
      background-color: #f5f5f5;
      cursor: pointer;
    }

    .table-row {
      transition: background-color 0.3s ease;
    }

    .table-wrapper {
      width: 103%;
      margin: 0 auto;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table thead th,
    td {
      text-align: center;
    }

    .form-box {
      background-color: #f8f9fa;
      padding: 10px 12px;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>



<body>
  <br>
  <main>
    <div class="page-content" id="content">
      <div class="container mt-4">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="d-flex align-items-center">

              <!-- HTML Markup -->
              <div class="profile-avatar me-3">
                <label for="profile-pic-upload">
                  <input type="file" id="profile-pic-upload" style="display: none;" onchange="previewImage(this);">
                  <img id="profile-pic-preview" src="<?php echo !empty($Imagge) ? 'picture/' . $Imagge : 'picture/defaulst.jpg'; ?>" class="rounded-circle" style="width: 150px; height: 150px; cursor: pointer;" alt="Profile Picture">
                </label>
                <div id="upload-buttons" style="display: none;">
                  <br>
                  <button onclick="saveProfilePicture()">Save</button>
                  <button onclick="cancelUpload()">Cancel</button>
                </div>
              </div>

              <script>
                // JavaScript for image preview and showing/hiding buttons
                function previewImage(input) {
                  if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                      document.getElementById('profile-pic-preview').src = e.target.result;
                      document.getElementById('upload-buttons').style.display = 'block'; // Show upload buttons
                    }

                    reader.readAsDataURL(input.files[0]);
                  }
                }

                function cancelUpload() {
                  document.getElementById('profile-pic-upload').value = "";
                  document.getElementById('profile-pic-preview').src = "<?php echo getUserProfilePicPath($user_id); ?>";
                  document.getElementById('upload-buttons').style.display = 'none'; // Hide upload buttons
                }

                function saveProfilePicture() {
                  var file = $('#profile-pic-upload')[0].files[0];
                  if (file) {
                    var formData = new FormData();
                    formData.append('profile_pic', file);

                    // Send AJAX request to upload image and update database
                    $.ajax({
                      url: 'upload_profile_pic.php',
                      type: 'POST',
                      data: formData,
                      processData: false,
                      contentType: false,
                      success: function(response) {
                        // Handle response here, if needed
                        console.log(response);
                        // Reload the page upon successful upload
                        location.reload();
                      },
                      error: function(xhr, status, error) {
                        // Handle error here
                        console.error(xhr.responseText);
                      }
                    });
                  }
                }

                // Add click event listener to the profile picture preview image
                $('#profile-pic-preview').click(function() {
                  saveProfilePicture();
                });
              </script>
              <?php
              // PHP function to fetch logged-in user's profile picture path from the database
              function getUserProfilePicPath($user_id)
              {
                global $conn; // Access the database connection

                // Prepare and execute query to fetch user's profile picture path
                $stmt = $conn->prepare("SELECT userImage_path FROM user WHERE userID = ?");
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $stmt->bind_result($userImage_path);
                $stmt->fetch();
                $stmt->close();

                // Return the profile picture path or a default path if not found
                return isset($userImage_path) ? $userImage_path : "picture/default.png";
              }
              ?>

              <div>
                <div class="flex-grow-1 d-flex justify-content-between align-items-center">
                  <h2 class="mb-0 fw-bold"><? echo ucfirst($userData['firstName']) . '&nbsp;' . ucfirst($userData['middleName'][0]) . '.&nbsp;' . ucfirst($userData['lastName']) ?></h2>

                </div>
                <div class="text-secondary">Resident</div>
                <div>
                  <?php
                  if ($userData['status'] === 'Unverified' || $userData['status'] === null) {
                    echo ' <span class="badge text-bg-primary rounded-pill bg-danger">Unverified';
                  } else {
                    echo ' <span class="badge text-bg-primary rounded-pill">Verified';
                  }

                  ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="rating">
            <?php
            // Open the database connection
            include "1db.php";

            // Check if the connection was successful
            if (!$conn) {
              // Handle connection error
              echo 'Database connection error: ' . mysqli_connect_error();
              exit;
            }

            // Prepare and execute the query to fetch the average rating and count of ratings
            $query = "SELECT COALESCE(AVG(userRate), 0) AS averageRating, COUNT(userRate) AS ratingCount FROM userRating WHERE userID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $averageRating = $row["averageRating"];
            $ratingCount = $row["ratingCount"];

            // Close the prepared statement
            $stmt->close();

            // Close the database connection
            mysqli_close($conn);

            // Display the stars based on the average rating
            ?>
            <?php
            // Loop to display stars based on average rating
            for ($i = 1; $i <= 5; $i++) {
              echo "<label for='star{$i}'><i class='fas fa-star";
              // Add 'text-warning' class if average rating is not null and greater than or equal to current star value
              if ($averageRating !== null && $averageRating >= $i) {
                echo " text-warning"; // Add 'text-warning' class to color the star yellow
              }
              echo "'></i></label>";
              echo "<input type='radio' name='rating' id='star{$i}' value='{$i}'";
              // Mark the radio button as checked if average rating is not null and greater than or equal to current star value
              if ($averageRating !== null && $averageRating >= $i) {
                echo " checked";
              }
              echo ">";
            }
            // Display the average rating with one decimal place, if not null
            if ($averageRating !== null) {
              $averageRatingFormatted = number_format($averageRating, 1);
              echo "<span class='text-warning ms-1'><small>{$averageRatingFormatted}/5.0</small></span>";
              // Display the number of users who rated
              echo "<span class='ms-1'>($ratingCount rated)</span>";
            }
            ?>
          </div>
          <!--- Tab --->
          <ul class="nav nav-underline mt-4 ms-4 justify-content-between flex-wrap" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="true">Details</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="transaction-tab" data-bs-toggle="tab" data-bs-target="#transaction" type="button" role="tab" aria-controls="transaction" aria-selected="false">Transaction</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="itemowned-tab" data-bs-toggle="tab" data-bs-target="#itemowned" type="button" role="tab" aria-controls="itemowned" aria-selected="false">Item Owned</button>
            </li>
          </ul>
          <!--- Tab Content --->

          <!--- Details --->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
              <div class="h2 d-flex align-items-center mt-3"><i class="bi bi-person me-2"></i> Details</div>
              <div class="row">
                <div class="col-md-6 mt-3">
                  <div class="card mb-4 shadow">
                    <div class="card-header"><b>Personal Information</b></div>
                    <div class="card-body">
                      <div class="row mb-3">
                        <div class="col-sm-4">
                          <label for="firstName" class="form-label text-secondary"><b>First Name</b></label>
                          <div class="form-box" readonly><b><? echo ucfirst($userData['firstName']) ?></b></div>
                        </div>
                        <div class="col-sm-4">
                          <label for="middleName" class="form-label text-secondary"><b>Middle Name</b></label>
                          <div class="form-box" readonly><b><? echo ucfirst($userData['middleName']) ?></b></div>
                        </div>
                        <div class="col-sm-4">
                          <label for="lastName" class="form-label text-secondary"><b>Last Name</b></label>
                          <div class="form-box" readonly><b><? echo ucfirst($userData['lastName']) ?></b></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <label for="status" class="form-label text-secondary"><b>Status</b></label>
                          <!-- Create a statement if status is verified or not -->
                          <?
                          if ($userData['status'] === 'Unverified' || $userData['status'] === null) {
                            echo ' <div class="form-box text-primary text-danger" readonly><b>Unverified';
                          } else {
                            echo ' <div class="form-box text-primary" readonly><b>Verified';
                          }
                          ?>
                          </b>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label for="dateJoined" class="form-label text-secondary"><b>Date Joined</b></label>
                        <div class="form-box" readonly><b><? echo $dateJoinedMonth . '&nbsp;' . $dateJoinedDay . ',&nbsp;' . $dateJoinedYear; ?></b></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mt-3">
                <div class="card mb-4 shadow">
                  <div class="card-header"><b>Contact Information</b></div>
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-sm-6">
                        <label for="email" class="form-label text-secondary"><b>Email</b></label>
                        <div class="form-box" readonly><b><? echo $userData['userEmail'] ?></b></div>
                      </div>
                      <div class="col-sm-6">
                        <label for="contactNumber" class="form-label text-secondary"><b>Contact Number</b></label>
                        <div class="form-box" readonly><b><? echo $userData['contactNumber'] ?></b></div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-6">
                        <label for="purok" class="form-label text-secondary"><b>Purok</b></label>
                        <div class="form-box" readonly><b><? echo $userData['purok'] ?></b></div>
                      </div>
                      <div class="col-sm-6">
                        <label for="zone" class="form-label text-secondary"><b>Zone</b></label>
                        <div class="form-box" readonly><b><? echo  $userData['zone'] ?></b></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--- End of Details --->

          <!--- Transaction History --->

          <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
            <div class="mt-3">
              <div class="h2"><i class="bi bi-arrow-repeat me-2"></i> Transaction History
              <?php
                  // Open a new MySQLi connection
                  $conn = new mysqli($servername, $username, $password, $dbname);

                  // Check connection
                  if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                  }

                  // Fetch the current value of $hiddenTran from the database
                  $sqlTransHistory = "SELECT hiddenTran FROM user WHERE userID = $user_id";
                  $resultTrans = $conn->query($sqlTransHistory);

                  if ($resultTrans->num_rows > 0) {
                      $rowTrans = $resultTrans->fetch_assoc();
                      $hiddenTran = $rowTrans["hiddenTran"];
                  } else {
                      echo "0 results";
                  }

                  // Determine the color of the label based on the value of $hiddenTran
                  if ($hiddenTran == 'Yes') {
                      echo '<span class="badge text-bg-primary rounded-pill bg-success fs-6">Hidden</span>';
                  } else {
                      echo '<span class="badge text-bg-primary rounded-pill bg-danger fs-6">Shown</span>';
                  }

                  // Close the connection
                  $conn->close();
                  ?>
              </div>
            </div>

            <?php


            // Open the database connection
            include "1db.php";

            // Check if the connection was successful
            if (!$conn) {
              // Handle connection error
              echo 'Database connection error: ' . mysqli_connect_error();
              exit;
            }
            // Query to fetch the closed requests for the logged-in user
            $query = "SELECT r.requestID, r.requestType, i.itemName, u.username AS itemOwner, r.rated AS rated,
             (CASE
              WHEN r.requestType = 'Barter' THEN b.DateTimeCompleted
              WHEN r.requestType = 'Borrow' THEN bo.DateTimeCompleted 
              WHEN r.requestType = 'Buy' THEN bu.DateTimeCompleted
              ELSE NULL
          END) AS DateTimeCompleted,
          (CASE
              WHEN r.requesterSuccess IS NOT NULL THEN r.requesterSuccess
              WHEN r.ownerSuccess IS NOT NULL THEN r.ownerSuccess
              ELSE 'N/A'
          END) AS Proof,
          (CASE
              WHEN bo.RequesterProof IS NOT NULL THEN bo.RequesterProof
              WHEN bo.OwnerProof IS NOT NULL THEN bo.OwnerProof
              ELSE 'N/A'
          END) AS ReturnProof
            FROM Request r
            JOIN item i ON r.itemID = i.itemID
            JOIN user u ON i.userID = u.userID
            LEFT JOIN barter b ON r.requestID = b.requestID
            LEFT JOIN borrow bo ON r.requestID = bo.requestID
            LEFT JOIN buy bu ON r.requestID = bu.requestID
            WHERE (r.userID = $user_id OR i.userID = $user_id)
            AND r.complete IS NOT NULL ";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
            ?>

              <table class="table table-bordered table-border-2 table-hover mb-3 mt-3">
                <thead>
                  <tr class="table-dark">
                    <th>Request Type</th>
                    <th>Item Name</th>
                    <th class="d-md-table-cell d-none">Item Owner</th>
                    <th class="d-md-table-cell d-none">Date Time Completed</th>
                    <th class="d-table-cell d-md-none">Details</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Assuming $result contains the query result
                  while ($row = $result->fetch_assoc()) {
                    $requestDateTimeClosed = $row['DateTimeCompleted'] ? date('l, F j, Y g:i A', strtotime($row['DateTimeCompleted'])) : '';
                  ?>


                    <td data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>"><?php echo $row['requestType']; ?></td>
                    <td data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>"><?php echo $row['itemName']; ?></td>
                    <td class="d-md-table-cell d-none" data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>"><?php echo $row['itemOwner']; ?></td>
                    <td class="d-md-table-cell d-none" data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>"><?php echo $requestDateTimeClosed; ?></td>

                    <td class="d-table-cell d-md-none">
                      <a class="btn btn-primary btn-sm mb-1 collapsed" data-bs-toggle="collapse" href="#collapsible-<?php echo $row['requestID']; ?>" role="button" aria-expanded="false" aria-controls="collapsible-<?php echo $row['requestID']; ?>">
                        More
                      </a>
                      <div class="collapse" id="collapsible-<?php echo $row['requestID']; ?>">
                        <div class="card card-body">
                          <div class="row">
                            <div class="col-6">
                              <p><strong>Request Type:</strong> <?php echo $row['requestType']; ?></p>
                              <p><strong>Item Name:</strong> <?php echo $row['itemName']; ?></p>
                            </div>
                            <div class="col-6">
                              <p><strong>Item Owner:</strong> <?php echo $row['itemOwner']; ?></p>
                              <p><strong>Date Time Completed:</strong> <?php echo $requestDateTimeClosed; ?></p>
                            </div>
                          </div>


                        </div>
                      </div>
          </div>
          </td>
          </tr>
      <?php
                  }
                }
      ?>
      </tbody>
      </table>
        </div>



        <!--- Item Owned --->
        <div class="tab-pane fade" id="itemowned" role="tabpanel" aria-labelledby="itemowned-tab">
          <div class="mt-3">
            <div class="h3"><i class="bi bi-box me-2"></i> Item Owned
            <?php
            // Open a new MySQLi connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch the current value of $hiddenItem from the database
            $sqlItem = "SELECT hiddenItem FROM user WHERE userID = $user_id";
            $resultItem = $conn->query($sqlItem);

            if ($resultItem->num_rows > 0) {
                $rowItem = $resultItem->fetch_assoc();
                $hiddenItem = $rowItem["hiddenItem"];
            } else {
                echo "0 results";
            }

            // Determine the color of the label based on the value of $hiddenItem
            if ($hiddenItem == 'Yes') {
                echo '<span class="badge text-bg-primary rounded-pill bg-success fs-11">Hidden</span>';
            } else {
                echo '<span class="badge text-bg-primary rounded-pill bg-danger fs-11">Shown</span>';
            }
            ?>
          </div>
        </div>
          <div class="table-wrapper">
            <table class="table table-bordered table-border-2 table-hover mb-3 mt-3">
              <thead>
                <tr class="table-dark">
                  <th>Item Name</th>
                  <th>Item Image</th>
                  <th>Posted</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Fetch the user's owned items from the database
                $userID = $user_id;
                $query = "SELECT i.itemID, i.itemName, i.itemImage_path, i.DateTimePosted 
                  FROM item i
                  JOIN user u ON i.userID = u.userID
                  WHERE i.userID = ?
                  ORDER BY i.DateTimePosted DESC";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $userID);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                ?>
                    <tr class="table-row table-light">
                      <td><?php echo $row['itemName']; ?></td>
                      <td><img src="pictures/<?php echo $row['itemImage_path']; ?>" alt="<?php echo $row['itemName']; ?>" class="img-fluid" style="max-width: 100px;"></td>
                      <td><?php echo date('m/d/y h:i A', strtotime($row['DateTimePosted'])); ?></td>

                    </tr>
                <?php
                  }
                } else {
                  echo "<tr><td colspan='4'>No items owned by the user.</td></tr>";
                }
                $stmt->close();
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <!--- End of Item Owned --->

      </div>
      <!--- End of Item Owned --->

    </div>
    <!--- End of Tab Content --->

    </div>
    <!--- End of Tab --->

    </div>
    </div>
    </div>
  </main>

  <footer>
  </footer>
  <!-- Modal For Report User -->
  <div class="modal fade" id="reportUserModal" tabindex="-1" aria-labelledby="reportUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="reportUserModalLabel">Report User</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label class="form-label"><b>Please specify your reason for reporting this account</b></label>
          <textarea class="form-control" aria-label="Report reason"></textarea>
          <label class="form-label mt-3"><b>Upload a screenshot for evidence/proof</b></label>
          <div class="input-group">
            <input type="file" class="form-control" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Report</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>