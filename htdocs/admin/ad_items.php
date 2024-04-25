<?php include "./1db.php"; 

// Get the selected user from the dropdown
$selectedUser = isset($_POST['selectedUser']) ? $_POST['selectedUser'] : '';


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
                            
                            <div class="card-body">
                            <!-- In php If the user want to get the owned item that is loooped  by specific user everytime he click the href links it will show it on the same page but if the $_GET is empty it will show all the items owned by every users -->
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">
                                                Owned By
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><button type="submit" name="selectedUser" value="" class="dropdown-item"></button></li>
                                                <li><a class="dropdown-item" href="#">user 2</a></li>
                                                <li><a class="dropdown-item" href="#">user 3</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
                                        <tr>
                                            <td>Sa Pula sa Puti</td>
                                            <td>Johnny Sins</td>
                                            <td>January 20, 2024</td>
                                            <td class="text-center">
                                            <a href= "./action/item_details.php" class="btn btn-sm border-0">
                                            <i class="bi bi-plus-circle" style="font-size: 1rem; color: #0D6EFD;"></i>
                                            </a></td>
                                        </tr>
                                        <?php 
                                            // Get all items
                                            $sql = "SELECT * FROM item ORDER BY DateTimePosted DESC";
                                            $result = $conn->query($sql);


                                        
                                        
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