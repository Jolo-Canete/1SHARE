<?php include "./1db.php"; 

// Check errors
ini_set('display_errors', 1);

// Get the selected user from the dropdown
if (isset($_POST['user'])) {
    $selectedUser = $_POST['user'];
    $name = $_POST['name_' . $selectedUser];
} else {
    $selectedUser = '';
    $name = 'All Residents';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>List of Items</title>
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

        .all-user {
            color:cornflowerblue;
        }
    </style>

</head>

<body>
    <main>
    <?php include "./adminnav.php" ?>
        <div class="page-content" id="content">
            <div class="container">
            <div class="row">
                    <div class="col-3">
                    </div>
                    <div class="col-9 d-flex justify-content-end">
                        <div class="dropdown">
                            <button class="btn border-0 text-dark p-0 mb-3 dropdown-toggle" type="button" style="font-size: 1.3rem;" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Help</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card" style="width: 60.5rem;">
                            <div class="card-header">
                                <b>List of Items</b>
                            </div>
                            <!-- Table Order -->
                            <div class="card-body">
                            <form action="" method="post">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">
                                                <?php echo $name ?>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><button type="submit" name="user" value=""  class="dropdown-item"><span class="all-user">All Residents</span></button></li>
                                            
                                                <?php 
                                                // Get all the user
                                                $userQuery = "SELECT * FROM user";
                                                $userResult = $conn->query($userQuery);

                                                // Loop the users
                                                while($userRow = $userResult->fetch_assoc()){
                                                    echo '<li>';
                                                    echo '<input type="hidden" name="name_' . $userRow['userID'] . '" value="' . ucfirst($userRow['firstName']) . ' ' . ucfirst($userRow['lastName']) . '">';
                                                    echo '<button type="submit" name="user" value="' . $userRow['userID'] . '" class="dropdown-item">' . ucfirst($userRow['firstName']) . ' ' . ucfirst($userRow['lastName']) . '</button>';                                                    echo '</li>';

                                                }   
                                        ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                                <div class="card mt-3">
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Posted By</th>
                                            <th>Item Posted</th>
                                            <th>Full Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="user-table-body">
                                        <?php 
                                            // Prepare the sql statement that finds all items or specific items owned by a user
                                            $sql = "SELECT i.*, u.username, u.firstName, u.lastName, i.DateTimePosted
                                            FROM item i
                                            JOIN user u ON i.userID = u.userID";
                                            if (!empty($selectedUser)) {
                                                // IF the drop down required a user
                                                $sql .= " WHERE i.userID = $selectedUser";
                                                $sql .= " ORDER BY i.DateTimePosted";
                                            } else {
                                                // Get the order by
                                                $sql .= " ORDER BY i.DateTimePosted";
                                            }
                                            // Run the sql
                                            $result = $conn->query($sql);

                                            // Get the array
                                            if($result->num_rows > 0 ){
                                                // Loop the values
                                                while($row = $result->fetch_assoc()){
                                                    // Get the date Time posted and store it
                                                    $date_TimePosted = $row['DateTimePosted'];
                                                    echo '<tr>';
                                                    echo '<td>' .$row['itemName'] . '</td>';
                                                    echo '<td>' . $row['firstName'] . ' ' . $row['lastName'] . '</td>';

                                                    // Split the Item DateTimePosted
                                                    $dateTimePosted = explode(" ", $date_TimePosted );
                                                    $datePosted = $dateTimePosted[0];
                                                    $timePosted = $dateTimePosted[1];

                                                    // Convert the datePosted into a timestamp
                                                    $datePostedTimestamp = strtotime($datePosted);

                                                    // Extract the year, month name and day for the Date
                                                    $dateYear = date('Y', $datePostedTimestamp);
                                                    $dateMonth = date('F', $datePostedTimestamp);
                                                    $dateDay = date('j', $datePostedTimestamp);
                                                    
                                                    // Split the TIme from dateTimePosted
                                                    $timeJoinedParts = explode(":", $timePosted);
                                                    $timeHour = $timeJoinedParts[0];
                                                    $timeMinute = $timeJoinedParts[1];
                                                    $timeSecond = $timeJoinedParts[2];

                                                    // Convert the time to an AM PM format
                                                    $timeAmPm = date('h:i A', strtotime($timeHour . ':' . $timeMinute));

                                                    echo "<td>$dateMonth $dateDay, $dateYear : <i class='bi bi-clock'></i> $timeAmPm</td>";
                                                    // <a href= "./action/item_details.php" class="btn btn-sm border-0">
                                                    // <i class="bi bi-plus-circle" style="font-size: 1rem; color: #0D6EFD;"></i>
                                                    // </a></td>
                                                    echo '<td class="text-center">';
                                                    echo '<a href="./action/item_details.php" class="btn btn-sm border-0">';
                                                    echo '<i class="bi bi-plus-circle" style="font-size: 1.25rem; color: #0D6EFD"></i>';
                                                    echo '</a>';
                                                    echo '</td>';
        
      
                                                }
                                            } else{
                                                // Write an empty item message if there are no item that belonged to the user
                                                echo '<td colspan="4"><div class="alert alert-warning text-center">This Resident doesn\'t have any item.</div></td>';
                                            }
                                        
                                        ?>
                                    </tbody>
                                </table>
                                </div>
                                </div>
                                <div class="row align-items-center">
                                <div class="col-3">
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