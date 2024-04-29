<?php include "./1db.php"; ?>

<?php 
include "./adminnav.php";

// Check if the last visit time is set in the session
if (isset($_SESSION['last_visit_time'])) {
    $last_visit_time = $_SESSION['last_visit_time'];
} else {
    $last_visit_time = 0; // Set a default value for the first visit
}

// Update the last visit time in the session
$_SESSION['last_visit_time'] = time();


// Check errors
ini_set('display_errors', 1);

// Get the total number of rows from the user table
$sql = "SELECT COUNT(*) AS total_rows FROM user"; 
$result = $conn->query($sql);
$userRow = $result->fetch_assoc();
$totalRows = $userRow['total_rows'];

// Get the rows per page you want
$rows_per_page = 5;

// Get the current page number from the URL
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate where to start in the row pages
$offset = ($currentPage > 1) ? ($currentPage - 1) * $rows_per_page : 0;



// Fetch the unverified users from the database, limiting the results based on the current page
$sqlUnverified = "SELECT * FROM user WHERE COALESCE(status, 'UnVerified') = 'UnVerified' ORDER BY dateJoined DESC LIMIT $offset, $rows_per_page;";
$resultVerified = $conn->query($sqlUnverified);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Resident Verification</title>
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
            width: 1%;
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
                                <li><a class="dropdown-item" href="ad_help.php">Help</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="logout.php">Log Out</a></li>                            </ul>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-fixed w-100">
                                    <thead>
                                        <tr>
                                        <th class="col-2">Resident's Name</th>
                                        <th>Username</th>
                                        <th class="text-center">Purok</th>
                                        <th class="text-center">Zone</th>
                                        <th>Proof of Residency</th>
                                        <th class="text-center">Date Joined</th>
                                        <th class="text-center" colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        // Get the row count for the loop process
                                        $rowCount = 0;
                                        while ($rowVerified = $resultVerified->fetch_assoc()) {

                                            // Check if we need to start a new page
                                            if($rowCount % 5 == 0 && $rowCount !=0) {
                                                echo '</tr>';
                                            }
                                            // Start a new row if new data is caught
                                            if($rowCount % 5 == 0){
                                                '<tr>';
                                            }

                                            // Get the last visit time
                                            $date_TimePosted = strtotime($rowVerified['dateJoined']);
                                                    
                                            // Check if the row was created/updated after the last visit time
                                            if ($date_TimePosted > $last_visit_time) {
                                                $new_label = '<span class="badge text-bg-success rounded-pill">New</span>';
                                            } else {
                                                $new_label = '';
                                            }

                                            // Start the table 
                                            // Print the Resident name and their username   
                                            echo '<tr>';
                                            echo '<td>' . $new_label . ' ' . ucfirst($rowVerified['firstName']) . ' ' . ucfirst($rowVerified['lastName']) . '</td>';
                                            echo '<td>' . $rowVerified['username'] . '</td>';
                                            echo '<td class="text-center">' . ucfirst($rowVerified['purok']) . '</td>';
                                            echo '<td class="text-center">' . ucfirst($rowVerified['zone']) . '</td>';

                                            // Display the verification image
                                            echo '<td align="center">';
                                            echo '<img src="../verify/' . $rowVerified['verifyImage_path'] . '" alt="Verification Image" width="110" height="110">';
                                            echo '</td>';

                                            // Display the date joined
                                            $dateTimeJoined = explode(" ", $rowVerified['dateJoined']);
                                            $dateJoined = $dateTimeJoined[0];

                                            $dateJoinedTimeStamp = strtotime($dateJoined);
                                            $dateJoinedYear = date('Y', $dateJoinedTimeStamp);
                                            $dateJoinedMonth = date('F', $dateJoinedTimeStamp);
                                            $dateJoinedDay = date('j', $dateJoinedTimeStamp);

                                            echo '<td>' . $dateJoinedMonth . ' ' . $dateJoinedDay . ', ' . $dateJoinedYear .  '</td>';

                                            // Display the verify and delete buttons
                                            echo '<form action="" method="post">';
                                            echo '<td class="text-center">' .
                                                '<input type="hidden" id="residentID" name="userID" value="' . $rowVerified['userID'] . '">' .
                                                '<button type="submit" class="btn btn-sm border-0 has-tooltip" title="Verify Resident" name="verifyResident">
                                                <i class="bi bi-person-check" style="font-size: 1.5rem; color: #0D6EFD;"></i>
                                                </button>' .
                                                '</td>';
                                            echo '<td class="text-center">' .
                                                '<button type="submit" class="btn btn -sm border-0 has-tooltip" title="Reject Resident" name="deleteResident"><i class="bi bi-x-circle" style="font-size: 1.5rem; color: #dc3545;"></i></button>' .
                                                '</td>';
                                            echo '</form>';
                                            echo '</tr>';

                                            // Loop the table rows
                                            $rowCount++;
                                        }
                                        echo'</tbody>';
                                        echo '</table>';
                                    ?>
                                    <!-- Get the navigation Links -->
                                    <?php

                                        if ($resultVerified->num_rows == 0) {
                                            echo "<div class='alert alert-warning'>No unverified Residents found, Please go back.</div>";
                                        }

                                        // Display the pagination links
                                        $total_pages = ceil($totalRows / $rows_per_page);
                                        echo "<div class='row align-items-center'>";
                                        echo "<div class='col'>";
                                        echo "<nav aria-label='Page navigation'>";
                                        echo "<ul class='pagination justify-content-end mb-0'>";


                                        // Add the "Previous" button
                                        if ($currentPage > 1) {
                                            echo "<li class='page-item'>";
                                            echo "<a class='page-link' href='?page=" . ($currentPage - 1) . "' aria-label='Previous'>";
                                            echo "<span aria-hidden='true'>&laquo;</span>";
                                            echo "</a>";
                                            echo "</li>";
                                        } else {
                                            echo "<li class='page-item disabled'>";
                                            echo "<a class='page-link' href='#' aria-label='Previous'>";
                                            echo "<span aria-hidden='true'>&laquo;</span>";
                                            echo "</a>";
                                            echo "</li>";
                                        }

                                        // Display the page numbers
                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            $active = ($i == $currentPage) ? 'active' : '';
                                            $disabled = '';

                                            // Check if the current page is empty
                                            $sqlCount = "SELECT COUNT(*) AS count FROM user WHERE COALESCE(status, 'Unverified') = 'Unverified' LIMIT " . ($i - 1) * $rows_per_page . ", $rows_per_page";
                                            $resultCount = $conn->query($sqlCount);
                                            if ($resultCount->num_rows > 0) {
                                                $rowCount = $resultCount->fetch_assoc();
                                                if ($rowCount['count'] == 0) {
                                                    $disabled = 'disabled';
                                                }
                                            }
                                            echo "<li class='page-item $active $disabled' aria-current='page'>";
                                            echo "<a class='page-link' href='?page=$i'>$i</a>";
                                            echo "</li>";
                                        }

                                        // Add the "Next" button
                                        if ($currentPage < $total_pages) {
                                            echo "<li class='page-item'>";
                                            echo "<a class='page-link' href='?page=" . ($currentPage + 1) . "' aria-label='Next'>";
                                            echo "<span aria-hidden='true'>&raquo;</span>";
                                            echo "</a>";
                                            echo "</li>";
                                        } else {
                                            echo "<li class='page-item disabled'>";
                                            echo "<a class='page-link' href='#' aria-label='Next'>";
                                            echo "<span aria-hidden='true'>&raquo;</span>";
                                            echo "</a>";
                                            echo "</li>";
                                        }

                                        echo "</ul>";
                                        echo "</nav>";

                                        // Display an error message if the current page is empty

                                        echo "</div>";
                                        echo "</div>";
                                    ?>                                
                                </div>
                            </div>
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
    <!-- Update the user status -->
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['verifyResident'])) {
        $userID = trim($_POST['userID']);
    
    if(empty($userID)) {
     // Refresh the File
    echo "<script>alert('Cannot be verified due to empty value on the User ID')</script>";
    return;
    }
    // Update the user to Verified
    $updateStatus = 'Verified';
    // Get the current time stamp
    $dateVerified = date('Y-m-d H:i:s');

    // Prepare the sql statement
    $sqlUpdateStatus = "UPDATE user SET status = '$updateStatus' WHERE userID = '$userID'";
        
    // Run the sql statement
    $query = $conn->query($sqlUpdateStatus);

    // Refresh the File
    echo "<script>alert('Congratulations!, New User has been registered')</script>";
    echo "<script>window.location.href='./ad_verify.php'</script>";
  
    }

// If the Admin does not want to verify the user
    if(isset($_POST['deleteResident'])) {
        $userID = trim($_POST['userID']);

        // If the user ID is null
        if(empty($userID)) {
            // Refresh the File
           echo "<script>alert('Cannot be verified due to empty value on the User ID')</script>";
           return;
           } else  {
            // Delete the user
            $sqlUpdateStatus = "DELETE FROM user WHERE userID = $userID";

            // Delete the image
            $imagePath = '../verify/' . $rowVerified['verifyImage_path'];
            if(file_exists($imagePath)) {
                unlink($imagePath);
            } else {
                echo "Error: The image cannot be deleted.";
                return;
            }
        

            // Execute the sql statement
            if($conn->query($sqlUpdateStatus) === TRUE) {
                // Delete the User
                echo "<script>alert('Resident Account has been deleted due to failed verification')</script>";
                echo "<script>window.location.href='./ad_verify.php'</script>";

            } else {
                echo '<div class="alert alert-danger mt-3">Resident Account cannot be deleted due to database error->' . $conn->error . ' </div>';
            }
         }
    }
} 
?>


</body>

</html>