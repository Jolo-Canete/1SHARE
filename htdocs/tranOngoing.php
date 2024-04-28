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

        .badge {
            font-size: 0.8rem;
            padding: 0.4rem 0.6rem;
        }

        .badge-success {
            background-color: #28a745;
            color: #fff;
        }

        .badge-warning {
            background-color: #ffc107;
            color: #333;
        }

        .badge-danger {
            background-color: #dc3545;
            color: #fff;
        }

        /* Only apply styles on mobile devices */
        @media only screen and (max-width: 768px) {
            .page-content #content.row {
                flex-direction: column;
            }

            .page-content #content.col {
                width: 100%;
            }

            .page-content #content.btn-group {
                width: 100%;
            }

            .page-content #content.btn-group.btn {
                width: 100%;
            }
        }

        @media only screen and (max-width: 768px) {
            .row.mb-3 {
                flex-direction: row;
                justify-content: center;
            }

            .col-auto {
                flex: 1;
                max-width: 45%;
            }

            .btn-group {
                width: 100%;
            }

            #bit {
                width: 100%;
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <div class="d-md-none">
        <div class="page-content" id="content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="text-dark">
                            <h6 class="display-7 fw-bold text-dark text-center mt-3 mb-0"><i class="bi bi-clock-history" style="font-size: 1rem;"></i> ONGOING TRANSACTIONS</h6>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row mb-3">
                    <div class="col-auto">
                        <div class="btn-group">
                            <button id="bit" type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort by Request Type
                            </button>
                            <ul class="dropdown-menu" id="sortRequestType">
                                <li><a class="dropdown-item" href="#" data-sort-type="all">All</a></li>
                                <li><a class="dropdown-item" href="#" data-sort-type="borrow">Borrow</a></li>
                                <li><a class="dropdown-item" href="#" data-sort-type="barter">Barter</a></li>
                                <li><a class="dropdown-item" href="#" data-sort-type="buy">Buy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="btn-group">
                            <button id="bit" type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort by Meeting Status
                            </button>
                            <ul class="dropdown-menu" id="sortMeetingStatus">
                                <li><a class="dropdown-item" href="#" data-sort-status="all">All</a></li>
                                <li><a class="dropdown-item" href="#" data-sort-status="current">Upcoming</a></li>
                                <li><a class="dropdown-item" href="#" data-sort-status="past">Ongoing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        // Add event listeners to the sorter buttons
                        $('#sortRequestType a').click(function() {
                            var sortType = $(this).data('sort-type');
                            sortTable(sortType, 'all');
                        });

                        $('#sortMeetingStatus a').click(function() {
                            var sortStatus = $(this).data('sort-status');
                            sortTable('all', sortStatus);
                        });

                        function sortTable(sortType, sortStatus) {
                            // Get all the table rows
                            var rows = $('tbody tr.table-row');

                            // Filter the rows based on the selected sort type and status
                            rows.each(function() {
                                var requestType = $(this).find('td:first').text();
                                var meetingStatusElement = $(this).find('td:eq(2)');
                                var meetingStatus = meetingStatusElement.text();

                                if (sortType === 'all' || requestType.toLowerCase() === sortType.toLowerCase()) {
                                    if (sortStatus === 'all') {
                                        $(this).show();
                                    } else if (sortStatus === 'current' && meetingStatus.includes('Upcoming')) {
                                        $(this).show();
                                    } else if (sortStatus === 'past' && (meetingStatus.includes('Ongoing') || meetingStatus.includes('Ongoing Borrow'))) {
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

                <?php
                // Query to fetch the owner and requester contact numbers, and the return date for borrow requests
                $query = "SELECT r.requestID, r.requestType, i.itemName, i.borrowDuration, u.username AS itemOwner,
                CASE
                    WHEN r.requestType = 'Barter' THEN b.DateTimeMeet
                    WHEN r.requestType = 'Borrow' THEN bo.DateTimeMeet 
                    WHEN r.requestType = 'Buy' THEN bu.DateTimeMeet
                    ELSE NULL
                END AS DateTimeMeet,
                CASE
                    WHEN r.requestType = 'Borrow' AND DATE_ADD(bo.DateTimeMeet, INTERVAL i.borrowDuration DAY) <= NOW() THEN '<span class=\"badge badge-danger\">Ongoing<br>Return</span>'
                    WHEN r.requestType = 'Borrow' AND bo.handed = 'Yes' THEN '<span class=\"badge badge-success\">Ongoing<br>Borrow</span>'
                    WHEN r.requestType = 'Borrow' AND bo.DateTimeMeet <= NOW() THEN '<span class=\"badge badge-success\">Ongoing</span>'
                    WHEN r.requestType = 'Borrow' THEN '<span class=\"badge badge-warning\">Upcoming</span>'
                    WHEN r.requestType = 'Barter' AND b.DateTimeMeet <= NOW() THEN '<span class=\"badge badge-success\">Ongoing</span>'
                    WHEN r.requestType = 'Barter' THEN '<span class=\"badge badge-warning\">Upcoming</span>'
                    WHEN r.requestType = 'Buy' AND bu.DateTimeMeet <= NOW() THEN '<span class=\"badge badge-success\">Ongoing</span>'
                    WHEN r.requestType = 'Buy' THEN '<span class=\"badge badge-warning\">Upcoming</span>'
                END AS MeetingStatus,
                u_owner.contactNumber AS ownerContactNumber,
                u_requester.contactNumber AS requesterContactNumber
                FROM Request r
                JOIN item i ON r.itemID = i.itemID
                JOIN user u ON i.userID = u.userID
                LEFT JOIN barter b ON r.requestID = b.requestID
                LEFT JOIN borrow bo ON r.requestID = bo.requestID
                LEFT JOIN buy bu ON r.requestID = bu.requestID
                LEFT JOIN user u_owner ON i.userID = u_owner.userID
                LEFT JOIN user u_requester ON r.userID = u_requester.userID
                WHERE (r.userID = $user_id OR i.userID = $user_id)
                AND r.status = 'Accepted'
                AND r.remove IS NULL
                ORDER BY MeetingStatus ASC, COALESCE(b.DateTimeMeet, bo.DateTimeMeet, bu.DateTimeMeet) ASC";
                $result = $conn->query($query);


                if ($result->num_rows > 0) {
                ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-border-2 table-hover mb-3 mt-3">
                            <thead>
                                <tr class="table-dark">
                                    <th>Request Type</th>
                                    <th>Item Name</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr class="table-row table-light" data-sort-request-type="<?php echo $row['requestType']; ?>">
                                        <td data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>"><?php echo $row['requestType']; ?></td>
                                        <td data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>"><?php echo $row['itemName']; ?></td>
                                        <td data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>"><?php echo $row['MeetingStatus']; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#more-<?php echo $row['requestID']; ?>">More</button>
                                        </td>
                                    </tr>
                                    <tr class="collapse" id="more-<?php echo $row['requestID']; ?>">
                                        <td colspan="3">
                                            <table class="table table-bordered" data-bs-toggle="modal" data-bs-target="#<?php echo ($row['requestType'] == 'Barter') ? 'reqbartermodal' : (($row['requestType'] == 'Buy') ? 'reqBuyModal' : 'reqBorrowModal'); ?>" data-request-id="<?php echo $row['requestID']; ?>">
                                                <tr>
                                                    <th>Item Owner</th>
                                                    <td><?php echo $row['itemOwner']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Date Time Meet</th>
                                                    <td><?php echo ($row['DateTimeMeet'] !== null) ? date('l, F j, Y g:i A', strtotime($row['DateTimeMeet'])) : "Not specified"; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Date Time Return(Borrow)</th>
                                                    <td><?php echo ($row['requestType'] == 'Borrow' && $row['DateTimeMeet'] !== null) ? date('l, F j, Y g:i A', strtotime($row['DateTimeMeet'] . " + " . $row['borrowDuration'] . " days")) : "N/A"; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Owner Contact Number</th>
                                                    <td><?php echo $row['ownerContactNumber']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Requester Contact Number</th>
                                                    <td><?php echo $row['requesterContactNumber']; ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
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
                      <h1 class='display-4 mt-5'>No Ongoing Transaction</h1>
                      <p class='lead text-secondary'>Looks like there are no ongoing transaction at the moment.</p>
                  </div>
              </div>";
                }
                ?>
            </div>
        </div>

    </div>

    <div class="d-none d-md-block">

        <div class="page-content" id="content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="text-dark">
                            <h1 class="display-4 fw-bold text-dark text-center mt-3 mb-0"><i class="bi bi-clock-history" style="font-size: 2.8rem;"></i> ONGOING TRANSACTIONS</h1>
                        </div>
                    </div>
                </div>
                <br><br>
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
                    <div class="col-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort by Meeting Status
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-sort-status="all">All</a></li>
                                <li><a class="dropdown-item" href="#" data-sort-status="current">Upcoming</a></li>
                                <li><a class="dropdown-item" href="#" data-sort-status="past">Ongoing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <?php
                $query = "SELECT r.requestID, r.requestType, i.itemName, i.borrowDuration, u.username AS itemOwner,
              CASE
                  WHEN r.requestType = 'Barter' THEN b.DateTimeMeet
                  WHEN r.requestType = 'Borrow' THEN bo.DateTimeMeet 
                  WHEN r.requestType = 'Buy' THEN bu.DateTimeMeet
                  ELSE NULL
              END AS DateTimeMeet,
              CASE
                    WHEN r.requestType = 'Borrow' AND DATE_ADD(bo.DateTimeMeet, INTERVAL i.borrowDuration DAY) <= NOW() THEN '<span class=\"badge badge-danger\">Ongoing Return</span>'
                    WHEN r.requestType = 'Borrow' AND bo.handed = 'Yes' THEN '<span class=\"badge badge-success\">Ongoing Borrow</span>'
                    WHEN r.requestType = 'Borrow' AND bo.DateTimeMeet <= NOW() THEN '<span class=\"badge badge-success\">Ongoing</span>'
                    WHEN r.requestType = 'Borrow' THEN '<span class=\"badge badge-warning\">Upcoming</span>'
                    WHEN r.requestType = 'Barter' AND b.DateTimeMeet <= NOW() THEN '<span class=\"badge badge-success\">Ongoing</span>'
                    WHEN r.requestType = 'Barter' THEN '<span class=\"badge badge-warning\">Upcoming</span>'
                    WHEN r.requestType = 'Buy' AND bu.DateTimeMeet <= NOW() THEN '<span class=\"badge badge-success\">Ongoing</span>'
                    WHEN r.requestType = 'Buy' THEN '<span class=\"badge badge-warning\">Upcoming</span>'
                END AS MeetingStatus,
              r.complete,
              r.failed,
              u_owner.contactNumber AS ownerContactNumber,
              u_requester.contactNumber AS requesterContactNumber
              FROM Request r
              JOIN item i ON r.itemID = i.itemID
              JOIN user u ON i.userID = u.userID
              LEFT JOIN barter b ON r.requestID = b.requestID
              LEFT JOIN borrow bo ON r.requestID = bo.requestID
              LEFT JOIN buy bu ON r.requestID = bu.requestID
              LEFT JOIN user u_owner ON i.userID = u_owner.userID
              LEFT JOIN user u_requester ON r.userID = u_requester.userID
              WHERE (r.userID = $user_id  || i.userID = $user_id)
              AND r.status = 'Accepted'
              AND r.remove IS NULL
              AND r.complete IS NULL
              AND r.failed IS NULL

                 ORDER BY MeetingStatus ASC, COALESCE(b.DateTimeMeet, bo.DateTimeMeet, bu.DateTimeMeet) ASC";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                ?>
                    <div class="table-wrapper ">
                        <table class="table table-bordered table-border-2 table-hover mb-3 mt-3">
                            <thead>
                                <tr class="table-dark ">
                                    <th>Request Type</th>
                                    <th>Item Name</th>
                                    <th>Item Owner</th>
                                    <th>Date Time Meet</th>
                                    <th>Status</th>
                                    <th>Date Time Return(Borrow)</th>
                                    <th>Owner Contact Number</th>
                                    <th>Requester Contact Number</th>
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
                                        <td><?php echo ($row['DateTimeMeet'] !== null) ? date('l, F j, Y g:i A', strtotime($row['DateTimeMeet'])) : "Not specified"; ?></td>
                                        <td><?php echo $row['MeetingStatus']; ?></td>
                                        <td><?php echo ($row['requestType'] == 'Borrow' && $row['DateTimeMeet'] !== null) ? date('l, F j, Y g:i A', strtotime($row['DateTimeMeet'] . " + " . $row['borrowDuration'] . " days")) : "N/A"; ?></td>
                                        <td><?php echo $row['ownerContactNumber']; ?></td>
                                        <td><?php echo $row['requesterContactNumber']; ?></td>
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
                      <h1 class='display-4 mt-5'>No Ongoing Transaction</h1>
                      <p class='lead text-secondary'>Looks like there are no ongoing transaction at the moment.</p>
                  </div>
              </div>";
                }
                ?>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // Check if the device is mobile
                if ($(window).width() > 767) { // Adjust the breakpoint as needed
                    // Add event listeners to the sorter buttons
                    $('[data-sort-type]').on('click', function() {
                        var sortType = $(this).data('sort-type');
                        sortTable(sortType, 'all');
                    });

                    $('[data-sort-status]').on('click', function() {
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
                }
            });
        </script>

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
                    fetchUrl = 'track.php';
                } else if (modal.attr('id') === 'reqBuyModal') {
                    fetchUrl = 'track2.php';
                } else if (modal.attr('id') === 'reqBorrowModal') {
                    fetchUrl = 'track1.php';
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
    </div>

    <script>
        $(document).ready(function() {
            $('.table-row').click(function() {
                var requestId = $(this).find('p').text();

            });
        });



        $(document).ready(function() {
            $('[data-toggle="collapse"]').on('click', function() {
                $(this).closest('tr').next('tr').toggleClass('collapse');
            });
        });
    </script>
</body>

</html>