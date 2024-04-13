<?php
include "nav.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests Page</title>
</head>

<body>

    <div class="page-content" id="content">
        <h1 class="text-center mb-4 mt-3"><i class="bi-card-checklist"></i> REQUEST APPROVAL</h1>
        <div class="container mt-5">
            <?php
            $query = "SELECT r.*, i.userID AS itemUserID, i.itemName FROM Request r JOIN item i ON r.itemID = i.itemID ORDER BY r.itemID";
            $result = $conn->query($query);
            if ($result->num_rows == 0) {
            ?>
                <div class="no-requests" id="no-requests">
                    <div class="row justify-content-center">
                        <div class="col d-flex justify-content-center">
                            <div class="card w-75 mb-3 border-0">
                                <div class="card-body">
                                    <h1 class="card-title text-center">No Requests</h1>
                                    <p class="card-text text-center text-secondary">
                                        There are no incoming requests at the moment.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Item ID</th>
                                <th>Item Name</th>
                                <th>User ID</th>
                                <th>Date Requested</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $row['itemID']; ?></td>
                                    <td><?php echo $row['itemName']; ?></td>
                                    <td><?php echo $row['itemUserID']; ?></td>
                                    <td><?php echo $row['request_DateTime']; ?></td>
                                    <td>
                                        <button class="btn btn-success">Accept</button>
                                        <button class="btn btn-danger">Decline</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-arrow-up"></i> Pending Requests</h5>
                    </div>
                    <div class="card-body">
                        <!-- Pending Requests Content Goes Here -->
                        <p>No pending requests at the moment.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-arrow-up"></i> Successful Requests</h5>
                    </div>
                    <div class="card-body">
                        <!-- Sucessful Requests Content Goes Here -->
                        <p>No successful requests at the moment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Bootstrap Bundle with Popper -->
</body>

</html>