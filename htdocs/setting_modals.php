<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
<!-- Modals for settings.php -->

<!-- Modal for email -->
<div class="modal fade" id="editModal_email" tabindex="-1" aria-labelledby="editModalLabel_email" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel_email">Edit Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
        <div class="modal-body">
            <form action="settings.php" method="post" >
                <div class="mb-3">
                    <label for="editEmail" class="form-label">Email to be Edited</label>
                    <input type="text" name="editEmail" id="editEmail" placeholder="<?php echo $userData['userEmail'];?>">
                </div>       
            </form>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancel</button>
            <button type="submit" class="btn btn-primary" name="submitEdit_email" onclick="updateData('editModal_email')">Save changes</button>
        </div>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>