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
    /* ... (your existing CSS styles) ... */
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

      <div class="btn-group mb-3">
        <button type="button" class="btn btn-outline-dark" data-view="all">All Items</button>
        <button type="button" class="btn btn-outline-dark" data-view="your">Your Items</button>
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

      var data = weeklyData[view];

      for (var i = 0; i < data.labels.length; i++) {
        var row = document.createElement('tr');

        var rankCell = document.createElement('td');
        rankCell.textContent = i + 1;

        var itemNameCell = document.createElement('td');
        itemNameCell.textContent = data.labels[i];

        var requestsCell = document.createElement('td');
        requestsCell.textContent = data.data[i];

        var usernameCell = document.createElement('td');
        usernameCell.textContent = data.usernames[i];

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

      var data = monthlyData[view];

      for (var i = 0; i < data.labels.length; i++) {
        var row = document.createElement('tr');

        var rankCell = document.createElement('td');
        rankCell.textContent = i + 1;

        var itemNameCell = document.createElement('td');
        itemNameCell.textContent = data.labels[i];

        var requestsCell = document.createElement('td');
        requestsCell.textContent = data.data[i];

        var usernameCell = document.createElement('td');
        usernameCell.textContent = data.usernames[i];

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
        this.classList.add('btn btn-outline-dark');
        this.classList.remove('btn btn-outline-dark');
        this.parentNode.querySelector('.btn:not(.btn btn-outline-dark)').classList.add('btn btn-outline-dark');
        this.parentNode.querySelector('.btn:not(.btn btn-outline-dark)').classList.remove('btn btn-outline-dark');
      });
    });

    // Initialize tables
    updateTables('your');
  </script>
  
</body>

</html>