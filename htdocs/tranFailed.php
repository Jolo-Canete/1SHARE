<?php
include "nav.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transition Failed</title>

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
            <div class="row">
                <div class="col">
                    <div class="d-none d-md-block text-dark">
                        <h1 class="display-4 fw-bold text-dark text-center mt-3 mb-0"><i class="bi bi-file-excel" style="font-size: 2.8rem;"></i> FAILED TRANSACTIONS</h1>
                    <br>
                    </div>
                    <div class="d-md-none text-dark">
                    <h6 class="display-7 fw-bold text-dark text-center mt-4 mb-0"><i class="bi bi-file-excel" style="font-size: 1rem;"></i> FAILED TRANSACTIONS</h6>
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
            $query = "SELECT r.requestID, r.requestType, i.itemName, u.username AS itemOwner,
            (CASE
                WHEN r.requestType = 'Barter' THEN b.DateTimeCompleted
                WHEN r.requestType = 'Borrow' THEN bo.DateTimeCompleted 
                WHEN r.requestType = 'Buy' THEN bu.DateTimeCompleted
                ELSE NULL
            END) AS DateTimeCompleted
            FROM Request r
            JOIN item i ON r.itemID = i.itemID
            JOIN user u ON i.userID = u.userID
            LEFT JOIN barter b ON r.requestID = b.requestID
            LEFT JOIN borrow bo ON r.requestID = bo.requestID
            LEFT JOIN buy bu ON r.requestID = bu.requestID
            WHERE (r.userID = $user_id OR i.userID = $user_id)
            AND r.failed IS NOT NULL";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
            ?>

                    <table class="table table-bordered table-border-2 table-hover mb-3 mt-3">
                        <thead>
                            <tr class="table-dark">
                                <th>Request Type</th>
                                <th>Item Name</th>
                                <th>Item Owner</th>
                                <th>Date Time Failed</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Assuming $result contains the query result
                            while ($row = $result->fetch_assoc()) {
                                $requestDateTimeClosed = $row['DateTimeCompleted'] ? date('l, F j, Y g:i A', strtotime($row['DateTimeCompleted'])) : '';
                            ?>
                                <tr class="table-row table-light" data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>">
                                    <td><?php echo $row['requestType']; ?></td>
                                    <td><?php echo $row['itemName']; ?></td>
                                    <td><?php echo $row['itemOwner']; ?></td>
                                    <td><?php echo $requestDateTimeClosed; ?></td>
                                </tr>
                                <p style="display: none;"><?php echo $row['requestID']; ?></p>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

            <?php
            } else {
                echo "<div class='jumbotron jumbotron-fluid bg-light text-center'>
            <div class='container'>
                <h1 class='display-4 mt-5'>No Failed Transaction</h1>
                <p class='lead text-secondary'>Looks like there are no failed transaction at the moment.</p>
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
                        fetchUrl = 'patchs.php';
                    } else if (modal.attr('id') === 'reqBuyModal') {
                        fetchUrl = 'patchs2.php';
                    } else if (modal.attr('id') === 'reqBorrowModal') {
                        fetchUrl = 'patchs1.php';
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
            <script>
    $(document).ready(function() {
        // Add event listeners to the sorter buttons
        $('[data-sort-type]').click(function() {
            var sortType = $(this).data('sort-type');
            sortTable(sortType, 'all');
        });

        $('[data-sort-status]').click(function() {
            var sortStatus = $(this).data('sort-status');
            sortTable('all', sortStatus);
        });

        function sortTable(sortType, sortStatus) {
            // Get all the table rows
            var rows = $('tbody tr.table-row');

            // Filter the rows based on the selected sort type and status
            rows.each(function() {
                var requestType = $(this).find('td:first').text();
                var meetingStatus = $(this).find('td:eq(4)').text();

                if (sortType === 'all' || requestType.toLowerCase() === sortType.toLowerCase()) {
                    if (sortStatus === 'all' || (sortStatus === 'current' && meetingStatus.includes('Upcoming')) || (sortStatus === 'past' && !meetingStatus.includes('Upcoming'))) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>
    </div>