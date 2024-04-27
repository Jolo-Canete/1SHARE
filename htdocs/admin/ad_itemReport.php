<?php include "./1db.php";

// check all errors
ini_set('display_errors', 1);

// Get the button form
$dateOrder = isset($_POST['dateOrder']) ? $_POST['dateOrder'] : '';



if($dateOrder == 'order by dateTime DESC'){
    $order = " ORDER BY dateTime DESC";

} else if($dateOrder == 'order by dateTime'){
    $order = " ORDER BY dateTime";

} else {
    $order = " ORDER BY userID";
    }   
// Get the rows per page
    $rows_per_page = 5;

// get the current number page from the URL
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Formulate the offset value
    $offset = ($currentPage > 1) ? ($currentPage - 1) * $rows_per_page : 0; 

// Get the total rows of the reporrteditem
$sql = "SELECT COUNT(*) AS total_rows FROM reporteditem";


// Get the sql results
$result = $conn->query($sql);
$itemRow = $result->fetch_assoc();

// Get the total rows of the item

$totalRows = $itemRow['total_rows'];

// Prepare the sql statement to get all the data from user,item and reporteditem
$sql = "SELECT re.*, u.firstName, u.lastName,  i.itemName
FROM reporteditem re
JOIN user u ON re.userID = u.userID
JOIN item i ON re.itemID = i.itemID";

// Check if the $dateOrder is empty





























































































































































































































































































if (!empty($dateOrder)) {
    $sql .= ' ' . $order;
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Item Report</title>
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
    </style>

</head>

<body>
    <main>
    <?php include "./adminnav.php" ?>
        <div class="page-content" id="content">
            <div class="container">
            <div class="row">
            <div class="col-3">
                        <!-- Necessary blank space -->
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
                        <div class="card" style="width: 62.5rem;">
                            <div class="card-header">
                                <b>List of Item Reported</b>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <div class="dropdown">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">
                                                    Date
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li>
                                                        <button type="submit" class="dropdown-item" value="order by dateTime DESC" name="dateOrder">Latest</button>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <button type="submit"  class="dropdown-item" value="order by dateTime">Oldest</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <form class="d-flex">
                                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                            </form>
                                        </div>
                                    </div>
                                </form>
                                <div class="mb-3"></div>
                                <div class="card mt-3">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        
                                        <tr>
                                            <th>Reported By</th>
                                            <th>Item Reported</th>
                                            <th>Date Reported</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="badge text-bg-success rounded-pill">New</span> Detective Conan</td>
                                            <td class="fw-bold text-danger">Magnitude 1.2</td>
                                            <td>April 17, 2024 at 6:56:00 P.M.</td>
                                            <td class="text-center">
                                                <a href="./action/itemReport.php" class="btn btn-sm border-0">
                                                    <i class="bi bi-plus-circle" style="font-size: 1rem; color: #0D6EFD;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                </div>
                                <div class="row align-items-center">
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