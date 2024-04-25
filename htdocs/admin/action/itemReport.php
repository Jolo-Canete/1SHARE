<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Report</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <style>
    .owner-name {
      color: #0047ab;
    }

    .item-name {
        color: blue;
    }

    .report-owner{
        color:firebrick;
    }

    .card-header{
        background-color: #c5adad;
    }

    .card-header, .card-body {
      padding: 0.75rem 1.25rem; /* Adjust the padding as needed */
    }
  </style>
</head>
<body>
  <div class="container my-5">
    <div class="card card-outline-primary">
      <div class="card-header">
        <h4>Item Report</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <p>Reported By: <span class="report-owner">Nikola Jokić</span></p>
            <h5>Reported Item:  <span class="item-name">Nike Air Force II</span></h5>
            <p>Item owned by: <span class="owner-name">John Doe</span></p>
            <div class="mb-3">
              <label for="reason" class="form-label">Reason for Report:</label>
              <textarea class="form-control" id="reason" rows="8" cols="50">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</textarea>
            </div>
          </div>
          <div class="col-md-6">
            <h5>Proof of Violation</h5>
            <img src="https://via.placeholder.com/400x300" alt="Proof Image" class="img-fluid mb-3">
            <p>Additional details about the proof image.</p>
          </div>
        </div>
        <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-warning me-1">Warn User</button>
        <a class="btn btn-secondary me-1" href="#">Deny Request</a>
          <a class="btn btn-primary me-4"  href="../ad_itemReport.php">Return</a>
          <button type="button" class="btn btn-danger me-1">Delete Item</button>


        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>