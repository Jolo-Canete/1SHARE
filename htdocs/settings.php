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
                            <span class="text-dark">canete.jolo@gmail.com</span>
                            <span class="bi bi-pencil-fill text-end ms-auto"></span>
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

    <footer>
        <!--- <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>

                <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <ul class="nav col-md-4 justify-content-end">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
                </ul> --->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
  
</body>

</html>