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
    'userRating' => $userRow['userRating'],
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
      text-align: left;
      margin-top: 10px;
    }

    .rating span {
      color: #666666;
      font-size: 14px;
      margin-right: 5px;
    }

    .rating label {
      color: #FFD700;
      font-size: 20px;
      margin: 0 2px;
      cursor: pointer;
    }

    .rating>input {
      display: none;
    }

    .rating>label {
      font-size: 15px;
      color: #ffc107;
      display: inline-block;
      cursor: pointer;
    }

    .rating>input:checked~label {
      color: #f8de7e;
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
                  <img id="profile-pic-preview" src="<?php echo !empty($itemImage_path) ? 'picture/' . $itemImage_path : 'picture/' . getUserProfilePicPath($user_id); ?>" class="rounded-circle" style="width: 150px; height: 150px; cursor: pointer;" alt="Profile Picture">
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
          <div class="rating ms-3">
            <label for="star5"><i class="fas fa-star "></i></label>
            <input type="radio" name="rating" id="star5" value="5">
            <label for="star4"><i class="fas fa-star"></i></label>
            <input type="radio" name="rating" id="star4" value="4">
            <label for="star3"><i class="fas fa-star"></i></label>
            <input type="radio" name="rating" id="star3" value="3">
            <label for="star2"><i class="fas fa-star"></i></label>
            <input type="radio" name="rating" id="star2" value="2">
            <label for="star1"><i class="fas fa-star"></i></label>
            <input type="radio" name="rating" id="star1" value="1">
            <span class="text-warning ms-2">5/5</span>
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
                        <div class="col-sm-6">
                          <label for="firstName" class="form-label text-secondary"><b>First Name</b></label>
                          <div class="form-box" readonly><b><? echo ucfirst($userData['firstName']) ?></b></div>
                        </div>
                        <div class="col-sm-6">
                          <label for="lastName" class="form-label text-secondary"><b>Middle Name</b></label>
                          <div class="form-box" readonly><b><? echo ucfirst($userData['middleName']) ?></b></div>
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
                          </b><span class="text-secondary mx-2"><small>last January 1, 2024</small></span>
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
              </div>
            </div>
            <div class="table-wrapper">
              <table class="table table-bordered table-border-2 table-hover mb-3 mt-3">
                <thead>
                  <tr class="table-dark">
                    <th>Transaction Type</th>
                    <th>Item Name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-row table-light" data-bs-toggle="modal" data-bs-target="#transactionModal1">
                    <td>Borrow</span></td>
                    <td>Book</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Transaction History Modal -->
            <div class="modal fade" id="transactionModal1" tabindex="-1" aria-labelledby="transactionModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalLabel1">Transaction Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row g-4">
                      <div class="col-md-5">
                        <img src="htdocs/picture/elmo.jpg" class="img-fluid rounded">
                      </div>
                      <div class="col-md-7">
                        <dl class="row g-0">
                          <dt class="col-sm-5 text-secondary"><i class="bi bi-card-heading"></i>&nbsp; Item Name</dt>
                          <dd class="col-sm-7">Book</dd>

                          <dt class="col-sm-5 text-secondary"><i class="bi bi-card-text"></i>&nbsp; Description</dt>
                          <dd class="col-sm-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                          <dt class="col-sm-5 text-secondary"><i class="bi bi-star-fill"></i>&nbsp; Transaction Type</dt>
                          <dd class="col-sm-7"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Borrow</span></dd>

                          <dt class="col-sm-5 text-secondary"><i class="bi bi-calendar"></i>&nbsp; Started</dt>
                          <dd class="col-sm-7">01/01/24 at 10:16 P.M.</dd>

                          <dt class="col-sm-5 text-secondary"><i class="bi bi-calendar"></i>&nbsp; Ended</dt>
                          <dd class="col-sm-7">02/02/24 at 10:30 A.M.</dd>

                          <dt class="col-sm-5 text-secondary"><i class="bi bi-calendar-check-fill"></i>&nbsp; Owned By</dt>
                          <dd class="col-sm-7">
                            <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill align-items-center">
                              <img class="rounded-circle me-1" width="23" height="23" src="picture/elmo.jpg">Elmo
                            </span>
                          </dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Transaction History Modal -->

          </div>
          <!-- End of Transaction History -->

          <!--- Item Owned --->
          <div class="tab-pane fade" id="itemowned" role="tabpanel" aria-labelledby="itemowned-tab">
            <div class="mt-3">
              <div class="h2 d-flex align-items-center"><i class="bi bi-box me-2"></i> Item Owned
              </div>
            </div>
            <div class="table-wrapper">
              <table class="table table-bordered table-border-2 table-hover mb-3 mt-3">
                <thead>
                  <tr class="table-dark">
                    <th>Item Name</th>
                    <th>Posted</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-row table-light" data-bs-toggle="modal" data-bs-target="#itemOwnedModal1">
                    <td>Halloween Costume</span></td>
                    <td>02/03/24 11:18 P.M.</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Item Owned Modal -->
            <div class="modal fade" id="itemOwnedModal1" tabindex="-1" aria-labelledby="itemOwnedModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="itemOwnedModalLabel1">Item Owned Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-5">
                        <img src="htdocs/picture/elmo.jpg" class="img-fluid rounded">
                      </div>
                      <div class="col-md-7">
                        <dl class="row">
                          <dt class="col-sm-5 text-secondary bi-card-heading">&nbsp; Item Name</dt>
                          <dd class="col-sm-7">Halloween Costume</dd>

                          <dt class="col-sm-5 text-secondary bi-card-text">&nbsp; Description</dt>
                          <dd class="col-sm-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                          <dt class="col-sm-5 text-secondary bi-arrow-repeat">&nbsp; Open for</dt>
                          <dd class="col-sm-7"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Borrow<i class=""></i>
                            </span></span></dd>

                          <dt class="col-sm-5 text-secondary bi-pin-map">&nbsp; Pick up</dt>
                          <dd class="col-sm-7">Overton</dd>

                          <dt class="col-sm-5 text-secondary bi-clock">&nbsp; Duration</dt>
                          <dd class="col-sm-7">5 Days</dd>

                          <dt class="col-sm-5 text-secondary bi-calendar-check-fill mb-0">&nbsp; Owned By</dt>
                          <dd class="col-sm-7"><span class="badge align-items-center text-light-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
                              <img class="rounded-circle me-1" width="23" height="23" src="picture/elmo.jpg">Elmo
                            </span>
                          </dd>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
              <!--- End of Item Owned Modal --->

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

</body>

</html>