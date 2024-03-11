<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Engagement Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
  <style>
    /* Custom styles */
    body {
      background-color: #f8f9fa;
    }
    .container-fluid {
      padding-top: 50px;
    }
    .card {
      margin-bottom: 30px;
    }
  </style>
</head>
<body>
<header>
    <?php include "nav.php"; ?>
  </header>
  <div id="content" class="content">

  <br>
  <br>
  <br>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Most Engaged Items - Bar Graph</h5>
          <canvas id="engagementBarChart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Engagement Distribution - Pie Chart</h5>
          <canvas id="engagementPieChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>


<script>
  // Sample data
  const engagedItems = {
    "Item 1": 500,
    "Item 2": 300,
    "Item 3": 700,
    "Item 4": 400,
    "Item 5": 600
  };

  // Get data for charts
  const itemLabels = Object.keys(engagedItems);
  const itemEngagementData = Object.values(engagedItems);

  // Bar chart
  var ctx = document.getElementById('engagementBarChart').getContext('2d');
  var engagementBarChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: itemLabels,
          datasets: [{
              label: 'Engagement',
              data: itemEngagementData,
              backgroundColor: [
                  'rgba(255, 99, 132, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(255, 206, 86, 0.5)',
                  'rgba(75, 192, 192, 0.5)',
                  'rgba(153, 102, 255, 0.5)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });

  // Pie chart
  var ctx2 = document.getElementById('engagementPieChart').getContext('2d');
  var engagementPieChart = new Chart(ctx2, {
      type: 'pie',
      data: {
          labels: itemLabels,
          datasets: [{
              label: 'Engagement',
              data: itemEngagementData,
              backgroundColor: [
                  'rgba(255, 99, 132, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(255, 206, 86, 0.5)',
                  'rgba(75, 192, 192, 0.5)',
                  'rgba(153, 102, 255, 0.5)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
</script>
</body>
</html>
