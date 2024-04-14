
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel_email">Edit Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="editModal_email_input" class="form-label">Email to be Edited</label>
                        <input type="text" name="editEmail" id="editModal_email_input" class="form-control" placeholder="<?php echo $userData['userEmail'];?>">
                    </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="submitEdit_email">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Php form to submit the edited data -->
<?PHP 
    IF($_SERVER["REQUEST_METHOD"] == "POST") {
    // SCript for Email
        if(isset($_POST['submitEdit_email'])) {
            $userEmail = trim($_POST['editEmail']);

               // If the email is already in use
               $sql = "SELECT * FROM user WHERE userEmail = '$userEmail'";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                   echo "<script>alert('Email cannot be used')</script>";
                   return;
               }

            if (empty($userEmail)) {
                echo "<script>alert('Email cannot be empty')</script>";
            } else {
                $sql = "UPDATE user SET userEmail = '$userEmail' WHERE userID = '$user_id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Email Updated Successfully')</script>";
                    echo "<script>window.location.href='settings.php'</script>";
                } 
 
                
                else {
                    echo "<script>alert('Email Update Failed')</script>";
                }
            }

        }     
        

    }



?>

</body>
</html>