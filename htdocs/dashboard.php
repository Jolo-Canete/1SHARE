<?php
include "nav.php";

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
  // Get the user ID from the session
  $user_id = $_SESSION['user_id'];

  // Fetch data from the database
  $your_weekly_data = fetchWeeklyData($user_id);
  $all_weekly_data = fetchAllWeeklyData();
  $your_monthly_data = fetchMonthlyData($user_id);
  $all_monthly_data = fetchAllMonthlyData();
}

function fetchWeeklyData($user_id)
{
  global $conn;

  $sql = "SELECT i.itemName, COUNT(R.requestID) AS request_count, u.username
            FROM Request R
            JOIN item i ON R.itemID = i.itemID
            JOIN user u ON R.userID = u.userID
            WHERE R.userID = ?
            GROUP BY i.itemName
            ORDER BY request_count DESC
            LIMIT 10";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();

  $data = array(
    'labels' => [],
    'data' => [],
    'usernames' => []
  );

  while ($row = $result->fetch_assoc()) {
    $data['labels'][] = $row['itemName'];
    $data['data'][] = $row['request_count'];
    $data['usernames'][] = $row['username'];
  }

  return $data;
}

function fetchAllWeeklyData()
{
  global $conn; // Assuming you have a database connection established

  $sql = "SELECT i.itemName, COUNT(R.requestID) AS request_count, u.username
            FROM Request R
            JOIN item i ON R.itemID = i.itemID
            JOIN user u ON R.userID = u.userID
            GROUP BY i.itemName
            ORDER BY request_count DESC
            LIMIT 10";

  $result = $conn->query($sql);

  $data = array(
    'labels' => [],
    'data' => [],
    'usernames' => []
  );

  while ($row = $result->fetch_assoc()) {
    $data['labels'][] = $row['itemName'];
    $data['data'][] = $row['request_count'];
    $data['usernames'][] = $row['username'];
  }

  return $data;
}

function fetchMonthlyData($user_id)
{
  global $conn; // Assuming you have a database connection established

  $sql = "SELECT i.itemName, COUNT(R.requestID) AS request_count, u.username
            FROM Request R
            JOIN item i ON R.itemID = i.itemID
            JOIN user u ON R.userID = u.userID
            WHERE R.userID = ?
            GROUP BY i.itemName
            ORDER BY request_count DESC
            LIMIT 10";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();

  $data = array(
    'labels' => [],
    'data' => [],
    'usernames' => []
  );

  while ($row = $result->fetch_assoc()) {
    $data['labels'][] = $row['itemName'];
    $data['data'][] = $row['request_count'];
    $data['usernames'][] = $row['username'];
  }

  return $data;
}

function fetchAllMonthlyData()
{
  global $conn; // Assuming you have a database connection established

  $sql = "SELECT i.itemName, COUNT(R.requestID) AS request_count, u.username
            FROM Request R
            JOIN item i ON R.itemID = i.itemID
            JOIN user u ON R.userID = u.userID
            GROUP BY i.itemName
            ORDER BY request_count DESC
            LIMIT 10";

  $result = $conn->query($sql);

  $data = array(
    'labels' => [],
    'data' => [],
    'usernames' => []
  );

  while ($row = $result->fetch_assoc()) {
    $data['labels'][] = $row['itemName'];
    $data['data'][] = $row['request_count'];
    $data['usernames'][] = $row['username'];
  }

  return $data;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Engagement Dashboard</title>

  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #f5f5f5;
    }

    /* Dashboard Title */
    .dashboard-title {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      color: #333;
    }

    .dashboard-title i {
      font-size: 2.8rem;
      margin-right: 0.5rem;
      color: #007bff;
    }

    /* Button Group */
    .btn-group {
      margin-bottom: 1.5rem;
    }

    .btn-group .btn {
      font-size: 1rem;
      font-weight: 600;
      padding: 0.75rem 1.5rem;
      border-radius: 0.5rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }

    .btn-group .btn.btn-outline-dark {
      color: #495057;
      border-color: #495057;
    }

    .btn-group .btn.btn-outline-dark:hover,
    .btn-group .btn.btn-outline-dark.active {
      background-color: #495057;
      color: #fff;
    }

    /* Cards */
    .card {
      border: none;
      border-radius: 0.5rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }

    .card-header {
      background-color: #f8f9fa;
      border-bottom: none;
      padding: 1rem 1.5rem;
    }

    .card-header h5 {
      font-size: 1.25rem;
      font-weight: 600;
      color: #333;
    }

    .card-body {
      padding: 1.5rem;
    }

    /* Tables */
    .table {
      border-collapse: separate;
      border-spacing: 0 0.75rem;
    }

    .table th,
    .table td {
      padding: 1rem;
      vertical-align: middle;
      text-align: center;
      border: none;
    }

    .table th {
      background-color: #e9ecef;
      font-weight: 600;
      color: #495057;
    }

    .table td {
      font-weight: 500;
      color: #495057;
    }

    .table tbody tr:hover {
      background-color: #f8f9fa;
      cursor: pointer;
    }

    .table .fa-solid {
      font-size: 1.2rem;
      color: #495057;
    }

    .table .fa-solid.fa-arrow-up {
      color: #28a745;
    }

    .table .fa-solid.fa-arrow-down {
      color: #dc3545;
    }
  </style>
