<?php 
include "./1db.php";
include "./adminnav.php";
?>

<!-- Php  Function Scripts -->
<? 
// Get all user from the mysql
$sqlUser = "SELECT COUNT(*) as total_users FROM user";
$resultUsers = $conn->query($sqlUser);

if($resultUsers ->num_rows> 0) {

    while($rowUser = $resultUsers->fetch_assoc()) {
        
        $allUsers = intval($rowUser['total_users']);
    }
} else {
    echo 'Users cannot be found';
    exit;
}

// get all Items of all users
$sqlItems = "SELECT COUNT(*) as total_items FROM item";
$resultItems =  $conn->query($sqlItems);

// Run the process
if($resultItems ->num_rows > 0) {
    while($rowItem = $resultItems->fetch_assoc()) {
        $allItems = intval($rowItem['total_items']);
    }
} else {
    echo 'Items cannot be found';
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <style>
        body {
            background-color: #f5f5f5;
        }

        #dropdownMenuButton.dropdown-toggle::after {
            display: none;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card-body {
            padding: 1.5rem;
        }


        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }

        .card-body .table-container {
            max-height: 200px;
            overflow-y: auto;
        }

        .card-body:not(:hover) .table-container {
            max-height: 200px;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
    </style>
</head>

<body>
    <main>
        <div class="page-content" id="content">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <!-- This is a temporary solution for Proper Placement in settings icon -->
                    </div>
                    <div class="col-9 d-flex justify-content-end">
                        <div class="dropdown">
                            <button class="btn border-0 text-dark p-0 mb-3 dropdown-toggle" type="button" style="font-size: 1.3rem;" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="/htdocs/admin/ad_help.php">Help</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="logout.php">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-primary p-3" style="border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-people me-1"></i>Residents</h5>
                                <p class="card-text"><?  echo $allUsers; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-success p-3" style="border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-box-seam me-1"></i>Items</h5>
                                <p class="card-text"><? echo $allItems; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title mb-0">Residents</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-container">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th> </th>
                                                <th>Name</th>
                                                <th>Verification</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <? 
                                    // Get the total users who's verified or not
                                    $sqlUser = "SELECT * FROM user ORDER BY status DESC";
                                    $result = $conn->query($sqlUser);

                                    if ($result->num_rows > 0) {
                                        $rowVerifiedNumber = 1;
                                        while ($rowUser = $result->fetch_assoc()) {
                                                $name = $rowUser['firstName'] . ' ' . $rowUser['lastName'];
                                                $status = $rowUser['status'];

                                                if ($status == 'Unverified' || $status == null) {
                                                    $statusClass = 'badge text-bg-danger rounded-pill';
                                                    $statusText = 'Unverified';
                                                } else {
                                                    $statusClass = 'badge text-bg-primary rounded-pill';
                                                    $statusText = 'Verified';
                                                }

                                                echo "<tr>";
                                                echo "<td>$rowVerifiedNumber</td>";
                                                echo "<td>$name</td>";
                                                echo "<td><span class='$statusClass'>$statusText</span></td>";
                                                echo "</tr>";
                                                $rowVerifiedNumber++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='2'>No users found.</td></tr>";
                                        }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title mb-0">Items</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-container">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Item</th>
                                                <th>Owner</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <? 
                                        // Prepare the sql statement to get the total items who's owned by users
                                            $sqlItems = "SELECT * FROM item join user on item.UserID = user.UserID  ORDER BY firstName";
                                            $result = $conn->query($sqlItems);

                                            if($result->num_rows > 0){
                                                $rowItemNumber = 1;
                                                while($rowItem = $result->fetch_assoc()){
                                                    $itemName = $rowItem['itemName'];
                                                    $itemOwner = $rowItem['firstName'] . ' ' . $rowItem['lastName'];

                                                echo "<tr>";
                                                echo "<td>$rowItemNumber</td>";
                                                echo "<td>$itemName</td>";
                                                echo "<td>$itemOwner</td>";
                                                echo "</tr>";
                                                $rowItemNumber++;
                                                }
                                            }
                                    
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title mb-0">Most Contributes</h2>
                            </div>
                            <div class="card-body">
                            <div class="table-container">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th> </th>
                                            <th>Name</th>
                                            <th class='text-center' >Owned Items</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <? 
                                    // Prepare the sql statement to get the total items of the users
                                    $sql = "SELECT u.firstName, u.lastName, COUNT(i.userID) AS total_items
                                    FROM user u
                                    LEFT JOIN item i ON u.userID = i.userID
                                    GROUP BY u.firstName, u.lastName
                                    ORDER BY total_items DESC";

                                    $resultTotal = $conn->query($sql);

                                    // Loop through the results and print each row
                                    if ($resultTotal->num_rows > 0) {
                                        $rowTotalItemUser = 1;

                                        while($Resident = $resultTotal->fetch_assoc()) {

                                            $residentName = $Resident['firstName'] . ' ' . $Resident['lastName'];
                                            $residentTotalItems = $Resident['total_items'];

                                            echo "<tr>";
                                            echo "<td>$rowTotalItemUser</td>";
                                            echo "<td>$residentName</td>";
                                            echo "<td class='text-center'>$residentTotalItems</td>";
                                            echo "</tr>";
                                            $rowTotalItemUser++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No data available</td></tr>";
                                    }
                                     ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title mb-0">Top Items</h2>
                            </div>
                            <div class="card-body">
                            <div class="table-container">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Buy</th>
                                            <th>Borrow</th>
                                            <th>Bartered</th>
                                            <th>Total</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <? 
                                    // Get the total times the items been barter,buyed, borrowed and it's total
                                    $sql = "SELECT 
                                    i.itemName,
                                    (SELECT COUNT(*) FROM barter b WHERE b.item1 = i.itemID OR b.item2 = i.itemID OR b.item3 = i.itemID) AS total_barters,
                                    (SELECT COUNT(*) FROM borrow bo WHERE bo.item1 = i.itemID) AS total_borrows,
                                    (SELECT COUNT(*) FROM buy bu WHERE bu.item1 = i.itemID) AS total_buys,
                                    (SELECT COUNT(*) FROM barter b WHERE b.item1 = i.itemID OR b.item2 = i.itemID OR b.item3 = i.itemID) +
                                    (SELECT COUNT(*) FROM borrow bo WHERE bo.item1 = i.itemID) +
                                    (SELECT COUNT(*) FROM buy bu WHERE bu.item1 = i.itemID) AS total_overall FROM item i
                                    ORDER BY total_overall DESC";

                                    $resultAllItem = $conn->query($sql);
                                      
                                    // Loop this abomination that even the programmer made out of pure hypothesis and high asf of pure rugby
                                    if($resultAllItem ->num_rows > 0){
                                        while($rowTotal = $resultAllItem-> fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td>" . $rowTotal["itemName"] . "</td>";
                                            echo "<td>" . $rowTotal["total_barters"] . "</td>";
                                            echo "<td>" . $rowTotal["total_borrows"] . "</td>";
                                            echo "<td>" . $rowTotal["total_buys"] . "</td>";
                                            echo "<td>" . $rowTotal["total_overall"] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No Items Available</td></tr>";
                                    }                                          
                                    ?>
                                    </tbody>
                                </table>
                            </div> 
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title mb-0">Highest rating residents</h2>
                            </div>
                            <div class="card-body">
                            <div class="table-container">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th> </th>
                                            <th>Name</th>
                                            <th>Rating</th>
                                            <th># of User Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // Calculate the Values needed in the sql
                                        $sql = "SELECT u.userID, 
                                                CONCAT(u.firstName, ' ', u.lastName) AS FullName, 
                                                COALESCE(AVG(ur.userRate), 'No Rating') AS AverageRating,
                                                COUNT(ur.userRate) AS NumberOfRatings
                                            FROM user u
                                            LEFT JOIN userRating ur ON u.userID = ur.reportedID
                                            GROUP BY u.userID
                                            ORDER BY AverageRating";

                                        // Run the sql
                                        $resultRating = $conn->query($sql);

                                        if ($resultRating->num_rows > 0) {
                                            $rowRatingNumber = 1;
                                        // do the loop
                                            while($rowRating = $resultRating->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td> $rowRatingNumber </td>";
                                                echo "<td>" . $rowRating["FullName"] . "</td>";
                                                echo "<td>" . (is_numeric($rowRating["AverageRating"]) ? number_format($rowRating["AverageRating"], 2) : $rowRating["AverageRating"]) . "</td>";                                                echo "<td>" . $rowRating["NumberOfRatings"] . "</td>";
                                                echo "</tr>";
                                                $rowRatingNumber++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'>No data available</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    <footer>
        <!-- place footer here -->
    </footer>
<script>
                function performSearch() {
                    var searchInput = document.getElementById('searchInput');
                    var searchTerm = searchInput.value.trim();

                    if (searchTerm !== '') {
                        window.location.href = 'finditem.php?search_term=' + encodeURIComponent(searchTerm);
                    }
                }
</script>

</body>

</html>