<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interactive Pencil-Fill</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <style>
    .modal-dialog {
      max-width: 600px;
    }
  </style>
</head>
<body>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Interactive Pencil-Fill</h5>
            <p class="card-text" id="data-display">This is the data to be edited.</p>
            <div class="d-flex align-items-center">
              <span class="bi bi-pencil-fill text-primary" data-bs-toggle="modal" data-bs-target="#editModal_email">
              <span class="ms-2 text-muted">Click to edit</span></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal_email" tabindex="-1" aria-labelledby="editModalLabel_email" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="dataInput" class="form-label">Data to be edited</label>
              <input type="text" class="form-control" id="dataInput" value="This is the data to be edited.">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="updateData()">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function updateData() {
      const newData = document.getElementById('dataInput').value;
      document.getElementById('data-display').textContent = newData;
      document.getElementById('editModal').classList.remove('show');
      document.querySelector('.modal-backdrop').remove();
    }
  </script>
</body>
</html>