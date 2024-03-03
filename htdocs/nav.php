<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .sidebar {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            width: 60px; /* Set initial width to a smaller value */
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
            overflow-y: auto;
            transition: width 0.3s; /* Added transition for smooth animation */
        }

        .sidebar.collapsed {
            width: 200px; /* Adjusted expanded width */
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .sidebar a .icon {
            margin-right: 10px;
        }

        .main-content {
            margin-left: 60px; /* Adjusted initial margin */
            padding: 20px;
            transition: margin-left 0.3s; /* Added transition for smooth animation */
        }

        .main-content.collapsed {
            margin-left: 200px; /* Adjusted collapsed margin */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
        <div class="container">
            <div class="d-flex">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                <button class="btn btn-outline-secondary" type="button" onclick="toggleSidebar()">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;


            <a class="navbar-brand" href="home.php">I S H A R E</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarsExample02">
                <form role="search" class="w-50">
                    <div class="input-group">
                        <input class="form-control rounded-0" type="search" placeholder="Search" aria-label="Search" style="background-color: white;">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary rounded-0" type="button" style="border-color: black; background-color: black;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </nav>

    <div class="sidebar collapsed" id="sidebar"> <!-- Initially collapsed -->
        <a href="/" class="mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="icon">
                <svg class="bi pe-none" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
            </span>
            <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active" aria-current="page">
                    <span class="icon">
                        <svg class="bi pe-none" width="16" height="16">
                            <use xlink:href="#house-door" />
                        </svg>
                    </span>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <span class="icon">
                        <svg class="bi pe-none" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <span class="icon">
                        <svg class="bi pe-none" width="16" height="16">
                            <use xlink:href="#table" />
                        </svg>
                    </span>
                    <span>Orders</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <span class="icon">
                        <svg class="bi pe-none" width="16" height="16">
                            <use xlink:href="#grid" />
                        </svg>
                    </span>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <span class="icon">
                        <svg class="bi pe-none" width="16" height="16">
                            <use xlink:href="#people-circle" />
                        </svg>
                    </span>
                    <span>Customers</span>
                </a>
            </li>
        </ul>

        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>

    <div class="main-content collapsed" id="main-content"> <!-- Initially collapsed -->
        <!-- Your main content goes here -->
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('collapsed');
            if (!sidebar.classList.contains('collapsed')) {
                // Expand the sidebar when clicked
                sidebar.style.width = "200px";
                mainContent.style.marginLeft = "200px"; // Adjust main content margin
            } else {
                // Collapse the sidebar
                sidebar.style.width = "60px";
                mainContent.style.marginLeft = "60px"; // Adjust main content margin
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
