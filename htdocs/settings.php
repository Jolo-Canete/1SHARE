<?php
    include "nav.php";
?>
<!-- Run the Database -->

<?php 
    $sql = "SELECT * FROM user where userID = $user_id";
    $query = mysqli_query($conn, $sql);

    // Fetch the Data
    $user = array();

    while($userRow = mysqli_fetch_assoc($query)) {
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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--- Bootstrap Icon --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>


    <style>
        .list-group-item {
            border-bottom: none;
        }

        .data {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>

</head>

<body>

    <main>
        <div class="page-content" id="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="h1 mt-2">My Settings</p>
                    <div class="mb-3"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Account Info
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            Privacy
                        </a>
                        <!--- Add more if needed --->
                    </div>
                </div>
                <div class="col-10">
                    <p class="h3">Account Info</p>
                    <div class="data">
                        <p class="h6 text-secondary d-flex">Name: &nbsp;
                        <span class="text-dark"> 
                            <?php echo ucfirst($userData['firstName']) . '&nbsp;' . ucfirst($userData['middleName']) . '. &nbsp; ' . ucfirst($userData['lastName']);    ?>  
                        </span>
                        <span class="bi bi-pencil-fill text-end ms-auto"></span>
                        <div class="mb-2"></div>
                        </p>
                        <p class="h6 text-secondary d-flex">Email: &nbsp;
                            <span class="text-dark" id="data-display">canete.jolo@gmail.com</span>
                            <span class="bi bi-pencil-fill text-end ms-auto" data-bs-toggle="modal" data-bs-target="#editModal_email"></span>
                        <div class="mb-2"></div>
                        </p>
                        <p class="h6 text-secondary d-flex">Phone: &nbsp;
                            <span class="text-dark">09203513491</span>
                            <span class="bi bi-pencil-fill text-end ms-auto"></span>
                        <div class="mb-2"></div>
                        </p>
                        <p class="h6 text-secondary d-flex">Address: &nbsp;
                            <span class="text-dark">Zone 11, Purok 26-A, Curvada</span>
                            <span class="bi bi-pencil-fill text-end ms-auto"></span>
                        <div class="mb-2"></div>
                        </p>
                        <p class="h6 text-secondary d-flex">Status: &nbsp;
                            <span class="badge bg-primary text-white rounded-pill">Verified</span>
                        <div class="mb-2"></div>
                        </p>
                    </div>
                    <p class="h3">Login Method</p>
                    <div class="data">
                        <p class="h6 text-secondary d-flex">Password: &nbsp;
                            <span class="text-dark">**********</span>
                            <span class="bi bi-pencil-fill text-end ms-auto"></span>
                        <div class="mb-2"></div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Edit Modal for Email -->
    <div class="modal fade" id="editModal_email" tabindex="-1" aria-labelledby="editModalLabel_email" aria-hidden="true">
        <div class="modal dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel_email">Edit Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>