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
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

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
            padding: 12px 16px;
            color: #333;
            border-radius: 0;
            text-align: left;
        }

        .list-group-item.active {
            color: #212529;
            font-weight: 600;
            background-color: transparent;
        }
    </style>

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>

    <main>
        <div class="page-content" id="content">
            <div class="container">
                <div class="col">
                    <div class="h1 mt-2 mb-3">
                        My Settings
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="d-flex">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-account-list" data-bs-toggle="list" href="#list-account" role="tab" aria-controls="list-account">Account Info</a>
                                <a class="list-group-item list-group-item-action" id="list-privacy-list" data-bs-toggle="list" href="#list-privacy" role="tab" aria-controls="list-privacy">Privacy</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-account" role="tabpanel" aria-labelledby="list-account-list">
                                <p class="h3">Account Info</p>
                                <div class="data">
                                    <p class="h6 text-secondary d-flex">Name: &nbsp;
                                        <span class="text-dark">
                                            <?php echo ucfirst($userData['firstName']) . '&nbsp;' . ucfirst($userData['middleName']) . '. &nbsp; ' . ucfirst($userData['lastName']);    ?>
                                        </span>
                                        <span class="bi bi-pencil-fill text-end ms-auto"></span>
                                    </p>
                                    <div class="mb-2"></div>
                                    <p class="h6 text-secondary d-flex">Email: &nbsp;
                                        <span class="text-dark"><?php echo $userData['userEmail']; ?></span>
                                        <span class="bi bi-pencil-fill text-end ms-auto"></span>
                                    </p>
                                    <div class="mb-2"></div>
                                    <p class="h6 text-secondary d-flex">Phone: &nbsp;
                                        <span class="text-dark"><?php echo $userData['contactNumber']; ?></span>
                                        <span class="bi bi-pencil-fill text-end ms-auto"></span>
                                    </p>
                                    <div class="mb-2"></div>
                                    <p class="h6 text-secondary d-flex">Address: &nbsp;
                                        <span class="text-dark">Zone <?php echo $userData['zone']; ?>, Purok <?php echo $userData['purok']; ?>, Curvada</span>
                                        <span class="bi bi-pencil-fill text-end ms-auto"></span>
                                    </p>
                                    <div class="mb-2"></div>
                                    <p class="h6 text-secondary d-flex">Status: &nbsp;
                                        <span class="badge bg-primary text-white rounded-pill"><?php echo $userData['status']; ?></span>
                                    </p>
                                    <div class="mb-2"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list-privacy" role="tabpanel" aria-labelledby="list-privacy-list">
                                <!-- Privacy content goes here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>