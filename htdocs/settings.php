<?php
include "nav.php";
include "1db.php";
?>
<!-- Run the Database -->

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
}

// transform the hashed password to asterisk
$hashedPassword = $userData['password'];
$asteriskPassword = str_repeat("*", strlen($hashedPassword));


// Split the DATETIME
$dateTime = explode(" ", $userData['dateJoined']);
$date = $dateTime[0];
$time = $dateTime[1];

    // Format the integer date into string
    $date = date("Y-m-d", strtotime($date));
    $dateJoinedNum = date("m", strtotime($date));
    $dateJoinedName = date('F', mktime(0, 0, 0, $dateJoinedNum, 10));

    // Compile the output
    $Date = str_replace($dateJoinedNum, $dateJoinedName, $date);

    // Seperate the date
    $dateJoined = explode("-", $Date);
    $dateJoinedYear = $dateJoined[0];
    $dateJoinedMonth = $dateJoined[1];
    $dateJoinedDay = $dateJoined[2];

    // Seperate the Time
    $time = explode(":", $time);
    $dateJoinedHour = $time[0];
    $dateJoinedMinute = $time[1];
    $dateJoinedSecond = $time[2];
// Format the Birthdate to Date
    $Birthday = $userData['birthDay'];
    // Convert the integer date to string
    $Birthday = date("Y-m-d", strtotime($Birthday));
    $monthNum = date("m", strtotime($Birthday));
    $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));

    // Final Output
    $BirthDay = str_replace($monthNum, $monthName, $Birthday);

    // Seperate the date
    $Birthday = explode("-", $BirthDay);
    $birthYear = $Birthday[0];
    $birthMonth = $Birthday[1];
    $birthDay = $Birthday[2];


?>

<!doctype html>
<html lang="en">

<head>
    <title>Settings</title>
    <!-- Required meta tags -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <style>
        .data {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .list-group-item {
            border: none;
            border-radius: 0;
            color: #333;
            border-radius: 0;
            text-align: left;
        }

        .list-group-item.active {
            color: #212529;
            font-weight: 600;
            background-color: transparent;
        }
        .modal-dialog {
      max-width: 600px;
    }

    #unverified {
        color: #EE4B2B !important;
    }
    </style>

</head>

