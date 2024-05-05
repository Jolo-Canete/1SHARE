<?php include 'nav.php';
include '1db.php'; ?>

<!--- Preview the uploaded image --->
<script>
  function previewImage(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagePreview').attr('src', e.target.result);
        $('#imagePreview').show();
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<?
if (isset($_GET['userID'])) {
  $userID = $_GET['userID'];
} else {
  // If the user just input fucking random
  header('home.php');
}
$sql = "SELECT * FROM user WHERE userID = '$userID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $sql = "SELECT * FROM user where userID = '$userID'";
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
      'userID' => $userRow['userID'],
      'username' => $userRow['username'],
      'userImage_path' => $userRow['userImage_path'],
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
    $Imagge = $userData['userImage_path'];

    $Birthday = $userData['birthDay'];
    // Convert the date to a timestamp
    $BirthdayTimestamp = strtotime($Birthday);

    // Extract the year, month name, and day
    $birthYear = date('Y', $BirthdayTimestamp);
    $birthMonth = date('F', $BirthdayTimestamp);
    $birthDay = date('j', $BirthdayTimestamp);
  }
} else {
  echo "<script>alert('User ID does not Exist, Due to an Error. $userID')</script>";
  echo "<script>window.location.href='home.php'</script>";
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


    .rating>input {
      display: none;
      cursor: not-allowed;
      /* Change cursor to not-allowed */
      pointer-events: none;
      /* Disable pointer events */
    }




    /* CSS for rating stars */
    .rating {
      display: inline-block;
      padding: 10px;
    }


    .rating>input:checked~label {}

    .rating label.text-warning {
      color: #f8ce0b;
    }

    .rating label i {
      transition: color 0.3s;
    }
  </style>
</head>



<body>
  <header>
    <!-- place navbar here -->
  </header>

  <main>
    <div class="page-content" id="content">
      <div class="container mt-4">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="d-flex align-items-center">
              <div class="profile-avatar me-3">
                <img src="<?php echo !empty($Imagge) ? 'picture/' . $Imagge : 'picture/default.png'; ?>" class="rounded-circle" style="width: 150px; height: 150px;">
              </div>
              <div>
                <div class="flex-grow-1 d-flex justify-content-between align-items-center">
                  <h2 class="mb-0 fw-bold"><? echo ucfirst($userData['firstName']) . '&nbsp;' . ucfirst($userData['middleName'][0]) . '.&nbsp;' . ucfirst($userData['lastName']) ?></h2>
                  <button type="button" class="btn btn-link text-danger" data-bs-toggle="modal" data-bs-target="#reportUserModal">
                    <i class="bi bi-flag fs-5"></i>
                  </button>
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


          <div class="col mt-4">
            <div class="d-flex align-items-center text-secondary">
              <span class="bi-envelope">&nbsp; <? echo $userData['userEmail'] ?></span>
              <span class="bi-map ms-4">&nbsp; <? echo 'Purok ' . $userData['purok'] . ',&nbsp; Zone ' . $userData['zone'] ?></span>
              <span class="bi-telephone ms-4">&nbsp; <? echo $userData['contactNumber'] ?></span>
            </div>
          </div>
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
        <?php include 'reportUser.php'; ?>




        <!--- Item Owned --->
        <div class="tab-pane fade" id="itemowned" role="tabpanel" aria-labelledby="itemowned-tab">
          <div class="mt-3">
            <div class="h2 d-flex align-items-center"><i class="bi bi-box me-2"></i> Item Owned</div>
          </div>

          <?php
          // Ensure $conn is your database connection object
          include "1db.php"; // Include database connection script

          // Check if the connection was successful
          if (!$conn) {
            echo "<p>Database connection error.</p>";
          } else {
            $query = "SELECT i.itemID, i.itemName, i.itemImage_path, i.DateTimePosted, u.hiddenItem
      FROM item i
      JOIN user u ON i.userID = u.userID 
      WHERE i.userID = ?
      ORDER BY i.DateTimePosted DESC";

            $stmt = $conn->prepare($query);
            if ($stmt) {
              $stmt->bind_param("i", $userID);
              $stmt->execute();
              $result = $stmt->get_result();

              // Flag variable to track if any visible items were found
              $visibleItemsFound = false;

              if ($result->num_rows > 0) {
          ?>
                <table class="table table-bordered table-border-2 table-hover mb-3 mt-3">
                  <thead>
                    <tr class="table-dark">
                      <th>Item Name</th>
                      <th>Image</th>
                      <th>Date Posted</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                      // Check if item is marked as hidden
                      if ($row['hiddenItem'] == "Yes") {
                        // If hidden item found, skip displaying it
                        continue;
                      } else {
                        // If visible item found, set the flag to true and display it in the table
                        $visibleItemsFound = true;
                    ?>
                        <tr>
                          <td><?php echo $row['itemName']; ?></td>
                          <td><img src="pictures/<?php echo $row['itemImage_path']; ?>" alt="<?php echo $row['itemName']; ?>" class="img-fluid" style="max-width: 100px;"></td>
                          <td><?php echo date('m/d/y h:i A', strtotime($row['DateTimePosted'])); ?></td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              <?php
              } else {
                echo "<p class='lead text-secondary'>This resident doesn't have any items yet.</p><br>";
              }

              // Output the "Item Private" message if no visible items were found
              if (!$visibleItemsFound) {
              ?>
                <div class='jumbotron jumbotron-fluid bg-light text-center'>
                  <div class='container'>
                    <h1 class='display-4 mt-5'>Item Private</h1>
                    <p class='lead text-secondary'>Looks like all items are private.</p>
                  </div>
                </div>
          <?php
              }

              $stmt->close();
            } else {
              echo "<p>Error in preparing SQL statement.</p>";
            }
          }
          ?>

          <!--- End of Item Owned --->
        </div>

        <!--- Transaction History --->
        <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
          <div class="mt-3">
            <div class="h2"><i class="bi bi-arrow-repeat me-2"></i> Transaction History</div>

            <?php
            // Ensure $conn is your database connection object
            include "1db.php"; // Include database connection script

            // Check if the connection was successful
            if (!$conn) {
              echo "<p>Database connection error.</p>";
            } else {
              // Query to fetch the closed requests for the logged-in user
              $query = "SELECT r.requestID, r.requestType, i.itemName, u.username AS itemOwner, u.userID AS userID, r.rated AS rated, u.hiddenTran AS hiddenTran,
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
        JOIN user u ON r.userID = u.userID
        LEFT JOIN barter b ON r.requestID = b.requestID
        LEFT JOIN borrow bo ON r.requestID = bo.requestID
        LEFT JOIN buy bu ON r.requestID = bu.requestID
        WHERE r.userID = ?
        AND r.complete IS NOT NULL ";

              $stmt = $conn->prepare($query);
              if ($stmt) {
                $stmt->bind_param("i", $userData['userID']);
                $stmt->execute();
                $result = $stmt->get_result();

                // Flag variable to track if any visible transactions were found
                $visibleTransactionsFound = false;

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
                      while ($row = $result->fetch_assoc()) {
                        // Check if transaction is marked as hidden for the logged-in user
                        if ($row['userID'] == $userData['userID'] && $row['hiddenTran'] == "Yes") {
                          // If hidden transaction found, skip displaying it
                          continue;
                        } else {
                          // If visible transaction found, set the flag to true and display it in the table
                          $visibleTransactionsFound = true;
                      ?>
                          <tr>
                            <td><?php echo $row['requestType']; ?></td>
                            <td><?php echo $row['itemName']; ?></td>
                            <td class="d-md-table-cell d-none"><?php echo $row['itemOwner']; ?></td>
                            <td class="d-md-table-cell d-none"><?php echo $row['DateTimeCompleted']; ?></td>
                            <td class="d-table-cell d-md-none"><a href="#">Details</a></td>
                          </tr>
                      <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                <?php
                } else {
                  echo "<p class='lead text-secondary'>Looks like this resident doesn't have any Transactions yet.</p><br>";
                }

                // Output the "Transaction Private" message if no visible transactions were found
                if (!$visibleTransactionsFound) {
                ?>
                  <div class='jumbotron jumbotron-fluid bg-light text-center'>
                    <div class='container'>
                      <h1 class='display-4 mt-5'>Transaction Private</h1>
                      <p class='lead text-secondary'>Looks like all transactions are private.</p>
                    </div>
                  </div>
            <?php
                }

                $stmt->close();
              } else {
                echo "<p>Error in preparing SQL statement.</p>";
              }
            }
            ?>

          </div>
        </div>
        <!--- End of Transaction Content --->

      </div>
      <!--- End of Tab --->

    </div>
    </div>
    </div>
  </main>

  <footer>
  </footer>

</body>

</html>