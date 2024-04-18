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
                <h6 class="display-6 fw-bold text-dark text-center mb-3"><i class="bi bi-people" style="font-size: 2.5rem;"></i> Residents List</h6>
                <div class="d-flex align-items-center mb-3">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Status
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Verified</a></li>
                            <li><a class="dropdown-item" href="#">Not Verified</a></li>
                        </ul>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Date Joined</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sheldon Lee Cooper</td>
                            <td>Sheldon Lee</td>
                            <td class="text-primary fw-bold">Verified</td>
                            <td>January 20, 2024</td>
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
                        <tr>
                            <td>Sheldon Lee Cooper</td>
                            <td>Sheldon Lee</td>
                            <td class="text-danger fw-bold">Not Verified</td>
                            <td>January 20, 2024</td>
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
        </div>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>
</body>

</html>