<?php include "../1db.php"; ?>

<?
function countRows() {
    global $conn;

    // Count all rows for residents
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    $residents = mysqli_num_rows($result);

    // Count all rows for items
    $sql = "SELECT * FROM item";
    $result = mysqli_query($conn, $sql);
    $items = mysqli_num_rows($result);

    // Count all rows of user and check if the user is unverified or null
    $sql = "SELECT * FROM user WHERE status = 'Unverified' OR status = 'unverified' OR status IS NULL";    $result = mysqli_query($conn, $sql);
    $verify = mysqli_num_rows($result);

    // Count all rows for request
    $sql = "SELECT * FROM Request";
    $result = mysqli_query($conn, $sql);
    $requests = mysqli_num_rows($result);

    // Count all rows for userreport
    $sql = "SELECT * FROM userreport";
    $result = mysqli_query($conn, $sql);
    $userreport = mysqli_num_rows($result);

    // Count all rows for reportedItem
    $sql = "SELECT * FROM reportedItem";
    $result = mysqli_query($conn, $sql);
    $reportedItem = mysqli_num_rows($result);

    // Add the total value of reportedITem and userreport
    $totalReport = $userreport + $reportedItem;

    // Return the counts
    return compact('residents', 'items', 'verify', 'requests', 'userreport', 'reportedItem', 'totalReport');
}

// Call the function
$counts = countRows();
?>



<!DOCTYPE html>
<html lang="en">

<head>
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
    include "./adminnav.css";
    ?>
</style>

<body>
    
<!-- Vertical Navbar -->
<div class="vertical-nav bg-dark" id="sidebar">
    <div class="py-4 px-3">
        <div class="media d-flex align-items-center">
        <img src="../picture/default_admin.png" alt="..." style="width: 65px; height: 65px;" class="mr-3 rounded-circle img-thumbnail shadow-sm">
            <div class="media-body">
                <h4 class="m-0 text-light ms-3">Admin</h4>
            </div>
        </div>
    </div>
    <ul class="nav flex-column bg-dark">
        <li class="nav-item">
            <a href="ad_dashboard.php" class="nav-link text-light font-italic d-flex align-items-center justify-content-between">
                <span><i class="bi bi-speedometer2 text-light fa-fw"></i>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="ad_residents.php" class="nav-link text-light font-italic d-flex align-items-center justify-content-between">
                <span><i class="bi bi-people text-light fa-fw"></i>Residents</span>
                <?php 
                    if($counts['residents'] > 0){

                        echo '<span class="badge rounded-pill bg-danger" style="font-size: 0.8rem; padding: 0.3rem 0.6rem;">'.$counts['residents'].'</span>';
                    } else{
                        echo '';
                    }          
                ?>
            </a>
        </li>
        <li class="nav-item">
            <a href="ad_items.php" class="nav-link text-light font-italic d-flex align-items-center justify-content-between">
                <span><i class="bi bi-box-seam text-light fa-fw"></i>Items</span>
                <?php 
                    if($counts['items'] > 0){

                        echo '<span class="badge rounded-pill bg-danger" style="font-size: 0.8rem; padding: 0.3rem 0.6rem;">'.$counts['items'].'</span>';
                    } else{
                        echo '';
                    }          
                ?>
            </a>
        </li>
        <li class="nav-item">
            <a href="ad_verify.php" class="nav-link text-light font-italic d-flex align-items-center justify-content-between">
                <span><i class="bi bi-person-check text-light fa-fw"></i>Verify</span>
                <?php 
                    if($counts['verify'] > 0){

                        echo '<span class="badge rounded-pill bg-danger" style="font-size: 0.8rem; padding: 0.3rem 0.6rem;">'.$counts['verify'].'</span>';
                    } else{
                        echo '';
                    }          
                ?>
            </a>
        </li>
        <li class="nav-item">
            <a href="ad_transaction.php" class="nav-link text-light font-italic d-flex align-items-center justify-content-between">
                <span><i class="bi bi-arrow-repeat text-light fa-fw"></i>Transactions</span>
                <?php 
                    if($counts['requests'] > 0){

                        echo '<span class="badge rounded-pill bg-danger" style="font-size: 0.8rem; padding: 0.3rem 0.6rem;">'.$counts['requests'] .'</span>';
                    } else{
                        echo '';
                    }          
                ?>
            </a>
        </li>
        <li class="nav-item nav-item-request">
            <a class="nav-link text-light font-italic d-flex align-items-center justify-content-between collapsed" data-bs-toggle="collapse" href="#report-collapse" aria-expanded="true">
                <span><i class="bi bi-flag text-light fa-fw"></i>Report</span>
                <?php 
                    if($counts['totalReport']  > 0){

                        echo '<span class="badge rounded-pill bg-danger" style="font-size: 0.8rem; padding: 0.3rem 0.6rem;">'.$counts['totalReport'].'</span>';
                    } else{
                        echo '';
                    }          
                ?>
            </a>
            <div class="collapse" id="report-collapse">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="ad_userReport.php" class="nav-link text-light font-italic nav-collapse-item d-flex align-items-center">
                            <i class="bi bi-file-earmark-person" style="font-size: 1rem;"></i>
                            <span class="me-auto">Resident Report</span>

                            <?php 
                    if($counts['userreport'] > 0){

                        echo '<span class="badge rounded-pill bg-danger" style="font-size: 0.8rem; padding: 0.3rem 0.6rem;">'.$counts['userreport'].'</span>';
                    } else{
                        echo '';
                    }          
                      ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ad_itemReport.php" class="nav-link text-light font-italic nav-collapse-item d-flex align-items-center justify-content-between">
                            <span><i class="bi bi-patch-exclamation" style="font-size: 1rem;"></i>Item Report</span>
                            <?php 
                                if($counts['reportedItem'] > 0){

                                    echo '<span class="badge rounded-pill bg-danger" style="font-size: 0.8rem; padding: 0.3rem 0.6rem;">'.$counts['reportedItem'].'</span>';
                                } else{
                                    echo '';
                                }          
                            ?>
                        </a>
                    </li>
                </ul>
            </div>
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