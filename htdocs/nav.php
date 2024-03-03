<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar {
            z-index: 1000;
        }

        .sidebar {
            width: 80px;
            top: 56px;
            left: 0;
            bottom: 0;
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            transition: width 0.3s ease;
            position: fixed;
            z-index: 1;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .nav-link {
            display: block;
            text-align: center;
        }

        .nav-text {
            display: none;
            left: calc(100% + 10px);
            font-size: 14px;
            white-space: nowrap;
            color: #fff;
        }

        .sidebar.collapsed .nav-text {
            display: block;
        }

        .nav-icon {
            width: 24px;
            height: 24px;
            fill: #fff;
            transition: fill 0.3s ease;
        }

        .nav-item:hover .nav-icon {
            fill: #ffc107;
        }

        .nav-item {
            transition: background-color 0.3s ease;
        }

        .nav-link {
            display: block;
            text-align: center;
            padding: 10px 0;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #495057;
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

        .nav-link:hover svg {
            fill: white;
        }
    </style>
</head>

<body>

    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">

    <symbol id="inventory" viewBox="0 0 16 16">
    <path fill-rule="evenodd"
        d="M4.5 1A1.5 1.5 0 0 1 6 2.5V4h4V2.5A1.5 1.5 0 0 1 11.5 1h2A1.5 1.5 0 0 1 15 2.5v11a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 13.5v-11C1 2.673 1.673 2 2.5 2h2z" />
    <path fill-rule="evenodd"
        d="M3 6.5A.5.5 0 0 1 3.5 6h9a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-6zM2.5 5A1.5 1.5 0 0 0 1 6.5v6A1.5 1.5 0 0 0 2.5 14h9a1.5 1.5 0 0 0 1.5-1.5v-6A1.5 1.5 0 0 0 11.5 5h-9z" />
</symbol>

        

        <symbol id="settings" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15.89 8.723l-1.34-.756a5.7 5.7 0 0 0-.854-.342c-.2-.081-.343-.264-.393-.48l-.24-1.053c-.042-.185-.167-.325-.33-.388a5.746 5.746 0 0 0-.696-.245l-.53-1.194c-.195-.44-.615-.717-1.09-.717h-2.457c-.474 0-.894.277-1.089.717l-.53 1.194c-.208.075-.42.14-.635.197-.163.062-.288.202-.33.388l-.24 1.053c-.05.215-.193.398-.393.48a5.7 5.7 0 0 0-.854.342l-1.34.756c-.321.181-.532.524-.532.91v1.492c0 .387.211.729.532.91l1.34.756a5.746 5.746 0 0 0 .854.342c.2.081.343.264.393.48l.24 1.053c.042.185.167.325.33.388a5.746 5.746 0 0 0 .696.245l.53 1.194c.195.44.615.717 1.089.717h2.457c.474 0 .894-.277 1.089-.717l.53-1.194c.208-.075.42-.14.635-.197.163-.062.288-.202.33-.388l.24-1.053c.05-.215.193-.398.393-.48.31-.125.623-.266.854-.342l1.34-.756c.321-.181.532-.524.532-.91V9.633c0-.386-.211-.729-.532-.91zM8 10.99a2.99 2.99 0 1 0 0-5.98 2.99 2.99 0 0 0 0 5.98z" />
        </symbol>

        <symbol id="item-owned" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 10.99a2.99 2.99 0 1 0 0-5.98 2.99 2.99 0 0 0 0 5.98z" />
        </symbol>

        <symbol id="request-approval" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 16a2 2 0 0 1-2-2h4a2 2 0 0 1-2 2zm6-5.5V7c0-3.128-2.124-5.812-5-6.555V0h-2v.445C4.124 1.188 2 3.872 2 7v3.5L.293 13.207a1 1 0 0 0-.293.707V15a1 1 0 0 0 1 1h13a1 1 0 0 0 1-1v-1.086a1 1 0 0 0-.293-.707L14 9.5zm-2.819.994a3.505 3.505 0 0 1-2.357 1.398 1.5 1.5 0 0 0-2.648 0 3.506 3.506 0 0 1-2.357-1.398l-.134-.186C2.33 9.752 2 8.9 2 8V7c0-2.82 2.239-5 5-5s5 2.18 5 5v1c0 .9-.329 1.753-.919 2.494l-.134.186z" />
        </symbol>

        <symbol id="home" viewBox="0 0 16 16">
            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
        </symbol>
        <symbol id="speedometer2" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
        </symbol>
        <symbol id="table" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
        </symbol>
        <symbol id="people-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </symbol>
        <symbol id="grid" viewBox="0 0 16 16">
            <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
        </symbol>
        <symbol id="notification" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M8 1a1.5 1.5 0 0 1 1.355.868c.204.49.545.937.997 1.29.724.517 1.64.843 2.648.843s1.924-.326 2.648-.843a2.815 2.815 0 0 1 1.997-3.157V3.5A3.5 3.5 0 0 0 11.5 7v4.346c0 .28.055.556.16.815a3.501 3.501 0 0 0-1.223 1.69l-.167.71a1 1 0 0 1-1.94-.001l-.167-.71a3.501 3.501 0 0 0-1.223-1.69.5.5 0 0 1 .32-.946 2.501 2.501 0 0 1 1.101 1.208l.167.71a.999.999 0 0 1-1.94.001l-.167-.71a2.501 2.501 0 0 1 1.101-1.208.5.5 0 0 1 .32.946 3.501 3.501 0 0 0-1.223 1.69L7 11.314V7A3.5 3.5 0 0 0 4.5 3.5v-.782a2.815 2.815 0 0 1 1.997 3.157 1 1 0 0 1-.354.79A4.501 4.501 0 0 0 8 14c-.464 0-.909-.072-1.33-.207a.5.5 0 1 1 .264-.964c.36.12.748.207 1.066.207a3.501 3.501 0 0 0 3.5-3.5V7A1.5 1.5 0 0 1 8 5.5V1z"/>
</symbol>




    </svg>

    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top" aria-label="Second navbar example">
        &nbsp;&nbsp;&nbsp;&nbsp;

        <div class="d-flex">
            <button class="btn btn-outline-secondary" type="button" onclick="toggleSidebar()">
                <span class="navbar-toggler-icon"></span>
            </button>
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        </div>
        <a class="navbar-brand" href="home.php">I S H A R E</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarsExample02">
            <form role="search" class="w-50">
                <div class="input-group">
                    <input class="form-control rounded-0" type="search" placeholder="Search" aria-label="Search" style="background-color: white;">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary rounded-0" type="button" style="border-color: black; background-color: white;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </nav>

    <main>
        <div class="sidebar" id="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="home.php" class="nav-link py-3 border-bottom rounded-0" aria-current="page" title="Home" data-bs-toggle="tooltip" data-bs-placement="right">
                        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Home">
                            <use xlink:href="#home" />
                        </svg>


                        <span class="nav-text">Home</span>
                    </a>
                </li>
                <li>
    <a href="#" class="nav-link py-3 border-bottom rounded-0" title="Notifications" data-bs-toggle="tooltip" data-bs-placement="right">
        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Notifications">
            <use xlink:href="#notification" />
        </svg>
        <span class="nav-text">Notifications</span>
    </a>
</li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom rounded-0" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
                        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Dashboard">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="finditem.php" class="nav-link py-3 border-bottom rounded-0" title="Orders" data-bs-toggle="tooltip" data-bs-placement="right">
                        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Orders">
                            <use xlink:href="#table" />
                        </svg>
                        <span class="nav-text">Find Items</span>
                    </a>
                </li>
                <li>
    <a href="additem.php" class="nav-link py-3 border-bottom rounded-0" title="Inventory" data-bs-toggle="tooltip" data-bs-placement="right">
        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Inventory">
            <use xlink:href="#inventory" />
        </svg>
        <span class="nav-text">Inventory</span>
    </a>
</li>


                <li>
                    <a href="request.php" class="nav-link py-3 border-bottom rounded-0" title="Request Approval" data-bs-toggle="tooltip" data-bs-placement="right">
                        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Request Approval">
                            <use xlink:href="#request-approval" />
                        </svg>
                        <span class="nav-text">Request Approval</span>
                    </a>
                </li>
                <li>
                    <a href="profile.php" class="nav-link py-3 border-bottom rounded-0" title="Customers" data-bs-toggle="tooltip" data-bs-placement="right">
                        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers">
                            <use xlink:href="#people-circle" />
                        </svg>
                        <span class="nav-text">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom rounded-0" title="Settings" data-bs-toggle="tooltip" data-bs-placement="right">
                        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Settings">
                            <use xlink:href="#settings" />
                        </svg>
                        <span class="nav-text">Settings</span>
                    </a>
                </li>

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
                    collapseSidebar();
                }
            }
        });
    </script>








    <br><br>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>