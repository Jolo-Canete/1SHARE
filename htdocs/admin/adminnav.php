<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Navigation</title>
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
    include "admin/adminnav.css";
    ?>
</style>

<body>
    <!-- Vertical Navbar -->
    <div class="vertical-nav bg-dark" id="sidebar">
        <div class="py-4 px-3">
            <div class="media d-flex align-items-center"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." style="width: 60px; height: 60px;" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                <div class="media-body">
                    <h4 class="m-0 text-light ms-3">SK Pororo</h4>
                    <p class="font-weight-light text-secondary mb-0">&nbsp;&nbsp; Admin</p>
                </div>
            </div>
        </div>
        <ul class="nav flex-column bg-dark">
        <li class="nav-item">
                <a href="ad_dashboard.php" class="nav-link text-light font-italic"> <i class="bi bi-speedometer2 text-light fa-fw"></i>Dashboard
                <span class="badge rounded-pill bg-danger" style="margin-left: 4.6rem;">2<span class="visually-hidden">unread notifications</span>
            </a>
            </li>
            <li class="nav-item">
                <a href="ad_residents.php" class="nav-link text-light font-italic"> <i class="bi bi-people text-light fa-fw"></i>Residents 
                <span class="badge rounded-pill bg-danger" style="margin-left: 5.1rem;">2<span class="visually-hidden">unread notifications</span>
            </a>
            </li>
            <li class="nav-item">
                <a href="ad_items.php" class="nav-link text-light font-italic"> <i class="bi bi-box-seam text-light fa-fw"></i>Items
                <span class="badge rounded-pill bg-danger" style="margin-left: 6.9rem;">2<span class="visually-hidden">unread notifications</span></a>
            </li>
            <li class="nav-item">
                <a href="ad_verify.php" class="nav-link text-light font-italic"> <i class="bi bi-person-check text-light fa-fw"></i>Verify
                <span class="badge rounded-pill bg-danger" style="margin-left: 6.9rem;">99+<span class="visually-hidden">unread notifications</span></a>
            </li>
            <li class="nav-item nav-item-request">
                <a class="nav-link text-light font-italic d-flex align-items-center justify-content-between collapsed" data-bs-toggle="collapse" href="#report-collapse" aria-expanded="true">
                    <span> <i class="bi bi-flag text-light fa-fw"></i>Report <span class="badge rounded-pill bg-danger" style="margin-left: 6.5rem;">4<span class="visually-hidden">unread notifications</span></span>
                </a>
                <div class="collapse" id="report-collapse">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="ad_userReport.php" class="nav-link text-light font-italic nav-collapse-item">
                                <i class="bi bi-file-earmark-person" style="font-size: 1rem;"></i>User Report
                                <span class="badge rounded-pill bg-danger" style="margin-left: 3.6rem;">2<span class="visually-hidden">unread notifications</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="ad_itemReport.php" class="nav-link text-light font-italic nav-collapse-item">
                                <i class="bi bi-patch-exclamation" style="font-size: 1rem;"></i>Item Report
                                <span class="badge rounded-pill bg-danger" style="margin-left: 3.6rem;">2<span class="visually-hidden">unread notifications</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="ad_settings.php" class="nav-link text-light font-italic"> <i class="bi bi-gear text-light fa-fw"></i>Settings
                <span class="badge rounded-pill bg-danger" style="margin-left: 5.9rem;">2<span class="visually-hidden">unread notifications</span>
            </a>
            </li>
        </ul>
    </div>

    <!-- End vertical navbar -->

    <main>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<br><br>