</head>

<body>
  <div class="page-content" id="content">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="text-dark">
            <h1 class="display-4 fw-bold text-dark text-center mt-3 mb-3"><i class="bi bi-speedometer2" style="font-size: 2.8rem;"></i> DASHBOARD</h1>
          </div>
        </div>
      </div>

      <div class="mb-3">
        <button type="button" class="btn btn-outline-dark" style="border-radius: 0px;">All Items</button>
        <button type="button" class="btn btn-outline-dark" style="border-radius: 0px;">Your Items</button>

      </div>


      <div class="row mb-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Weekly Top 10 Most Engaged</h5>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Item Name</th>
                      <th>Requests</th>
                      <th>Owner</th>
                    </tr>
                  </thead>
                  <tbody id="weekly-table-body">
                    <!-- Weekly data will be dynamically inserted here -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Monthly Top 10 Most Engaged</h5>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Item Name</th>
                      <th>Requests</th>
                      <th>Owner</th>
                    </tr>
                  </thead>
                  <tbody id="monthly-table-body">
                    <!-- Monthly data will be dynamically inserted here -->
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

  <script>
    // Weekly Top 10 Most Engaged
    var weeklyData = {
      your: <?php echo json_encode($your_weekly_data); ?>,
      all: <?php echo json_encode($all_weekly_data); ?>
    };

    // Monthly Top 10 Most Engaged
    var monthlyData = {
      your: <?php echo json_encode($your_monthly_data); ?>,
      all: <?php echo json_encode($all_monthly_data); ?>
    };

    function updateTables(view) {
      updateWeeklyTable(view);
      updateMonthlyTable(view);
    }

    function updateWeeklyTable(view) {
      var tableBody = document.getElementById('weekly-table-body');
      tableBody.innerHTML = '';

      for (var i = 0; i < weeklyData[view].labels.length; i++) {
        var row = document.createElement('tr');

        var rankCell = document.createElement('td');
        rankCell.textContent = i + 1;

        var itemNameCell = document.createElement('td');
        itemNameCell.textContent = weeklyData[view].labels[i];

        var requestsCell = document.createElement('td');
        requestsCell.textContent = weeklyData[view].data[i];

        var usernameCell = document.createElement('td');
        usernameCell.textContent = weeklyData[view].usernames[i];

        row.appendChild(rankCell);
        row.appendChild(itemNameCell);
        row.appendChild(requestsCell);
        row.appendChild(usernameCell);
        tableBody.appendChild(row);
      }
    }

    function updateMonthlyTable(view) {
      var tableBody = document.getElementById('monthly-table-body');
      tableBody.innerHTML = '';

      for (var i = 0; i < monthlyData[view].labels.length; i++) {
        var row = document.createElement('tr');

        var rankCell = document.createElement('td');
        rankCell.textContent = i + 1;

        var itemNameCell = document.createElement('td');
        itemNameCell.textContent = monthlyData[view].labels[i];

        var requestsCell = document.createElement('td');
        requestsCell.textContent = monthlyData[view].data[i];

        var usernameCell = document.createElement('td');
        usernameCell.textContent = monthlyData[view].usernames[i];

        row.appendChild(rankCell);
        row.appendChild(itemNameCell);
        row.appendChild(requestsCell);
        row.appendChild(usernameCell);
        tableBody.appendChild(row);
      }
    }
    document.querySelectorAll('.btn-group button').forEach(function(btn) {
      btn.addEventListener('click', function() {
        var view = this.getAttribute('data-view');

        // Update both tables
        updateTables(view);

        // Update button styles
        this.classList.add('btn-primary');
        this.classList.remove('btn-outline-primary');
        this.parentNode.querySelector('.btn:not(.btn-primary)').classList.add('btn-outline-primary');
        this.parentNode.querySelector('.btn:not(.btn-primary)').classList.remove('btn-primary');
      });
    });

    // Initialize tables
    updateTables('your');
  </script>
</body>

</html>