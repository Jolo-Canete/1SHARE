<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--- Bootstrap 5 Icons --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <style>
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <a class="navbar-brand" href="login.php" style="margin-left: 50px;">
                        <img src="picture/logo.png" alt="I S H A R E logo" style="height: 30px; ">
                        I S H A R E
                    </a>
                </ul>

                <div class="text-end">
                    <?php if(empty($username)) { ?>
                        <button type="button" class="btn btn-primary me-2">Login</button>
                        <button type="button" class="btn btn-success">Sign-up</button>
                    <?php } else { ?>
                        <a href="?logout=true" class="btn btn-danger">Logout</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">

            <?php if(isset($email)) { ?>
                <?php if($email != $legitEmail) { ?>
                    <div class="col-md-4">
                        <div class="card mt-5 shadow">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="htdocs/picture/logo.png" alt="I S H A R E Logo" class="logo">
                                </div>
                                <h5 class="card-title text-center mb-0">Forgot Password?</h5>
                                <div class="text-danger text-center mt-0 mb-3">The email you entered is not the same as the registered email. Please try again.</div>
                                <form method="POST" action="">
                                    <div class="mb-3">
                                        <label for="email" class="form-label"><b>Email address</b></label>
                                        <input type="email" class="form-control is-invalid" id="email" name="email" placeholder="Enter your email" required>
                                    </div>
                                    <div class="d-grid mb-3">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <!-- Reset Password Form -->
                    <div class="col-md-4">
                        <div class="card mt-5 shadow">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="htdocs/picture/logo.png" alt="I S H A R E Logo" class="logo">
                                </div>
                                <h5 class="card-title text-center mb-0">Reset Password</h5>
                                <div class="text-secondary text-center mt-0 mb-3">Create new password</div>
                                <form method="POST" action="">
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label"><b>New Password</b></label>
                                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter your new password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_new_password" class="form-label"><b>Confirm New Password</b></label>
                                        <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm your new password" required>
                                    </div>
                                    <div class="d-grid mb-3">
                                        <button type="submit" class="btn btn-success">Reset Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="col-md-4">
                    <div class="card mt-5 shadow">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="htdocs/picture/logo.png" alt="I S H A R E Logo" class="logo">
                            </div>
                            <h5 class="card-title text-center mb-0">Forgot Password?</h5>
                            <?php if(isset($emailNotFound) && $emailNotFound) { ?>
                                <div class="text-danger text-center mt-0 mb-3">The email you entered was not found. Please try again.</div>
                            <?php } else { ?>
                                <div class="text-secondary text-center mt-0 mb-3">Please enter your registered email.</div>
                            <?php } ?>
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="email" class="form-label"><b>Email address</b></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if(isset($passwordChanged) && $passwordChanged) { ?>
                <!-- Successful Message -->
                <div class="col-md-4">
                    <div class="card mt-5 shadow">
                        <div class="card-body">
                            <div class="text-center">
                                <span class="bi bi-check-circle text-success" style="font-size: 8rem;"></span>
                            </div>
                            <h5 class="card-title text-center mb-0">Password Changed!</h5>
                            <div class="text-secondary text-center mt-0 mb-3">Your password has been changed successfully!</div>
                            <div class="d-grid mb-3">
                                <a href="login.php" class="btn btn-primary">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
   <?php
   /*<?php  ob_start();session_start();include ('1db.php');?>
<!-- get the session variables -->
<?php
$username = $_SESSION['username'];
$legitEmail = $_SESSION['email'];

// Check if the user is logged in
    if (empty($username)) {
        header("Location: login.php");
        exit;
    }

// Handle the logout process
if (isset($_GET['logout'])) {
    // Destroy the session and all its data
    session_destroy();
    // Redirect the user to the login page
    header("Location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="?logout=true">Logout</a>
    <?php
    // Display errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Post the form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            $email = trim($_POST['email']);
    
            // Check if the email is empty
            if (empty($email)) {
                echo 'Please enter your email. <br>
                <form method="POST" action="">
                <label for="email">Please enter your registered email again:</label>
                <input type="text" id="email" name="email" required>
                <input type="submit" name="submit" value="Submit">
                </form>';
            } elseif ($email != $legitEmail) {
                echo 'The email you entered is not the same as the registered email, Please try again. <br>
                <form method="POST" action="">
                <label for="email">Please enter your registered email again:</label>
                <input type="text" id="email" name="email" required>
                <input type="submit" name="submit" value="Submit">
                </form>';
            } else {
                // Display the new password input field
                    echo '
                    <form method="POST" action="">
                        <input type="hidden" name="email" value="' . $email . '">
                        <label for="new_password">New Password:</label>
                        <input type="password" id="new_password" name="new_password" required>
                        <input type="submit" value="Change Password">
                    </form>';
            }
    // Update the password
        } else if (isset($_POST['new_password'])) {
            $email = trim($_POST['email']);
            $newPassword =trim($_POST['new_password']);
    
            // Update the password in the database
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE user SET password = '$hashedPassword' WHERE userEmail = '$email'";
    
            if ($conn->query($sql) === TRUE) {
                echo "Password changed successfully!";
                header("Location: login.php");
                exit();
            } else {
                echo "Error updating password: " . $conn->error;
            }
        }
    } else {
        // Display the email input field
        echo '
        <form method="POST" action="">
            <label for="text">Please enter your registered email</label>
            <input type="text" id="email" name="email" required>
            <input type="submit" name="submit" value="Submit">
        </form>

        ';
    }
 $conn->close();
    ?>
</body>
</html>*/
   ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>