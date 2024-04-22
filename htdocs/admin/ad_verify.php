<?php 
include "./1db.php"; include "./adminnav.php";

// Check errors
ini_set('display_errors', 1);

// Get the Unverfied users
$sqlUnverified = "SELECT * FROM user WHERE COALESCE(status, 'UnVerified') = 'UnVerified'";
$resultVerified = $conn->query($sqlUnverified);

// Get the image path for the UnVerified proof

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Verify</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <style>
        #dropdownMenuButton.dropdown-toggle::after {
            display: none;
        }

        .expandable-row .collapse {
            border-top: 1px solid #dee2e6;
            padding-top: 1rem;
        }

        

        .table th,
        .table td {
            width: 1%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

.table th:nth-child(5),
.table td:nth-child(5),
.table th:nth-child(6),
.table td:nth-child(6) {
    width: 3%;
}

.table th,
.table td {
    width: calc((100% - 16%) / 29);
}

    </style>

</head>

<body>
    <main>
        <div class="page-content" id="content">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <form class="input-group mb-3">
                            </button>
                        </form>
                    </div>
                    <div class="col-9 d-flex justify-content-end">
                        <div class="dropdown">
                            <button class="btn border-0 text-dark p-0 mb-3 dropdown-toggle" type="button" style="font-size: 1.3rem;" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Help</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card" style="width: 100%;">
                            <div class="card-header">
                                <b>List of  Unverified Residents</b>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <form class="d-flex">
                                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        </form>
                                    </div>
                                </div>
                                <div class="mb-3"> <!--Just a necessity blank space --> </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-fixed w-100">
                                    <thead>
                                        <tr>
                                        <th class="col-2">Resident's Name</th>
                                        <th>Username</th>
                                        <th class="text-center">Purok</th>
                                        <th class="text-center">Zone</th>
                                        <th>Proof of Residency</th>
                                        <th class="text-center" colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <form action="" method="post">
                                    <tbody>
                                            <?php 
                                            // Loop the Unverified users
                                            if($resultVerified->num_rows > 0){
                                                while($rowVerified = $resultVerified->fetch_assoc()){
                                                    echo '<tr>';
                                                    echo '<td>' . ucfirst($rowVerified['firstName']) . ' '. ucfirst($rowVerified['lastName']) . '</td>';
                                                    echo '<td>' . $rowVerified['username'] . '</td>';
                                                    echo '<td class="text-center">' . ucfirst($rowVerified['purok']) . '</td>';
                                                    echo '<td class="text-center">' . ucfirst($rowVerified['zone']) . '</td>';

                                                    // Get the image from the verify folder
                                                    echo '<td align="center">';
                                                    echo '<img src="../verify/'.$rowVerified['verifyImage_path'] .'" alt="Verification Image" width="100" height="100">';
                                                    echo '</td>';
                                                    
                                                    // Continue with the verify button
                                                    echo '<td class="text-center">' .
                                                    '<form method="post" action="ad_verify.php">' .
                                                    '<input type="hidden" name="residentID" value="' . $rowVerified['userID'] . '">' .
                                                    '<button type="submit" name="verifyResident" class="btn btn-sm border-0 has-tooltip" title="Verify Resident"><i class="bi bi-person-check" style="font-size: 1rem; color: #0D6EFD;"></i></button>' .
                                                    '</form>' .
                                                    '</td>';
                                                
                                                echo '<td class="text-center">' .
                                                    '<button type="submit" class="btn btn-sm border-0 has-tooltip" title="Reject Resident" name="deleteResident"><i class="bi bi-x-circle" style="font-size: 1rem; color: #dc3545;"></i></button>' .
                                                    '</td>';
                                                }
                                            }
                                            
                                            
                                            
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <div class="row g-2">
                                            <div class="col">
                                                <input type="number" id="numRowsInput" class="form-control form-control-sm me-2" placeholder="Number of Rows">
                                            </div>
                                            <div class="col">
                                                <button id="toggleRowsButton" class="btn btn-primary btn-sm">Show Rows</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-end mb-0">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item active" aria-current="page">
                                                    <a class="page-link" href="#">1</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <!-- Modal for Actions -->

    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Update the user status -->
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['verifyResident'])) {
        $userID = $_POST['residentID'];

    // Update the user to Verified
    $updateStatus = 'Verified';
    // Get the current time stamp
    $dateVerified = date('Y-m-d H:i:s');

    // Prepare the sql statement
    $sqlUpdateStatus = "UPDATE user SET status = '$updateStatus', dateVerified = '$dateVerified' WHERE userID = '$userID'";
        
    // Run the sql statement
    $query = $conn->query($sqlUpdateStatus);

    // Refresh the File
    echo "<script>alert('Congratulations!, New User has been registered')</script>";
    echo "<script>window.location.href='./ad_verify.php'</script>";


    
    }


}


?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var numRowsInput = document.getElementById("numRowsInput");
            var button = document.getElementById("toggleRowsButton");
            var tableRows = document.querySelectorAll("tbody tr");
            var showLimited = true;

            function toggleRows() {htdocs/admin/ad_verify.php
                var numRowsToShow = parseInt(numRowsInput.value);
                if (isNaN(numRowsToShow) || numRowsToShow <= 0) {
                    alert("Please enter a valid number of rows.");
                    return;
                }

                for (var i = 0; i < tableRows.length; i++) {
                    if (i >= numRowsToShow) {
                        tableRows[i].classList.add("d-none");
                    } else {
                        tableRows[i].classList.remove("d-none");
                    }
                }

                button.textContent = showLimited ? "Show All Rows" : "Show Limited Rows";
                showLimited = !showLimited;
            }

            button.addEventListener("click", toggleRows);
        });
    </script>
</body>

</html>