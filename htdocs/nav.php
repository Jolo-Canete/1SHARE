<?php
include "upper.php";
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
    ?>
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
            <div class="media d-flex align-items-center"><img src="<?php echo !empty($itemImage_path) ? 'picture/' . $itemImage_path : 'picture/' . getUserProfilePicPaths($user_id); ?>" alt="..." style="width: 60px; height: 60px;" class="mr-3 rounded-circle img-thumbnail shadow-sm">
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
                <a href="dashboard.php" class="nav-link text-light font-italic"> <i class="bi bi-speedometer2 text-light fa-fw"></i>Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="settings.php" class="nav-link text-light font-italic"> <i class="bi bi-gear text-light fa-fw"></i>Settings</a>
            </li>
            <li class="nav-item">
                <a href="itemreview.php" class="nav-link text-light font-italic"> <i class="bi bi-gear text-light fa-fw"></i>Review</a>
            </li>
        </ul>
    </div>

    <!-- End vertical navbar -->

    <main>
        <!-- Page content holder -->
        <div class="page-content" id="content">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <Div><a class="h4 text-light link-offset-2 link-underline link-underline-opacity-0" href="home.php">

                            <img src="picture/logo.png" alt="I S H A R E logo" style="width: 50px; height: 40px;">
                            I S H A R E</Div>
                    </a>
                    <button id="sidebarCollapse" type="button" class="btn btn-outline-secondary shadow-sm px-4 me-3"><i class="fa fa-bars mr-2"></i></button>
                    <script>
                        $(function() {
                            // Sidebar toggle behavior
                            $("#sidebarCollapse").on("click", function() {
                                $("#sidebar, #content").toggleClass("active");
                            });
                        });
                    </script>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <a id="clam" class="navbar-brand" href="finditem.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16" style="margin-bottom: 3px;">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                            </svg>
                            Find Items
                        </a>
                        <form role="search" class="w-50 d-flex" action="finditem.php" method="GET">
                            <div class="input-group">
                                <input class="form-control rounded-0" type="search" placeholder="Search" aria-label="Search" id="searchInput" name="search_term">
                                <div class="input-group-append">
                                    <button class="btn rounded-0" type="button" style="background-color: #212529; border-color: white;" onclick="performSearch()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    function performSearch() {
                        var searchInput = document.getElementById('searchInput');
                        var searchTerm = searchInput.value.trim();

                        if (searchTerm !== '') {
                            window.location.href = 'finditem.php?search_term=' + encodeURIComponent(searchTerm);
                        }
                    }
                </script>

                <div class="collapse navbar-collapse justify-content-end" id="navbarsExample02">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="padding: 10px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <button type="button" class="btn text-white position-relative d-flex align-items-center">
                                    <i class="fas fa-bell fs-5"></i>
                                    <?php

                                    // Check if the user is logged in
                                    if (!isset($_SESSION['user_id'])) {
                                        // If the user is not logged in, redirect them to the login page
                                        header("Location: login.php");
                                        exit;
                                    }

                                    // If the user is logged in, retrieve their information from the session
                                    $logged_in_user_id = $_SESSION['user_id'];

                                    // Query to get the count of requests with null dismiss attribute for the logged-in user
                                    $request_count_query = "SELECT COUNT(*) as request_count 
                        FROM Request r
                        JOIN item i ON r.itemID = i.itemID
                        WHERE r.userID = $logged_in_user_id 
                        AND i.userID != $logged_in_user_id
                        AND r.status != 'pending'
                        AND r.dismiss IS NULL";
                                    $request_count_result = mysqli_query($conn, $request_count_query);

                                    if ($request_count_result === false) {
                                        echo "Error executing request_count_query: " . mysqli_error($conn);
                                    } else {
                                        $request_count_row = mysqli_fetch_assoc($request_count_result);
                                        $request_count = ($request_count_row) ? $request_count_row['request_count'] : 0;
                                    }


                                    $item_count_query = "SELECT COUNT(*) as item_count
                     FROM Request r
                     JOIN item i ON r.itemID = i.itemID
                     WHERE r.incomingDismiss IS NULL
                     AND r.userID != $logged_in_user_id
                     AND i.userID = $logged_in_user_id";
                                    $item_count_result = mysqli_query($conn, $item_count_query);

                                    if ($item_count_result === false) {
                                        echo "Error executing item_count_query: " . mysqli_error($conn);
                                    } else {
                                        $item_count_row = mysqli_fetch_assoc($item_count_result);
                                        $item_count = ($item_count_row) ? $item_count_row['item_count'] : 0;
                                    }

                                    // Calculate the total unread messages count
                                    $total_unread_count = $request_count + $item_count;
                                    ?>


                                    <!-- Display the unread messages count -->
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="<?php echo $total_unread_count == 0 ? 'display: none;' : ''; ?>">
                                        <?php echo ($total_unread_count > 0) ? $total_unread_count : ''; ?>
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="#" style="padding: 14px;" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-gear-fill me-2" viewBox="0 0 16 16">
                                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.86z" />
                                </svg>
                            </a>
                            <div class="dropdown">
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark rounded-3 p-2 shadow w-220px">
                                    <li><a class="dropdown-item rounded-2" href="#">Help</a></li>
                                    <li><a class="dropdown-item rounded-2" href="settings.php">Settings</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item rounded-2 text-danger" href="?logout=true">Log Out</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
        </div>
        </div>
        </div>
        </nav>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<br><br>