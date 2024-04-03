<?php
        include "nav.php";
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Engagement Dashboard</title>
  
   <style>
    .card-header {
      background-color: #f8f9fa;
    }
    
    .card-body {
      padding: 2rem;
    }
    
    .table th, .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body>

  <div class="page-content" id="content">


  <div class="container my-5">
    <h1 class="mb-4">Engagement Dashboard</h1>
    
    <div class="row mb-4">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Weekly Top 10 Most Engaged</h5>
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Choose View
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#" data-view="your">Your Items</a></li>
                  <li><a class="dropdown-item" href="#" data-view="all">All Items</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <canvas id="weeklyChart"></canvas>
          </div>
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Monthly Top 10 Most Engaged</h5>
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Choose View
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#" data-view="your">Your Items</a></li>
                  <li><a class="dropdown-item" href="#" data-view="all">All Items</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <canvas id="monthlyChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
  <script>
    // Weekly Top 10 Most Engaged
    var weeklyData = {
      your: {
        labels: ['Item 1', 'Item 2', 'Item 3', 'Item 4', 'Item 5', 'Item 6', 'Item 7', 'Item 8', 'Item 9', 'Item 10'],
        data: [200, 180, 160, 150, 140, 130, 120, 110, 100, 90]
      },
      all: {
        labels: ['Item 1', 'Item 2', 'Item 3', 'Item 4', 'Item 5', 'Item 6', 'Item 7', 'Item 8', 'Item 9', 'Item 10'],
        data: [300, 250, 220, 200, 180, 170, 160, 150, 140, 130]
      }
    };

    var monthlyData = {
      your: {
        labels: ['Item 4', 'Item 5', 'Item 6', 'Item 7', 'Item 8', 'Item 9', 'Item 10', 'Item 11', 'Item 12', 'Item 13'],
        data: [500, 450, 400, 380, 360, 340, 320, 300, 280, 260]
      },
      all: {
        labels: ['Item 4', 'Item 5', 'Item 6', 'Item 7', 'Item 8', 'Item 9', 'Item 10', 'Item 11', 'Item 12', 'Item 13'],
        data: [600, 550, 500, 480, 460, 440, 420, 400, 380, 360]
      }
    };

    var weeklyChart, monthlyChart;

    function updateCharts(view) {
      // Weekly Top 10 Most Engaged
      weeklyChart.data.labels = weeklyData[view].labels;
      weeklyChart.data.datasets[0].data = weeklyData[view].data;
      weeklyChart.update();

      // Monthly Top 10 Most Engaged
      monthlyChart.data.labels = monthlyData[view].labels;
      monthlyChart.data.datasets[0].data = monthlyData[view].data;
      monthlyChart.update();
    }

    document.querySelectorAll('.dropdown-menu a').forEach(function(link) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        var view = this.getAttribute('data-view');
        updateCharts(view);
      });
    });

    // Initialize charts
    weeklyChart = new Chart(document.getElementById('weeklyChart'), {
      type: 'bar',
      data: {
        labels: weeklyData.your.labels,
        datasets: [{
          label: 'Engagement',
          data: weeklyData.your.data,
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
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

    monthlyChart = new Chart(document.getElementById('monthlyChart'), {
      type: 'bar',
      data: {
        labels: monthlyData.your.labels,
        datasets: [{
          label: 'Engagement',
          data: monthlyData.your.data,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
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
