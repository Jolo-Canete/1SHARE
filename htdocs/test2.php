<?php
include "./1db.php";
include "./adminnav.php"; ?>

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

        .more-details {
            display: none;
        }
    </style>
</head>

<body>
    <div class="page-content" id="content">
        <div class="container">
            <br>
            <div class="row mb-3">
                <div class="col-3">
                    <form class="input-group mb-3">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
                <div class="col-9 d-flex justify-content-end">
                        <button type="button" class="btn btn-dark border-0 p-2 mb-3 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort by Request Type
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" data-sort-type="all">All</a></li>
                            <li><a class="dropdown-item" href="#" data-sort-type="borrow">Borrow</a></li>
                            <li><a class="dropdown-item" href="#" data-sort-type="barter">Barter</a></li>
                            <li><a class="dropdown-item" href="#" data-sort-type="buy">Buy</a></li>
                        </ul>
                </div>
                <?php

                // Query to fetch all closed requests
                $query = "SELECT r.requestID, r.requestType, i.itemName, r.complete AS complete, u.username AS itemOwner,
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
          LEFT JOIN barter b ON r.requestID = b.requestID
          LEFT JOIN borrow bo ON r.requestID = bo.requestID
          LEFT JOIN buy bu ON r.requestID = bu.requestID
          LEFT JOIN user u ON i.userID = u.userID
          WHERE (r.complete IS NOT NULL OR r.failed IS NOT NULL)";

                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    echo '<div class="table-wrapper">';
                    echo '<table class="table table-bordered table-border-2 table-hover mb-3 mt-3">';
                    echo '<thead>';
                    echo '<tr class="table-dark">';
                    echo '<th>Status</th>';
                    echo '<th>Request Type</th>';
                    echo '<th>Item Name</th>';
                    echo '<th>Item Owner</th>';
                    echo '<th>Date Time Completed</th>';
                    echo '<th>Proof</th>';
                    echo '<th>Return Proof (BORROW)</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    // Assuming $result contains the query result
                    while ($row = $result->fetch_assoc()) {
                        $requestDateTimeClosed = $row['DateTimeCompleted'] ? date('l, F j, Y g:i A', strtotime($row['DateTimeCompleted'])) : '';
                        echo '<tr class="table-row table-light">';
                        echo '<td>';
                        if ($row['complete'] == 'Yes') {
                            echo '<span class="badge bg-success-subtle text-success-emphasis rounded-pill">Success</span>';
                        } else {
                            echo '<span style="background-color: red; color: white; padding: 5px; border-radius: 5px;">Failed</span>';
                        }
                        echo '</td>';
                        echo '<td class="table-bordered" data-bs-toggle="modal" data-bs-target="#' . (($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal')) . '" data-request-id="' . $row['requestID'] . '">' . $row['requestType'] . '</td>';
                        echo '<td class="table-bordered" data-bs-toggle="modal" data-bs-target="#' . (($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal')) . '" data-request-id="' . $row['requestID'] . '">'  . $row['itemName'] . '</td>';
                        echo '<td class="table-bordered" data-bs-toggle="modal" data-bs-target="#' . (($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal')) . '" data-request-id="' . $row['requestID'] . '">'  . $row['itemOwner'] . '</td>';
                        echo '<td class="table-bordered" data-bs-toggle="modal" data-bs-target="#' . (($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal')) . '" data-request-id="' . $row['requestID'] . '">'  . $requestDateTimeClosed . '</td>';
                        echo '<td class="table-bordered" data-bs-toggle="modal" data-bs-target="#' . (($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal')) . '" data-request-id="' . $row['requestID'] . '">';


                        if ($row['Proof'] != 'N/A') {
                            echo '<img src="proof/' . $row['Proof'] . '" alt="Proof" width="100">';
                        } else {
                            echo 'N/A';
                        }
                        echo '</td>';
                        echo '<td class="table-bordered" data-bs-toggle="modal" data-bs-target="#' . (($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal')) . '" data-request-id="' . $row['requestID'] . '">';
                        if ($row['ReturnProof'] != 'N/A') {
                            echo '<img src="proof/' . $row['ReturnProof'] . '" alt="Proof" width="100">';
                        } else {
                            echo 'N/A';
                        }
                        echo '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                } else {
                    echo "<div class='jumbotron jumbotron-fluid bg-light text-center'>
                        <div class='container'>
                            <h1 class='display-4 mt-5'>No Successful Requests</h1>
                            <p class='lead text-secondary'>Looks like there are no successful requests at the moment.</p>
                        </div>
                    </div>";
                };

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
                    $('#showMoreBtn').click(function() {
                        $('.more-details').toggle();
                        $(this).text(function(i, text) {
                            return text === "More Details" ? "Less Details" : "More Details";
                        });
                    });
                });
            </script>
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
                            fetchUrl = 'final.php';
                        } else if (modal.attr('id') === 'reqBuyModal') {
                            fetchUrl = 'final2.php';
                        } else if (modal.attr('id') === 'reqBorrowModal') {
                            fetchUrl = 'final1.php';
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
    </div>
</body>

</html>