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
    </style>
</head>

<body>

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
            // Query to fetch the owner and requester contact numbers, and the return date for borrow requests
            $query = "SELECT r.requestID, r.requestType, i.itemName, i.borrowDuration, u.username AS itemOwner,
                 CASE
                     WHEN r.requestType = 'Barter' THEN b.DateTimeMeet
                     WHEN r.requestType = 'Borrow' THEN bo.DateTimeMeet 
                     WHEN r.requestType = 'Buy' THEN bu.DateTimeMeet
                     ELSE NULL
                 END AS DateTimeMeet,
                 CASE
                     WHEN r.requestType = 'Borrow' AND DATE_ADD(bo.DateTimeMeet, INTERVAL i.borrowDuration DAY) <= NOW() THEN '<span class=\"badge badge-danger\">Ongoing Return</span>'
                     WHEN r.requestType = 'Borrow' THEN CASE WHEN bo.DateTimeMeet <= NOW() THEN '<span class=\"badge badge-success\">Ongoing Borrow</span>' ELSE '<span class=\"badge badge-warning\">Upcoming</span>' END
                     WHEN r.requestType = 'Barter' THEN CASE WHEN b.DateTimeMeet <= NOW() THEN '<span class=\"badge badge-success\">Ongoing</span>' ELSE '<span class=\"badge badge-warning\">Upcoming</span>' END
                     WHEN r.requestType = 'Buy' THEN CASE WHEN bu.DateTimeMeet <= NOW() THEN '<span class=\"badge badge-success\">Ongoing</span>' ELSE '<span class=\"badge badge-warning\">Upcoming</span>' END
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
                 WHERE r.userID = $user_id  || i.userID = $user_id
                 AND r.status = 'Accepted'
                 AND r.remove IS NULL
                 ORDER BY MeetingStatus ASC, COALESCE(b.DateTimeMeet, bo.DateTimeMeet, bu.DateTimeMeet) ASC";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
            ?>
                <div class="table-wrapper">
                    <table class="table table-bordered table-border-2 table-hover mb-3 mt-3">
                        <thead>
                            <tr class="table-dark">
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
</body>

</html>