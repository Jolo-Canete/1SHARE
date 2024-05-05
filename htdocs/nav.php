<?php
include "upper.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect them to the login page
    echo "<script>window.location.href = 'login.php';</script>";
    exit;
}

// If the user is logged in, retrieve their information from the session
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];

// Prepare and bind the parameter
$stmt = $conn->prepare("SELECT * FROM user WHERE userID = ?");
$stmt->bind_param("i", $user_id);


// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();

    // Access the columns
    $username = $row['username'];
    $Imagge = $row['userImage_path'];

    // Access other columns as needed

    // Check status and redirect if necessary
    $status = $row['status']; // Assuming status column contains the user status
    if ($status == 'ban') {
        // JavaScript redirection to ban.php
        echo "<script>window.location.href = 'ban.php';</script>";
        exit(); // Make sure to exit after redirection
    } elseif ($status == 'Unverified') {
        // JavaScript redirection to wait.php
        echo "<script>window.location.href = 'wait.php';</script>";
        exit(); // Make sure to exit after redirection
    }

    // Proceed with other code if the user status is neither 'ban' nor 'Unverified'
} else {
    // Handle case where no user with the given userID is found
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>ISHARE</title>
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
    <?php
    include "nav.css";
    ?>@media (max-width: 768px) {
        #offcanvasRight {
            width: 70% !important;
            /* Adjust this value to your preference */
        }
    }
</style>

