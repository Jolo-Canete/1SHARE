<?php include 'nav.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Transactions</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f4f4f4;
            margin-top: 0;
            padding: 0;
        }

        .transaction-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        <?php include 'additem.css'; ?>.transaction-card {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .transaction-card p {
            margin: 5px 0;
        }

        .transaction-card img {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 10px;
        }

        .no-transaction {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .no-transaction .card {
            box-shadow: none;
            border: none;
        }

        .no-transaction .card-title {
            margin-top: 0;
            font-size: 24px;
        }

        .no-transaction .card-text {
            margin-bottom: 10px;
        }

        .no-transaction .btn {
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="page-content" id="content">
        <div class="container">
            <h1 class="text-center mb-4 mt-3"><i class="bi bi-arrow-repeat"></i> TRANSACTIONS</h1>
            <div class="container my-5">
                <?php
                $user_id = $user_id;
                $query = "SELECT r.*, i.* FROM Request r JOIN item i ON r.itemID = i.itemID WHERE r.userID = $user_id";
                $result = $conn->query($query);
                if ($result->num_rows == 0) {
                ?>
                    <div class="no-transaction" id="no-transaction">
                        <div class="row justify-content-center">
                            <div class="col d-flex justify-content-center">
                                <div class="card w-75 mb-3 border-0">
                                    <div class="card-body">
                                        <h1 class="card-title text-center">No Transactions</h1>
                                        <p class="card-text text-center text-secondary">
                                            It seems you have not made any transactions yet. Start exploring and engaging with items in our community!
                                        </p>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <a href="finditem.php" class="btn btn-outline-dark me-md-2" type="button">Find Items</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="row row-cols-1 row-cols-md-6 g-6">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="col">
                                <div class="card" data-bs-toggle="modal" data-bs-target="#itemDetailModal" onclick="populateModal('<?php echo $row['itemName']; ?>', '<?php echo $row['itemImage_path']; ?>', '<?php echo $row['status']; ?>', '<?php echo $row['requestType']; ?>')">
                                    <img src="pictures/<?php echo $row['itemImage_path']; ?>" class="card-img-top" alt="<?php echo $row['itemName']; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['itemName']; ?></h5>
                                        <p class="text-start text-secondary">
                                            <?php
                                            $status = $row['status'];
                                            $badgeColor = ($status == 'Pending') ? 'bg-warning -subtle text-dark -emphasis' : (($status == 'Approved') ? 'bg-success -subtle text-light -emphasis' : 'bg-danger -subtle text-light -emphasis');
                                            echo "<span class='badge $badgeColor rounded-pill'>$status</span>";
                                            ?>
                                        </p>
                                        <p class="text-start text-secondary"><b>Request Type:</b> <?php echo $row['RequestType']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
</body>

</html>