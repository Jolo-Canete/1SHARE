<?php
include "nav.php";
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
    );

    array_push($user, $userData);
}


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
    </style>

</head>

<body>
    <main>
        <!--- Page Content Holder --->
        <div class="page-content" id="content">

            <div class="container">
                <div class="col">
                    <div class="h1 mt-2 mb-3">
                        My Settings
                    </div>
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
                                <div class="card shadow">
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
                                                    <span class="text-dark">October 25, 1995</span>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bold text-secondary me-2">Date Joined:</div>
                                                    <span class="text-dark">January 1, 2024</span>
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
                                                    <span class="text-dark">Bobords</span>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="fw-bold text-secondary me-2">Status:</div>
                                                    <span class="text-primary"><b>Verified</b><span class="text-secondary mx-2"><small>last January 1, 2024</small></span>
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
                                    <div class="card shadow-sm mb-4">
                                        <div class="card-body">
                                            <?php include "termsandcondition.php"; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--- End of Terms and Conditions Tab Pane --->
                        <!--- Privacy Tab Pane --->
                        <div class="tab-pane fade" id="list-privacy" role="tabpanel" aria-labelledby="list-privacy-list">
                            <h3 class="mb-4">Privacy</h3>
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="fw-bold text-secondary me-2">Password:</div>
                                        <span class="text-dark flex-grow-1">**********************</span>
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