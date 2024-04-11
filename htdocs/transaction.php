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
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
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
        <?php include 'additem.css'; ?>

        .transaction-card {
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
    </style>
</head>

<body>
    <div class="page-content" id="content">
        <div class="container">
            <h1 class="mt-5 mb-4">Transactions</h1>
            <div class="row row-cols-1 row-cols-md-6 g-6">
                <?php
                $user_id = $user_id;
                $query = "SELECT r.*, i.* FROM Request r JOIN item i ON r.itemID = i.itemID WHERE r.userID = $user_id";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
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
                } else {
                    echo '<div class="col">
                  <div class="card h-100 shadow">
                      <div class="card-body text-center">
                          <h5 class="card-title mb-3">No transactions found</h5>
                          <p class="card-text">It seems you haven\'t made any transactions yet. Start exploring and engaging with items in our community!</p>
                      </div>
                  </div>
              </div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>