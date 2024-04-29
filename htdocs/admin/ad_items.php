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


// Get the selected user from the dropdown
if (isset($_POST['user'])) {
    $selectedUser = $_POST['user'];
    if (isset($_POST['name_' . $selectedUser])) {
        $name = $_POST['name_' . $selectedUser];
    } else {
        $name = 'All Residents';
    }
} else {
    $selectedUser = '';
    $name = 'All Residents';
}

// Create a custom rows per page
$rows_per_page = 5;

// Get the current Page from the URL
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the starting number for this page
$idCounter = (($currentPage - 1) * $rows_per_page) + 1;

// Formulate the Offset Value
$offset = ($currentPage > 1) ? ($currentPage - 1) * $rows_per_page : 0;



// get the total number of rows in items
$sql = "SELECT COUNT(*) AS total_rows FROM item ";
if (!empty($selectedUser)) {
    // IF the drop down required a user
        $sql .= "WHERE userID = $selectedUser";
}
// Get the sql results
$result = $conn->query($sql);
$itemRow = $result->fetch_assoc();
// Get the total rows of the items
$totalRows = $itemRow['total_rows'];

// Prepare the sql statement to get all items or specified items of a user
$sql = "SELECT i.itemName, i.itemID, i.DateTimePosted, u.username, u.firstName, u.lastName, i.DateTimePosted, u.userID
        FROM item i
        JOIN user u ON i.userID = u.userID";
if (!empty($selectedUser)) {
    $sql .= " WHERE i.userID = $selectedUser";
}
$sql .= " ORDER BY i.DateTimePosted LIMIT $offset, $rows_per_page";
// Run the sql
$result = $conn->query($sql);

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
     <?php ?>
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
                                <li><a class="dropdown-item" href="/htdocs/admin/ad_help.php">Help</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="logout.php">Log Out</a></li>                            </ul>
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
                                                    echo '<button type="submit" name="user" value="' . $userRow['userID'] . '" class="dropdown-item">' . ucfirst($userRow['firstName']) . ' ' . ucfirst($userRow['lastName']) . '</button>';
                                                    echo '</li>';
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
                                            <th> ID</th>
                                            <th>Item Name</th>
                                            <th>Posted By</th>
                                            <th>Item Posted</th>
                                            <th>Full Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="user-table-body">
                                        <?php 
                                        
                                        
                                            // Get the array
                                            if($result->num_rows > 0 ){
                                                
                                            // Get the row Count of the table
                                                $rowCount = 0;
                                            // Get the 
                                                // Loop the values
                                                while($row = $result->fetch_assoc()){

                                                // Check if we need to start a new page
                                                if($rowCount % 5 == 0 && $rowCount !=0) {
                                                    echo '</tr>';
                                                }
                                                // Start a new row if new data is catched
                                                if($rowCount % 5 == 0){
                                                    echo '<tr>';
                                                }  
                                                // Get the date Time posted and store it
                                                $date_TimePosted = strtotime($row['DateTimePosted']);
                                                
                                                // Check if the row was created/updated after the last visit time
                                                if ($date_TimePosted > $last_visit_time) {
                                                    $new_label = '<span class="badge text-bg-success rounded-pill">New</span>';
                                                } else {
                                                    $new_label = '';
                                                }
                                                    // Get the date Time posted and store it
                                                    $date_TimePosted = $row['DateTimePosted'];
                                                    echo '<tr>';
                                                    echo '<td>'. $idCounter . '</td>';
                                                    echo '<td>'. $new_label . ' ' .$row['itemName'] . '</td>';
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
                                                    echo '<td class="text-center">';
                                                    echo '<a href="./action/item_details.php?item_id='.$row['itemID']. '" class="btn btn-sm border-0">';
                                                    echo '<i class="bi bi-plus-circle" style="font-size: 1.25rem; color: #0D6EFD"></i>';
                                                    echo '</a>';
                                                    echo '</td>';

                                                // Loop the table pages
                                                $rowCount++;
                                                $idCounter++;
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
                                    <div class="col">
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-end mb-0">
                                                <!-- Make the Page number dynamic -->
                                                <?php 
                                                    // Round the total pages to the nearest integer
                                                    $total_pages = ceil($totalRows / $rows_per_page);

                                                    // Define the number of visible pages
                                                    $visible_pages = 5;

                                                    // Determine the start and end page
                                                    $start_page = max(1, min($currentPage - floor($visible_pages / 2), $total_pages - $visible_pages + 1));
                                                    $end_page = min($total_pages, max($currentPage + ceil($visible_pages / 2) - 1, $visible_pages));

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
                                                    for ($i = $start_page; $i <= $end_page; $i++) {
                                                        $active = ($i == $currentPage) ? 'active' : '';
                                                        echo "<li class='page-item $active' aria-current='page'>";
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
                                                ?>
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

</body>

</html>