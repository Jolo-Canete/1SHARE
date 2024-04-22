<?php
include "nav.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests Page</title>

    <style>
        <?php
        include "additem.css";
        ?>
        
        .table-hover tbody tr.table-row:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .table-row {
            transition: background-color 0.3s ease;
        }

        .table-wrapper {
            width: 103%;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table thead th,
        td {
            text-align: center;
        }

        .modal-loading {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
        }
    </style>
</head>

<body>

    <div class="page-content" id="content">
        <div class="container">
            <?php
            // Query to fetch the pending requests for the logged-in user
            $query = "SELECT r.requestID, r.requestType, i.itemName, u.username AS itemOwner
                      FROM Request r
                      JOIN item i ON r.itemID = i.itemID
                      JOIN user u ON i.userID = u.userID
                      WHERE r.userID = $user_id AND r.status = 'Pending'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
            ?>
                <div class="row">
                    <div class="col">
                        <div class="text-dark">
                            <h1 class="display-4 fw-bold text-dark text-center mt-3 mb-0"><i class="bi bi-clock-history" style="font-size: 2.8rem;"></i> PENDING REQUESTS</h1>
                        </div>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table class="table table-bordered table-border-2 table-hover mb-3 mt-3">
                        <thead>
                            <tr class="table-dark">
                                <th>Request Type</th>
                                <th>Item Name</th>
                                <th>Item Owner</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Assuming $result contains the query result
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr class="table-row table-light" data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>">
                                    <td><?php echo $row['requestType']; ?></td>
                                    <td><?php echo $row['itemName']; ?></td>
                                    <td><?php echo $row['itemOwner']; ?></td>
                                </tr>
                                <p style="display: none;"><?php echo $row['requestID']; ?></p>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            <?php
            } else {
                echo "<div class='jumbotron jumbotron-fluid bg-light text-center'>
            <div class='container'>
                <h1 class='display-4 mt-5'>No Pending Requests</h1>
                <p class='lead text-secondary'>Looks like there are no pending requests at the moment.</p>
            </div>
        </div>";
            }
            ?>

        </div>
        <div>
            <?php
            include "reqsbuymodal.php";
            ?>
        </div>
        <div>
            <?php
            include "reqsbartermodal.php";
            ?>
        </div>
        <div>
            <?php
            include "reqsborrowmodal.php";
            ?>
        </div>

        <script>
            $(document).ready(function() {
                $('.modal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var requestId = button.data('request-id');
                    var modal = $(this);

                    // Show the loading indicator
                    modal.find('.modal-body').html('<div class="modal-loading"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');

                    // Use the requestId to fetch the request details based on the modal ID
                    var fetchUrl = '';
                    if (modal.attr('id') === 'reqbartermodal') {
                        fetchUrl = 'patch.php';
                    } else if (modal.attr('id') === 'reqBuyModal') {
                        fetchUrl = 'patch2.php';
                    } else if (modal.attr('id') === 'reqBorrowModal') {
                        fetchUrl = 'patch1.php';
                    }

                    $.ajax({
                        type: 'GET',
                        url: fetchUrl,
                        data: {
                            requestId: requestId
                        },
                        success: function(response) {
                            // Update the modal content with the fetched request details
                            modal.find('.modal-body').html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        </script>
</body>

</html>