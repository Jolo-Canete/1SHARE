
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


 

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


  <style>
    /* For input Number */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
  </style>
</head>
<body>
<!-- Modals for settings.php -->


<!-- Modal for email -->
<div class="modal fade" id="editModal_email" tabindex="-1" aria-labelledby="editModalLabel_email" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="editModalLabel_email">Edit Email</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="editModal_email_input" class="form-label"><b>Email</b></label>
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

<!-- Modal for Birthday -->
<div class="modal fade" id="editModal_birthdate" tabindex="-1" aria-labelledby="editModal_Birthday" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="editModal_Birthday">Edit Date of Birth</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="editModal_Birthday_input" class="form-label"><b>Date of Birth</b> <span class="text-secondary">(Cannot be changed for <b>40 days</b> upon submit) </span></label>
                        <input type="date" name="editBirthday" id="editModal_Birthday_Input" class="form-control" >
                    </div>
                
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="submitEdit_Birthday">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal For purok -->
<div class="modal fade" id="editModal_Purok" tabindex="-1" aria-labelledby="editModal_purok" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="editModal_Purok">Edit Purok</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="editModal_Birthday_input" class="form-label"><b>Purok</b></label>

                        <input type="text" name="editPurok" id="editModal_Purok_Input" class="form-control mb-3" placeholder="ex. Purok 21, Curvada">

                        <input type="number" name="editPurok" id="editModal_Purok_Input" class="form-control" placeholder="ex. 3" >

                    </div>
                
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="submitEdit_Purok">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal For zone -->
<div class="modal fade" id="editModal_Zone" tabindex="-1" aria-labelledby="editModalZoneLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="editModalTitle_Zone">Edit Zone</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="editModal_Zone_Input" class="form-label"><b>Zone</b></label>

                        <input type="text" name="editZone" id="editModal_Zone_Input" class="form-control mb-3" placeholder="ex. Zone 3" >

                        <input type="number" name="editZone" id="editModal_Zone_Input" class="form-control" placeholder="ex. 3" >


                    </div>
                
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="submitEdit_Zone">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal For Contact Number -->
<div class="modal fade" id="editModal_ContactNumber" tabindex="-1" aria-labelledby="editModalContactNumber" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="editModalTitle_ContactNumber">Edit Contact Number</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="editModal_Zone_Input" class="form-label"><b>Contact Number</b></label>
                        <input type="number" name="editContactNumber" id="editModalBody_Number" class="form-control" placeholder="<?php echo $userData['contactNumber']; ?>" >
                        <span id="message" style="color: red;"></span>
                    </div>
                
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="submitEdit_ContactNumber">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal For username -->
<div class="modal fade" id="editModal_Username" tabindex="-1" aria-labelledby="editModalUsername" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="editModalTitle_Username">Edit Username</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="editModal_Username_Input" class="form-label"><b>Username</b></label>
                        <input type="text" name="editUsername" id="editModalBody_Username" class="form-control" placeholder="<?php echo ucfirst($userData['username']); ?>" >
                    </div>
                
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="submitEdit_Username">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- MOdal For password -->
<div class="modal fade" id="editModal_Password" tabindex="-1" aria-labelledby="editModalPPassword" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="editModalTitle_Password">Change Password</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="editModal_Password_Input" class="form-label"><b>Password</b></label>
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" placeholder="Password" name="editPassword">
                            <div class="input-group-append">
                                <button id="togglePassword" class="btn btn-outline-secondary" type="button"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </div>
                    </div>
                
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="submitEdit_Password">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>








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
        // Script for Birthday
        if(isset($_POST['submitEdit_Birthday'])) {
            $Birthday = trim($_POST['editBirthday']);
            

            if (empty($Birthday)) {
                echo "<script>alert('Birthday cannot be empty')</script>";
            } else {

                $Birthday =  date('Y-m-d', strtotime($_POST['editBirthday']));

                $sql = "UPDATE user SET birthDay = '$Birthday' WHERE userID = '$user_id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Birthday Updated Successfully')</script>";
                    echo "<script>window.location.href='settings.php'</script>";
                } else {
                    echo "<script>alert('Birthday Update Failed')</script>";
                }
            }
        }

        // Script for Purok
        if(isset($_POST['submitEdit_Purok'])) {
            $Purok = trim($_POST['editPurok']);
            

            if (empty($Purok)) {
                echo "<script>alert('Purok cannot be empty')</script>";
            } else {

                $sql = "UPDATE user SET purok = '$Purok' WHERE userID = '$user_id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Purok Updated Successfully')</script>";
                    echo "<script>window.location.href='settings.php'</script>";
                } else {
                    echo "<script>alert('Purok Update Failed')</script>";
                }
            }
        }

        // Script for Zone
        if(isset($_POST['submitEdit_Zone'])) {
            $Zone = trim($_POST['editZone']);
            

            if (empty($Zone)) {
                echo "<script>alert('Zone cannot be empty')</script>";
            } else {

                $sql = "UPDATE user SET zone = '$Zone' WHERE userID = '$user_id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Zone Updated Successfully')</script>";
                    echo "<script>window.location.href='settings.php'</script>";
                } else {
                    echo "<script>alert('Zone Update Failed')</script>";
                }
            }
        }

        // Script for Contact Number
        if(isset($_POST['submitEdit_ContactNumber'])) {
            $contactNumber = trim($_POST['editContactNumber']); 

            if (empty($contactNumber)) {
                echo "<script>alert('Contact Number cannot be empty')</script>";
                return;
            } elseif (strlen($contactNumber) < 11) {
                echo "<script>alert('Contact Number must be 11 digits')</script>";
                return;
            } elseif (strlen($contactNumber) > 11) {
                echo "<script>alert('Contact Number must be 11 digits only')</script>";
                return;
            } else {
                // If the Contact Number has been used
                $sql = "SELECT * FROM user WHERE contactNumber = '$contactNumber'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<script>alert('Contact Number cannot be used')</script>";
                    return;
                } else {
                    $sql = "UPDATE user SET contactNumber = '$contactNumber' WHERE userID = '$user_id'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo "<script>alert('Contact Number Updated Successfully')</script>";
                        echo "<script>window.location.href='settings.php'</script>";
                        return;
                    } else {
                        echo "<script>alert('Contact Number Update Failed')</script>";
                        return;
                    }
                }
            }
        }
        
        // Script For username
        if(isset($_POST['submitEdit_Username'])){
            $username = trim($_POST['editUsername']);

            if(empty($username)) {
                echo "<script>alert('Username cannot be empty')</script>";
                return;
            }elseif(strlen($username) <4) {
                echo "<script>alert('Username must be atleast 4 characters')</script>";
                return;
            } elseif(strlen($username) > 20) {
                echo "<script>alert('Username must be less than 20 characters')</script>";
                return;
            }
             else {
                $sql = "SELECT * FROM user WHERE username = '$username'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<script>alert('Username cannot be used')</script>";
                    return;
                } else {
                    $sql = "UPDATE user SET username = '$username' WHERE userID = '$user_id'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo "<script>alert('Username Updated Successfully')</script>";
                        echo "<script>window.location.href='settings.php'</script>";
                        return;
                    } else {
                        echo "<script>alert('Username Update Failed')</script>";
                        return;
                    }
                }
            }
        }

        //Script For password
        if(isset($_POST['submitEdit_Password'])) {
            $password = trim($_POST['editPassword']);

            if(empty($password)) {
                echo "<script>alert('Password cannot be empty')</script>";
                return;
            }elseif(strlen($password) < 8) {
                echo "<script>alert('Password must be atleast 8 characters')</script>";
                return;
            } elseif(strlen($password) > 20) {
                echo "<script>alert('Password must be less than 20 characters')</script>";
                return;
            }
             else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE user SET password = '$password' WHERE userID = '$user_id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Password Updated Successfully')</script>";
                    echo "<script>window.location.href='settings.php'</script>";
                    return;
                } else {
                    echo "<script>alert('Password Update Failed')</script>";
                    return;
                }
            }
        }
  
    }
?>

<script>
// Script for Contact Number
document.getElementById('editModalBody_Number').addEventListener('input', function(e) {
    var messageElement = document.getElementById('message');
    if (e.target.value.length < 11) {
        messageElement.textContent = 'The inputted Number are less than 11.';
    }else if (e.target.value.length > 11)  {
        messageElement.textContent = 'Phone Number should be 11 digits.';
    } 
    else {
        messageElement.textContent = '';
    }
});

// Script for Password
var password = document.getElementById('password');
var togglePassword = document.getElementById('togglePassword');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.children[0].classList.toggle('bi-eye-fill');
    this.children[0].classList.toggle('bi-eye-slash-fill');
});
</script>
</body>
</html>