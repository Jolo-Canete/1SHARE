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
        ?>.table-hover tbody tr.table-row:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .table-row {
            transition: background-color 0.3s ease;
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
            <div class="row">
                <div class="col">
                    <div class="d-none d-md-block text-dark">
                        <h1 class="display-4 fw-bold text-dark text-center mt-3 mb-0"><i class="bi bi-check-circle" style="font-size: 2.8rem;"></i> SUCCESSFUL TRANSACTIONS</h1>
                        <br>
                    </div>
                    <div class="d-md-none text-dark">
                        <h4 class="display-7 fw-bold text-dark text-center mt-4 mb-0"><i class="bi bi-check-circle" style="font-size: 1rem;"></i> SUCCESSFUL TRANSACTIONS</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="row mb-3">
                <div class="col-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort by Request Type
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" data-sort-type="all">All</a></li>
                            <li><a class="dropdown-item" href="#" data-sort-type="borrow">Borrow</a></li>
                            <li><a class="dropdown-item" href="#" data-sort-type="barter">Barter</a></li>
                            <li><a class="dropdown-item" href="#" data-sort-type="buy">Buy</a></li>
                        </ul>
                    </div>
                </div>
                <?php
                // Query to fetch the closed requests for the logged-in user
                $query = "SELECT r.requestID, r.requestType, i.itemName, u.username AS itemOwner, r.rated AS rated,
             (CASE
              WHEN r.requestType = 'Barter' THEN b.DateTimeCompleted
              WHEN r.requestType = 'Borrow' THEN bo.DateTimeCompleted 
              WHEN r.requestType = 'Buy' THEN bu.DateTimeCompleted
              ELSE NULL
          END) AS DateTimeCompleted,
          (CASE
              WHEN r.requesterSuccess IS NOT NULL THEN r.requesterSuccess
              WHEN r.ownerSuccess IS NOT NULL THEN r.ownerSuccess
              ELSE 'N/A'
          END) AS Proof,
          (CASE
              WHEN bo.RequesterProof IS NOT NULL THEN bo.RequesterProof
              WHEN bo.OwnerProof IS NOT NULL THEN bo.OwnerProof
              ELSE 'N/A'
          END) AS ReturnProof
            FROM Request r
            JOIN item i ON r.itemID = i.itemID
            JOIN user u ON i.userID = u.userID
            LEFT JOIN barter b ON r.requestID = b.requestID
            LEFT JOIN borrow bo ON r.requestID = bo.requestID
            LEFT JOIN buy bu ON r.requestID = bu.requestID
            WHERE (r.userID = $user_id OR i.userID = $user_id)
            AND r.complete IS NOT NULL ";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                ?>

                    <table class="table table-bordered table-border-2 table-hover mb-3 mt-3">
                        <thead>
                            <tr class="table-dark">
                                <th>Rated</th>
                                <th>Request Type</th>
                                <th>Item Name</th>
                                <th class="d-md-table-cell d-none">Item Owner</th>
                                <th class="d-md-table-cell d-none">Date Time Completed</th>
                                <th class="d-none d-md-table-cell">Proof</th>
                                <th class="d-none d-md-table-cell">Handed Proof(Borrow)</th>
                                <th class="d-table-cell d-md-none">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Assuming $result contains the query result
                            while ($row = $result->fetch_assoc()) {
                                $requestDateTimeClosed = $row['DateTimeCompleted'] ? date('l, F j, Y g:i A', strtotime($row['DateTimeCompleted'])) : '';
                            ?>
                                <td>
                                    <?php
                                    // Check if rated is 'yes' or 'no' and set appropriate text
                                    $ratingText = $row['rated'] === 'yes' ? 'Rated' : 'Unrated';
                                    // Set appropriate class for styling based on the value of $row['rated']
                                    $ratingClass = $row['rated'] === 'yes' ? 'text-bg-success' : 'text-bg-danger';
                                    ?>
                                    <span class="badge <?php echo $ratingClass; ?>">
                                        <?php echo $ratingText; ?>
                                    </span>
                                </td>

                                <td data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>"><?php echo $row['requestType']; ?></td>
                                <td data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>"><?php echo $row['itemName']; ?></td>
                                <td class="d-md-table-cell d-none" data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>"><?php echo $row['itemOwner']; ?></td>
                                <td class="d-md-table-cell d-none" data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>"><?php echo $requestDateTimeClosed; ?></td>
                                <td class="d-none d-md-table-cell" data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>">
                                    <?php if ($row['Proof'] != 'N/A') {
                                        echo '<img src="proof/' . $row['Proof'] . '" alt="Proof" width="100">';
                                    } else {
                                        echo 'N/A';
                                    } ?>
                                </td>
                                <td class="d-none d-md-table-cell" data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>">
                                    <?php if ($row['ReturnProof'] != 'N/A') {
                                        echo '<img src="proof/' . $row['ReturnProof'] . '" alt="Proof" width="100">';
                                    } else {
                                        echo 'N/A';
                                    } ?>
                                </td>
                                <td class="d-table-cell d-md-none">
                                    <a class="btn btn-primary btn-sm mb-1 collapsed" data-bs-toggle="collapse" href="#collapsible-<?php echo $row['requestID']; ?>" role="button" aria-expanded="false" aria-controls="collapsible-<?php echo $row['requestID']; ?>">
                                        More
                                    </a>
                                    <div class="collapse" id="collapsible-<?php echo $row['requestID']; ?>">
                                        <div class="card card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p><strong>Request Type:</strong> <?php echo $row['requestType']; ?></p>
                                                    <p><strong>Item Name:</strong> <?php echo $row['itemName']; ?></p>
                                                </div>
                                                <div class="col-6">
                                                    <p><strong>Item Owner:</strong> <?php echo $row['itemOwner']; ?></p>
                                                    <p><strong>Date Time Completed:</strong> <?php echo $requestDateTimeClosed; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p><strong>Proof:</strong>
                                                        <?php if ($row['Proof'] != 'N/A') {
                                                            echo '<img src="proof/' . $row['Proof'] . '" alt="Proof" class="img-fluid">';
                                                        } else {
                                                            echo 'N/A';
                                                        } ?>
                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                    <p><strong>Return Proof (BORROW):</strong>
                                                        <?php if ($row['ReturnProof'] != 'N/A') {
                                                            echo '<img src="proof/' . $row['ReturnProof'] . '" alt="Proof" class="img-fluid">';
                                                        } else {
                                                            echo 'N/A';
                                                        } ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                <?php
                } else {
                    echo "<div class='jumbotron jumbotron-fluid bg-light text-center'>
            <div class='container'>
                <h1 class='display-4 mt-5'>No Successful Requests</h1>
                <p class='lead text-secondary'>Looks like there are no successful requests at the moment.</p>
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
                            fetchUrl = 'core.php';
                        } else if (modal.attr('id') === 'reqBuyModal') {
                            fetchUrl = 'core2.php';
                        } else if (modal.attr('id') === 'reqBorrowModal') {
                            fetchUrl = 'core1.php';
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

                    // Add event listeners to the sorter buttons
                    $('[data-sort-type]').click(function() {
                        var sortType = $(this).data('sort-type');
                        sortTable(sortType);
                    });

                    function sortTable(sortType) {
                        // Get all rows in the table body
                        var $tbody = $('table tbody');
                        var $rows = $tbody.find('tr');

                        // Hide all rows
                        $rows.hide();

                        // Filter rows based on sortType
                        if (sortType === 'all') {
                            $rows.show();
                        } else {
                            $rows.each(function() {
                                var $row = $(this);
                                var type = $row.find('td:eq(1)').text().trim(); // Adjusted index to match requestType column
                                if (type.toLowerCase() === sortType.toLowerCase()) {
                                    $row.show();
                                }
                            });
                        }
                    }
                });
            </script>


        </div>

</body>

</html>