<body>
    <main>
        <!--- Page Content Holder --->
        <div class="page-content" id="content">

            <div class="container">
                <div class="col">
                <h1 class="text-center mb-4 mt-3"><i class="bi-gear"></i> SETTINGS</h1>
                </div>

                <!--- Tab List --->
                <div class="row">
                    <div class="col-2">
                        <div class="d-flex">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-account-list" data-bs-toggle="list" href="#list-account" role="tab" aria-controls="list-account">Account Info</a>
                                <a class="list-group-item list-group-item-action" id="list-privacy-list" data-bs-toggle="list" href="#list-privacy" role="tab" aria-controls="list-privacy">Privacy</a>
                                <a class="list-group-item list-group-item-action" id="list-termsandconditions-list" data-bs-toggle="list" href="#list-termsandconditions" role="tab" aria-controls="list-termsandconditions">Terms and Conditions</a>
                            </div>
                        </div>
                    </div>

                    <!--- Account Info Tab Pane --->
                    <div class="col-10">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-account" role="tabpanel" aria-labelledby="list-account-list">
                                <h3 class="mb-2">Account Information</h3>
                                <div class="card shadow-lg border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bold text-secondary me-2">First Name:</div>
                                                    <span class="text-dark"><?php echo ucfirst($userData['firstName']); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bold text-secondary me-2">Middle Name:</div>
                                                    <span class="text-dark"><?php echo ucfirst($userData['middleName']); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bold text-secondary me-2">Last Name:</div>
                                                    <span class="text-dark"><?php echo ucfirst($userData['lastName']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bold text-secondary me-2">Date of Birth:</div>
                                                    <span class="text-dark"><? echo $birthMonth .'&nbsp' . $birthDay . ',&nbsp;' . $birthYear; ?></span>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#editModal_birthdate" >
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bold text-secondary me-2">Date Joined:</div>
                                                    <span class="text-dark"><? echo $dateJoinedMonth .'&nbsp;'. $dateJoinedDay.',&nbsp;'. $dateJoinedYear; ?></small></span>
                                                <div class="fw-bold text-secondary me-2 ms-2">Time:</div>
                                                <span class="text-dark"> <? echo $dateJoinedHour.':'.$dateJoinedMinute;?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bold text-secondary me-2">Purok:</div>
                                                    <span class="text-dark"><?php echo $userData['purok']; ?></span>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bold text-secondary me-2">Zone:</div>
                                                    <span class="text-dark"><?php echo $userData['zone']; ?></span>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bold text-secondary me-2">Email:</div>
                                                    <span class="text-dark" id="data-display"><?php echo $userData['userEmail']; ?></span>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm ms-auto"  data-bs-toggle="modal" data-bs-target="#editModal_email">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bold text-secondary me-2">Contact Number:</div>
                                                    <span class="text-dark"><?php echo $userData['contactNumber']; ?></span>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bold text-secondary me-2">Username:</div>
                                                    <span class="text-dark"><?php echo $userData['username'] ?></span>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                            <div class="d-flex align-items-center">
                                            <div class="fw-bold text-secondary me-2">Status:</div>
                                            <?php 
                                            if($userData['status'] === 'Unverified') {
                                                echo '<span class="text-primary" id="unverified"><b>Unverified</b></span>';
                                            } else {
                                                echo '<span class="text-primary"><b>Verified</b></span>';
                                            }
                                            ?>
                                            <span class="text-dark me-2 ms-2"><?php echo $dateJoinedMonth .'&nbsp;'. $dateJoinedDay.',&nbsp;'. $dateJoinedYear; ?></span>
                                            <div class="fw-bold text-secondary me-2 ms-2">Time:</div>
                                            <span class="text-dark"><?php echo $dateJoinedHour.':'.$dateJoinedMinute;?></span>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--- End of Account Info Tab Pane --->

                        <!--- Terms and Conditions Tab Pane --->
                        <div class="col-12">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade" id="list-termsandconditions" role="tabpanel" aria-labelledby="list-termsandconditions-list">
                                    <h3 class="mb-4">Terms and Conditions</h3>
                                    <div class="card shadow-lg mb-4 border-0">
                                        <div class="card-body">
                                            <?php include "termsandcondition.php"; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--- End of Terms and Conditions Tab Pane --->
                        <!--- Privacy Tab Panel --->
                        <div class="tab-pane fade" id="list-privacy" role="tabpanel" aria-labelledby="list-privacy-list">
                            <h3 class="mb-4">Privacy</h3>
                            <div class="card border-0 shadow-lg mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="fw-bold text-secondary me-2">Password:</div>
                                        <span class="text-dark flex-grow-1" title="The number of asterisks doesn't represent your actual password length. It's hashed for your security."><? echo $asteriskPassword; ?></span>
                                        <button type="button" class="btn btn-outline-secondary btn-sm">
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bold text-secondary me-2">Transaction History</div>
                                        <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                            <i class="bi bi-lock-fill"></i>
                                        </button>
                                    </div>
                                    <p class="text-dark mb-0">By unlocking your Transaction History, your transactions can be seen by anyone.</p>
                                </div>
                            </div>
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="fw-bold text-secondary me-2">Item Owned</div>
                                        <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                            <i class="bi bi-lock-fill"></i>
                                        </button>
                                    </div>
                                    <p class="text-dark mb-0">By unlocking your Item Owned, your owned items can be seen by anyone.</p>
                                </div>
                            </div>
                        </div>
                        <!--- End of Privacy Tab Pane --->

                    </div>
                </div>
            </div>
        </div>
    <!-- modals for interactive pens -->
    <?php include 'setting_modals.php'; ?> 
        
    </main>

    <footer>
        <!-- place footer here -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>