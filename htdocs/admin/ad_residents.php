<?php include "./1db.php"; 
include "./adminnav.php";

// check all errors
ini_set('display_errors', 1);

// Check if the last visit time is set in the session
if (isset($_SESSION['last_visit_time'])) {
    $last_visit_time = $_SESSION['last_visit_time'];
} else {
    $last_visit_time = 0; // Set a default value for the first visit
}

// Update the last visit time in the session
$_SESSION['last_visit_time'] = time();


// Retrieve the status from the form submission
$status = isset($_POST['status']) ? $_POST['status'] : '';

 // Get all users
 $sqlUser = "SELECT * from user";

// Check the status
if($status === 'Verified'){
    $sqlUser .= " WHERE status = '$status' ORDER BY dateJoined" ;
    
}elseif($status === 'Unverified') {
    $sqlUser .= " WHERE status = '$status' ORDER BY dateJoined";

    // If the status is empty
}else {
    $sqlUser .= " ORDER BY dateJoined";
}
// Run the sql
 $resultUser = $conn->query($sqlUser);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>List of Residents</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <style>
        #dropdownMenuButton.dropdown-toggle::after {
            display: none;
        }

        .card-header {
            background-color: #899499;
            color: white;
            font-size: 1.25rem;
        }

        .card-body {
            padding: 1.25rem;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .badge {
            font-size: 0.8rem;
        }

        .expandable-row .collapse {
            border-top: 1px solid #dee2e6;
            padding-top: 1rem;
        }

        .collapse.show {
            display: table-row;
        }

        .btn-outline-secondary {
            border-radius: 0px;
        }

        .form-control {
            border-radius: 0px;
        }

        .all-color {
            color:cornflowerblue
        }
    </style>
</head>

<body>
    <main>

        <div class="page-content" id="content">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                    </div>
                    <div class="col-9 d-flex justify-content-end">
                        <div class="dropdown">
                            <button class="btn border-0 text-dark p-0 mb-3 dropdown-toggle-split" type="button" style="font-size: 1.3rem;" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="/htdocs/admin/ad_help.php">Help</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="logout.php">Log Out</a></li>                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card col-12">
                    <div class="card-header">
                        <b>List of Residents</b>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $status ? $status : 'All Status'; ?>
                                    </button>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <button type="submit" class="dropdown-item" data-status="All status" name="status"value=""><span class="all-color">All status</span></button>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <button type="submit" class="dropdown-item" data-status="Verified" name="status" value="Verified">Verified</button>
                                            </li>
                                            <li>
                                                <button type="submit"class="dropdown-item" data-status="Unverified" name="status"value="Unverified">Unverified</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form> 
                        <div class="card mt-3">
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Joined Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="user-table-body" >
                                
                                <? 
                                // Run the Sql
                                if ($resultUser->num_rows > 0) {

                                    // Loop the results
                                    while ($rowUser = $resultUser->fetch_assoc()) {
                                        // Get the last visit time
                                        $date_TimePosted = strtotime($rowUser['dateJoined']);
                                                
                                        // Check if the row was created/updated after the last visit time
                                        if ($date_TimePosted > $last_visit_time) {
                                            $new_label = '<span class="badge text-bg-success rounded-pill">New</span>';
                                        } else {
                                            $new_label = '';
                                        }
                                        
                                        // Check if the user is verified or not
                                            $statusBadgeClass = ($rowUser['status'] == "Verified") ? "bg-success" : "bg-danger";
                                            $statusText = ($rowUser['status'] == "Verified") ? "Verified" : "Unverified";
                                
                                        // Split the dateJoined DATETIME
                                            $dateTimeJoined = explode(" ", $rowUser['dateJoined']);
                                            $dateJoined = $dateTimeJoined[0];
                                            $timeJoined = $dateTimeJoined[1];

                                        // Convert the dateJoined data to a timestamp
                                            $dateJoinedTimeStamp = strtotime($dateJoined);

                                        // Extract the year, month name, and day for dateJoined
                                            $dateJoinedYear = date('Y', $dateJoinedTimeStamp);
                                            $dateJoinedMonth = date('F', $dateJoinedTimeStamp);
                                            $dateJoinedDay = date('j', $dateJoinedTimeStamp);

                                        // Split the Time from dateJoined datetime
                                            $timeJoinedParts = explode(":", $timeJoined);
                                            $dateJoinedHour = $timeJoinedParts[0];
                                            $dateJoinedMinute = $timeJoinedParts[1];
                                            $dateJoinedSecond = $timeJoinedParts[2];
                                
                                        // Check if dateVerified is empty or null
                                        if (empty($rowUser['dateVerified']) || $rowUser['dateVerified'] == "0000-00-00 00:00:00") {
                                            $dateVerifiedDisplay = "Not yet Verified";
                                        } else {
                                            // Split the dateVerified DATETIME
                                                $dateTimeVerified = explode(" ", $rowUser['dateVerified']);
                                                $dateVerified = $dateTimeVerified[0];
                                                $timeVerified = $dateTimeVerified[1];

                                            // Convert the dateVerified data to a timestamp
                                                $dateVerifiedTimeStamp = strtotime($dateVerified);

                                            // Extract the year, month name, and day for dateVerified
                                                $dateVerifiedYear = date('Y', $dateVerifiedTimeStamp);
                                                $dateVerifiedMonth = date('F', $dateVerifiedTimeStamp);
                                                $dateVerifiedDay = date('j', $dateVerifiedTimeStamp);

                                            // Split the Time from dateVerified datetime
                                                $timeVerifiedParts = explode(":", $timeVerified);
                                                $dateVerifiedHour = $timeVerifiedParts[0];
                                                $dateVerifiedMinute = $timeVerifiedParts[1];
                                                $dateVerifiedSecond = $timeVerifiedParts[2];
                                                $dateVerifiedDisplay = $dateVerifiedMonth . ' ' . $dateVerifiedDay . ', ' . $dateVerifiedYear . '<br><i class="bi bi-clock"></i>' . $dateVerifiedHour . ':' . $dateVerifiedMinute;
                                            }
                                
                                        echo '<tr>';
                                        echo '<td>'. $new_label . ' ' . ucfirst($rowUser['firstName']) . '</td>';
                                        echo '<td>' . ucfirst($rowUser['middleName']) . '</td>';
                                        echo '<td>' . ucfirst($rowUser['lastName']) . '</td>';
                                        echo '<td>' . ucfirst($rowUser['username']) . '</td>';
                                        echo '<td><span class="badge ' .$statusBadgeClass .' text-white rounded-pill">' .$statusText . '</span></td>';
                                        echo '<td>' . $dateJoinedMonth . ' ' . $dateJoinedDay . ', ' . $dateJoinedYear . ' <br><i class="bi bi-clock"></i> ' . $dateJoinedHour . ':' . $dateJoinedMinute .'</td>';
                                        echo '<td class="text-center">';
                                        echo '<a href="./action/user_details.php?userID='. $rowUser['userID']. '" class="btn btn-sm border-0">';
                                        echo '<i class="bi bi-plus-circle" style="font-size: 1rem; color: #0D6EFD;"></i>';
                                        echo '</a></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No Users found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var numRowsInput = document.getElementById("numRowsInput");
            var button = document.getElementById("toggleRowsButton");
            var tableRows = document.querySelectorAll("tbody tr");
            var showLimited = true;

            function toggleRows() {
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