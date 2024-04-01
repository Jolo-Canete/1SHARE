<!doctype html>
<html lang="en">

<head>
    <title>testestest</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--- Bootstrap Icon --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

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

    .nav-link {
        display: flex;
        align-items: left;
        text-align: left;
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
        fill: #808080;
        transition: fill 0.3s ease-in-out;
    }

    /* for vertical navbar */

    .vertical-nav {
        min-width: 17rem;
        width: 17rem;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        box-shadow: 5px 0 5px rgba(0, 0, 0, 0.2);
        transition: all 0.4s;
    }

    .vertical-nav .nav-link i {
        font-size: 1.2rem;
        margin-right: 0.5rem;
    }

    .vertical-nav .nav-link {
        padding: 10px;
        margin-left: 10px;
        text-decoration: none;
        display: block;
        transition: all 0.3s ease-in-out;
    }

    .vertical-nav .nav-link:hover {
        background-color: #808080;
        padding-left: 15px;
        border-radius: 0.25rem;
        width: 250px;
    }

    .page-content {
        width: calc(100% - 17rem);
        margin-left: 17rem;
        transition: all 0.4s;
    }

    /* for toggle behavior */

    #sidebar.active {
        margin-left: -17rem;
    }

    #content.active {
        width: 100%;
        margin: 0;
    }

    @media (max-width: 768px) {
        #sidebar {
            margin-left: -17rem;
        }

        #sidebar.active {
            margin-left: 0;
        }

        #content {
            width: 100%;
            margin: 0;
        }

        #content.active {
            margin-left: 17rem;
            width: calc(100% - 17rem);
        }
    }
</style>

<body>
    <header>
        <!-- Vertical navbar -->
        <div class="vertical-nav bg-dark" id="sidebar">
            <div class="py-4 px-3">
                <div class="media d-flex align-items-center"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                    <div class="media-body">
                        <h4 class="m-0 text-light">&nbsp; Jolo A. Cañete</h4>
                        <p class="font-weight-light text-secondary mb-0">&nbsp; Resident</p>
                    </div>
                </div>
            </div>

            <ul class="nav flex-column bg-dark mb-0">
                <li class="nav-item">
                    <a href="home.php" class="nav-link text-light font-italic">
                        <i class="bi bi-house-door text-light fa-fw"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link text-light font-italic">
                        <i class="bi bi-person-circle text-light fa-fw"></i>
                        Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a href="finditem.php" class="nav-link text-light font-italic">
                        <i class="bi bi-search text-light fa-fw"></i>
                        Find Items
                    </a>
                </li>
                <li class="nav-item">
                    <a href="additem.php" class="nav-link text-light font-italic">
                        <i class="bi bi-box text-light fa-fw"></i>
                        Inventory
                    </a>
                </li>
                <li class="nav-item">
                    <a href="request.php" class="nav-link text-light font-italic">
                        <i class="bi-card-checklist text-light fa-fw"></i>
                        Request Approval
                    </a>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link text-light font-italic">
                        <i class="bi-cart text-light fa-fw"></i>
                        Cart
                    </a>
                </li>
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link text-light font-italic">
                        <i class="bi bi-speedometer2 text-light fa-fw"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="settings.php" class="nav-link text-light font-italic">
                        <i class="bi bi-gear text-light fa-fw"></i>
                        Settings
                    </a>
                </li>
            </ul>
        </div>
        <!-- End vertical navbar -->
    </header>

    <main>
        <!-- Page content holder -->
        <div class="page-content" id="content">
            <div class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
                <div class="d-flex">
                    <!-- Toggle button -->
                    &nbsp;<button id="sidebarCollapse" type="button" class="btn btn-outline-secondary shadow-sm px-4"><i class="fa fa-bars mr-2"></i></button>
                    <script>
                        $(function() {
                            // Sidebar toggle behavior
                            $("#sidebarCollapse").on("click", function() {
                                $("#sidebar, #content").toggleClass("active");
                            });
                        });
                    </script>
                </div>
                <a class="navbar-brand" href="home.php" style="margin-left: 50px;">
                    <img src="picture/logo.png" alt="I S H A R E logo" style="height: 30px; ">
                    I S H A R E
                </a>

                <div class="collapse navbar-collapse justify-content-left" id="navbarsExample02">
                    <form role="search" class="w-50 d-flex justify-content-end">
                        <div class="input-group">
                            <input class="form-control rounded-0" type="search" placeholder="Search" aria-label="Search" style="background-color: white;">
                            <div class="input-group-append">
                                <button class="btn rounded-0" type="button" style="border-color: #212529; background-color: white;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarsExample02">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="padding: 10px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                                    </svg>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-gear-fill me-2" viewBox="0 0 16 16">
                                        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.86z" />
                                    </svg>
                                </a>
                                <div class="dropdown">
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark rounded-3 p-2 shadow w-220px">
                                        <li><a class="dropdown-item rounded-2" href="#">Action</a></li>
                                        <li><a class="dropdown-item rounded-2" href="#">Another action</a></li>
                                        <li><a class="dropdown-item rounded-2" href="#">Something else here</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item rounded-2 text-danger" href="login.php">Log Out</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </main>

    <footer>
        <!-- place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>