<body>
    <!-- Navbar content -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasRightLabel">Notifications</h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr>
        <div class="offcanvas-body" id="notificationContainer">
            <!-- Notifications will be dynamically added here -->
        </div>
        <script>
            $(document).ready(function() {
                // Function to fetch notifications
                function fetchNotifications() {
                    $.ajax({
                        type: 'GET',
                        url: 'notif.php',
                        success: function(response) {
                            $('#notificationContainer').html(response); // Update notifications section
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }

                // Call fetchNotifications function initially
                fetchNotifications();

                // Refresh notifications every 30 seconds
                setInterval(fetchNotifications, 30000); // Adjust time interval as needed
            });
        </script>
    </div>
    <!-- Vertical navbar -->
    <div class="vertical-nav bg-dark" id="sidebar">
        <div class="py-4 px-3">
            <br><br>
            <div class="media d-flex align-items-center"><img src="<?php echo !empty($Imagge) ? 'picture/' . $Imagge : 'picture/default.png'; ?>" alt="..." style="width: 60px; height: 60px;" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                <div class="media-body">
                    <h4 class="m-0 text-light">
                        <?php
                        $sql1 = "SELECT * FROM user WHERE userID = '$user_id'";
                        $result1 = $conn->query($sql1);
                        $user = $result1->fetch_assoc();
                        if ($user) {
                            echo '<h4 class="m-0 text-light">&nbsp;&nbsp;' . ucfirst($user['username']) . '</h4>';
                        } else {
                            echo '<h4 class="m-0 text-light">&nbsp;&nbsp;User not found</h4>';
                        }
                        ?></h4>
                    <p class="font-weight-light text-secondary mb-0">&nbsp;&nbsp; Resident</p>
                </div>
            </div>
        </div>
        <?php
        // PHP function to fetch logged-in user's profile picture path from the database
        function getUserProfilePicPaths($user_id)
        {
            global $conn; // Access the database connection

            // Prepare and execute query to fetch user's profile picture path
            $stmt = $conn->prepare("SELECT userImage_path FROM user WHERE userID = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->bind_result($userImage_path);
            $stmt->fetch();
            $stmt->close();

            // Return the profile picture path or a default path if not found
            return isset($userImage_path) ? $userImage_path : "picture/default.png";
        }
        ?>

        <ul class="nav flex-column bg-dark">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link text-light font-italic"> <i class="bi bi-speedometer2 text-light fa-fw"></i>Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="home.php" class="nav-link text-light font-italic"> <i class="bi bi-house-door text-light fa-fw"></i>Home</a>
            </li>
            <li class="nav-item">
                <a href="profile.php" class="nav-link text-light font-italic"> <i class="bi bi-person-circle text-light fa-fw"></i>Profile</a>
            </li>
            <li class="nav-item">
                <a href="additem.php" class="nav-link text-light font-italic"> <i class="bi bi-box text-light fa-fw"></i>Inventory</a>
            </li>
            <li class="nav-item nav-item-request">
                <a class="nav-link text-light font-italic d-flex align-items-center justify-content-between collapsed" data-bs-toggle="collapse" href="#transaction-collapse" aria-expanded="false">
                    <span> <i class="bi bi-arrow-repeat text-light fa-fw"></i>Transaction </span><i class="bi bi-chevron-down text-light" style="font-size: 1rem;"></i>
                </a>
                <div class="collapse" id="transaction-collapse">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="tranOngoing.php" class="nav-link text-light font-italic nav-collapse-item">
                                <i class="bi-clock-history" style="font-size: 1rem;"></i>Ongoing
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tranSuccessful.php" class="nav-link text-light font-italic nav-collapse-item">
                                <i class="bi-check-circle" style="font-size: 1rem;"></i>Successful
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tranCancel.php" class="nav-link text-light font-italic nav-collapse-item">
                                <i class="bi bi-x-circle" style="font-size: 1rem;"></i>Canceled
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tranFailed.php" class="nav-link text-light font-italic nav-collapse-item">
                                <i class="bi bi-clipboard-x" style="font-size: 1rem;"></i>Failed
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-item-request">
                <a class="nav-link text-light font-italic d-flex align-items-center justify-content-between collapsed" data-bs-toggle="collapse" href="#request-collapse" aria-expanded="false">
                    <span> <i class="bi bi-card-checklist text-light fa-fw"></i>Request </span><i class="bi bi-chevron-down text-light" style="font-size: 1rem;"></i>
                </a>
                <div class="collapse" id="request-collapse">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="incoming.php" class="nav-link text-light font-italic nav-collapse-item">
                                <i class="bi-box-arrow-down" style="font-size: 1rem;"></i>Incoming
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pending.php" class="nav-link text-light font-italic nav-collapse-item">
                                <i class="bi-clock-history" style="font-size: 1rem;"></i>Pending
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="successful.php" class="nav-link text-light font-italic nav-collapse-item">
                                <i class="bi-check-circle" style="font-size: 1rem;"></i>Successful
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="unsuccessful.php" class="nav-link text-light font-italic nav-collapse-item">
                                <i class="bi bi-x-circle" style="font-size: 1rem;"></i>Unsuccessful
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="cart.php" class="nav-link text-light font-italic"> <i class="bi-cart text-light fa-fw"></i>Cart</a>
            </li>
            <li class="nav-item">
                <a href="settings.php" class="nav-link text-light font-italic"> <i class="bi bi-gear text-light fa-fw"></i>Settings</a>
            </li>
        </ul>
    </div>

    <!-- End vertical navbar -->

    <main>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="d-flex flex-column">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <div class="container-fluid d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex align-items-center">
                            <!-- Original desktop version -->
                            <div class="desktop-only">
                                <a class="h6 text-light link-offset-2 link-underline link-underline-opacity-0" href="home.php">
                                    <img src="picture/logo.png" alt="I S H A R E logo" style="width: 30px; height: 40px;">
                                    I S H A R E
                                </a>
                            </div>
                            <!-- Mobile version -->
                            <div class="mobile-only">
                                <a class="h7 text-light link-offset-2 link-underline link-underline-opacity-0" href="home.php">
                                    I S H A R E
                                </a>
                            </div>


                            <!-- Original desktop version -->
                            <button id="sidebarCollapse" type="button" class="btn btn-outline-secondary shadow-sm px-2 me-2 ms-2 d-md-none">
                                <i class="fas fa-bars mr-1"></i> Sidebar
                            </button>

                            <div class="d-md-none">

                                <!-- Mobile version -->
                                <button id="sidebarCollapseMobile" type="button" class="btn btn-outline-secondary shadow-sm px-1 py-1 me-2 ms-2 d-none d-md-block">
                                    <i class="fas fa-bars"></i>
                                </button>

                            </div>

                            <script>
                                $(function() {
                                    // Sidebar toggle behavior for mobile
                                    $("#sidebarCollapseMobile").on("click", function() {
                                        $("#sidebar, #content").toggleClass("active");
                                    });
                                });
                            </script>





                            <div class="d-md-none">

                                <!-- Mobile version -->
                                <a id="clamMobile" class="btn btn-outline-secondary shadow-sm px-1 py-1 me-2 ms-2 d-none d-md-block" href="finditem.php">
                                    <i class=""></i> Find Items
                                </a>
                            </div>

                            <button id="sidebarCollapses" type="button" class="btn btn-outline-secondary shadow-sm px-3 me-2 ms-3 d-none d-md-block"><i class="fas fa-bars mr-1"></i>
                                <script>
                                    $(function() {
                                        // Sidebar toggle behavior
                                        $("#sidebarCollapses").on("click", function() {
                                            $("#sidebar, #content").toggleClass("active");
                                        });
                                    });
                                </script>
                            </button>

                            <a id="clam" class="btn btn-outline-secondary shadow-sm px-3 me-2 ms-5 d-none d-md-flex" href="finditem.php">
                                <i class="bi bi-shop"></i>&nbsp; Find Items
                            </a>
                        </div>

                        <div class="d-flex justify-content-center position-fixed w-50 py-3 d-none d-md-flex search-container" style="z-index: 10; left: 53%; transform: translateX(-50%);">
                            <form role="search" class="d-flex justify-content-center justify-content-md-start w-50" action="finditem.php" method="GET">
                                <div class="input-group w-100 w-md-auto">
                                    <input class="form-control rounded-0" type="search" placeholder="Search" aria-label="Search" id="searchInput" name="search_term">
                                    <div class="input-group-append">
                                        <button class="btn rounded-0" type="button" style="background-color: #212529; border-color: white;" onclick="performSearch()">
                                            <i class="bi bi-search text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="d-flex justify-content-end align-items-center">
                            <a class="nav-link" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <button type="button" class="btn text-white position-relative d-flex align-items-center">
                                    <i class="bi bi-bell-fill fs-6"></i>
                                    <?php
                                    include "notifcount.php";
                                    ?>
                                    <!-- Display the unread messages count -->
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="<?php echo $total_unread_count == 0 ? 'display: none;' : ''; ?>">
                                        <?php echo ($total_unread_count > 0) ? $total_unread_count : ''; ?>
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </button>
                            </a>

                            <div class="dropdown">
                                <a class="nav-link" data-bs-toggle="dropdown">
                                    <button type="button" class="btn text-white position-relative d-flex align-items-center">
                                        <i class="bi bi-gear-fill fs-6"></i>

                                    </button>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark rounded-3 p-2 shadow w-220px">
                                    <li><a class="dropdown-item rounded-2" href="help.php">Help</a></li>
                                    <li><a class="dropdown-item rounded-2" href="settings.php">Settings</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item rounded-2 text-danger" href="?logout=true">Log Out</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Mobile search bar -->
                        <div class="d-md-none position-relative mt-3 mt-md-0 w-100">
                            <form role="search" class="d-flex justify-content-center justify-content-md-start w-100" action="finditem.php" method="GET">
                                <div class="input-group w-100">
                                    <input class="form-control rounded-0" type="search" placeholder="Search" aria-label="Search" id="searchInput" name="search_term">
                                    <div class="input-group-append">
                                        <a href="#" onclick="performSearchs()" class="btn rounded-0 d-inline-block d-md-none" style="background-color: #212529; border-color: white;">
                                            <i class="bi bi-search text-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </nav>

                <script>
                    function performSearch() {
                        var searchInput = document.getElementById('searchInput');
                        var searchTerm = searchInput.value.trim();

                        if (searchTerm !== '') {
                            window.location.href = 'finditem.php?search_term=' + encodeURIComponent(searchTerm);
                        }
                    }
                </script>
                <script>
                    function performSearchs() {
                        var searchInput = document.getElementById('searchInput');
                        var searchTerm = searchInput.value.trim();

                        if (searchTerm !== '') {
                            window.location.href = 'finditem.php?search_term=' + encodeURIComponent(searchTerm);
                        }
                    }
                </script>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<br><br>
<div class="d-md-none">
    <br><br>
</div>