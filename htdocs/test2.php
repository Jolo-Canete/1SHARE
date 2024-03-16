<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <!--- Style --->
    <style>
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }

        .navbar {
            z-index: 1000;
        }

        .sidebar {
            width: 215px;
            transition: width 0.3s ease;
            position: fixed;
            top: 58px;
            left: 0;
            bottom: 0;
            z-index: 1030;
            background-color: #212529;
        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            color: white;
            display: block;
            transition: padding 0.3s;
        }

        .sidebar a:hover {
            padding: 10px;
            width: 180px;
            padding-left: 15px;
            background-color: #495057;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .nav-text {
            margin-left: 10px;
            font-size: 14px;
            white-space: nowrap;
            color: #fff;
        }

        .sidebar.collapsed .nav-text {
            display: block;
        }

        .nav-item {
            transition: background-color 0.3s ease;
        }

        .nav-link svg {
            fill: white;
        }

        .nav-link:hover svg {
            fill: #526e75;
        }

        @media (max-width: 992px) {

            /* Adjust sidebar width and positioning for smaller screens */
            .sidebar {
                position: fixed;
                margin-right: 40px;
            }

            main {
                margin-left: 80px;
            }
        }

        #clam {
            font-size: 18px;
        }

        #clam:hover {
            color: #526e75;
            /* Add any other hover styles you want */
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 200px;
            /* Set initial margin to accommodate the expanded sidebar */
            transition: margin-left 0.3s;
            /* Add transition for smooth animation */
        }

        .sidebar.collapsed+.content {
            margin-left: 80px;
            /* Adjusted margin when sidebar is collapsed */
        }
    </style>
</head>

<body>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Notifications</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            ...
        </div>
    </div>

    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top" aria-label="Second navbar example">
        <div class="d-flex">
            &nbsp;&nbsp;&nbsp;
            <button class="btn btn-outline-secondary" type="button" onclick="toggleSidebar()">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <a class="navbar-brand" href="home.php" style="margin-left: 50px;">
            <img src="picture/logo.png" alt="I S H A R E logo" style="height: 30px; ">
            I S H A R E
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a id="clam" class="navbar-brand" href="finditem.php" style="margin-left: 80px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16" style="margin-bottom: 3px;">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
            </svg>
            Find Items


        </a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="collapse navbar-collapse justify-content-left" id="navbarsExample02">
            <form role="search" class="w-50 d-flex justify-content-end">
                <div class="input-group">
                    <input class="form-control rounded-0" type="search" placeholder="Search" aria-label="Search" style="background-color: white;">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary rounded-0" type="button" style="border-color: black; background-color: white;">
                            <div class="bi-search" width="18" height="18">
                            </div>
                        </button>
                    </div>
                </div>
            </form>
            <div class="collapse navbar-collapse justify-content-end" id="navbarsExample02">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php" style="padding: 10px;">
                            <div class="bi-person-circle" width="24" height="24" fill="currentColor">
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="padding: 10px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRightLabel">
                            <div class="bi-bell" width="24" height="24" fill="currentColor">
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="padding: 10px;">
                            <div class="bi-gear" width="24" height="24" fill="currentColor">
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="sidebar">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px;">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link text-white" aria-current="page">
                            <div class="bi-house-door" width="16" height="16">
                                <span class="fs-8 ms-lg-2">Home</span>
                            </div>
                        </a>
                    </li>
                    
                    <li>
                        <a href="profile.php" class="nav-link text-white">
                            <div class="bi-person-circle" width="16" height="16">
                                <span class="fs-8 ms-lg-2">Profile</span>
                            </div>
                        </a>
                    </li>
                    
                    <li>
                        <a href="additem.php" class="nav-link text-white">
                            <div class="bi-box" width="16" height="16">
                                <span class="fs-8 ms-lg-2">Inventory</span>
                            </div>
                        </a>
                    </li>
                    
                    <li>
                        <a href="request.php" class="nav-link text-white">
                            <div class="bi-card-checklist" width="16" height="16">
                                <span class="fs-8 ms-lg-2">Request Approval</span>
                            </div>
                        </a>
                    </li>
                    
                    <li>
                        <a href="cart.php" class="nav-link text-white">
                            <div class="bi-cart" width="16" height="16">
                                <span class="fs-8 ms-lg-2">Cart</span>
                            </div>
                        </a>
                    </li>
                    
                    <li>
                        <a href="dashboard.php" class="nav-link text-white">
                            <div class="bi-speedometer2" width="16" height="16">
                                <span class="fs-8 ms-lg-2">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    
                    <li>
                        <a href="settings.php" class="nav-link text-white">
                            <div class="bi-gear" width="16" height="16">
                                <span class="fs-8 ms-lg-2">Settings</span>
                            </div>
                        </a>
                    </li>
                </ul>
    </main>




    <script>
        // Function to collapse the sidebar
        function collapseSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const navTexts = document.querySelectorAll('.nav-text');
            sidebar.classList.add('collapsed');
            sidebar.style.width = "80px";
            navTexts.forEach(text => text.style.display = 'none');
            overlay.style.display = 'none';
        }

        // Function to expand the sidebar
        function expandSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const navTexts = document.querySelectorAll('.nav-text');
            sidebar.classList.remove('collapsed');
            sidebar.style.width = "200px";
            navTexts.forEach(text => text.style.display = 'block');
            overlay.style.display = 'block';
        }



        // Function to toggle the sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar.classList.contains('collapsed')) {
                expandSidebar();
            } else {
                collapseSidebar();
            }
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            if (sidebar.classList.contains('collapsed')) {
                content.style.marginLeft = '200px'; // Adjusted margin for collapsed sidebar
                expandSidebar(); // Call expandSidebar to ensure proper adjustment
            } else {
                content.style.marginLeft = '70px'; // Default margin for expanded sidebar
                collapseSidebar(); // Call collapseSidebar to ensure proper adjustment
            }
        }



        // Event listener for the menu button
        document.getElementById('menu-btn').addEventListener('click', toggleSidebar);

        // Event listener for clicks anywhere on the document body
        document.body.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const clickedElement = event.target;
            const isMenuButton = clickedElement.id === 'menu-btn';
            const isSidebar = clickedElement.id === 'sidebar' || clickedElement.closest('#sidebar');
            if (!isMenuButton && !isSidebar) {
                if (sidebar.classList.contains('collapsed')) {
                    expandSidebar();
                } else {
                    const isClickInsideNavbar = clickedElement.closest('.navbar');
                    if (!isClickInsideNavbar) {
                        collapseSidebar();
                    }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>