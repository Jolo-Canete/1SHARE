<!doctype html>
<html lang="en">

<head>
    <title>Residents</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <style>
        #dropdownMenuButton.dropdown-toggle::after {
            display: none;
        }
    </style>

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>

    <main>
        <?php include "navadmin.php" ?>
        <div class="page-content" id="content">
            <div class="container">
                <h6 class="display-6 fw-bold text-dark text-center mb-3"><i class="bi bi-file-earmark-person" style="font-size: 2.5rem;"></i> User Report</h6>
                <div class="d-flex align-items-center mb-3">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Date
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Newest</a></li>
                            <li><a class="dropdown-item" href="#">Oldest</a></li>
                        </ul>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Reported User</th>
                            <th>Reported By</th>
                            <th>Date Reported</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sheldon Lee Cooper</td>
                            <td>Sheldon Lee</td>
                            <td>January 30, 2024</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm border-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi-three-dots ms-2"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#reportDetails">Details</a></li>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sheldon Lee Cooper</td>
                            <td>Sheldon Lee</td>
                            <td>January 30, 2024</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm border-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi-three-dots ms-2"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link text-secondary" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li>
                            <li class="page-item"><a class="page-link text-secondary" href="#">4</a></li>
                            <li class="page-item"><a class="page-link text-secondary" href="#">5</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="modal fade" id="reportDetails" tabindex="-1" aria-labelledby="reportDetailsLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h1 class="modal-title text-white fs-5" id="reportDetails">Report Details</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="reasonForReport" class="form-label"><b>Reason of Report</b></label>
                                    <textarea class="form-control" id="reasonForReport" rows="3" readonly>qwerty</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="proof/evidence" class="form-label"><b>Proof/Evidence</b></label>
                                    <textarea class="form-control" id="proof/evidence" rows="3" readonly></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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