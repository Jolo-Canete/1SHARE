<?php  ob_start();session_start();include ('1db.php');?>
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


    // Check errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>


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
            max-width: 90px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <a href="login.php" class="navbar-brand d-flex align-items-center">
                <img src="picture/logo.png" alt="I-SHARE Logo" style="height: 30px;">
                <span class="ms-2">I S H A R E</span>
            </a>
            <div class="text-center text-md-end">
                <?php if(empty($username)) { ?>
                    <button type="button" class="btn btn-primary me-2">Login</button>
                    <button type="button" class="btn btn-success">Sign-up</button>
                <?php } else { ?>
                    <a href="?logout=true" class="btn btn-danger m-3 w-100 w-md-auto">Back To Login</a>
                <?php } ?>
            </div>
        </div>
    </div>
</header>



        <?php
        // Display errors
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL); ?>

        <!--  Post the form -->
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['submit'])) {
                $email = trim($_POST['email']); ?>
        
                <!--  Check if the email is empty -->
            <?php if (empty($email)) { ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card mt-5 shadow">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="picture/logo.png" alt="I S H A R E Logo" class="logo">
                                    </div>
                                    <!-- Email input UI -->
                                    <form method="POST" action="">
                                        <div class="mb-3">
                                            <h5 class="card-title text-center mb-0">Forget Password?</h5>
                                            <label for="email" class="form-label"><b>Email Adress</b></label>
                                            <input type="text" class="form-control is-invalid" id="email" name="email" placeholder="example@gmail.com">
                                        </div>
                                    <!-- Submit Button -->
                                    <div class="d-grid mb-3">
                                        <input type="submit" class="btn btn-success" name="submit" value="Submit">
                                    </div>
                                    </form>
                                    <div class="text-danger text-center mt-0 mb-3">Please enter your email address.</div>
                    </div>
                </div>
            <?php } elseif ($email != $legitEmail) { ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="card mt-5 shadow">
                                    <div class="card-body">
                                        <div class="text-center">
                                        <img src="picture/logo.png" alt="I S H A R E Logo" class="logo">
                                    </div>
                                    <!-- Email input UI -->
                                    <form method="POST" action="">
                                        <div class="mb-3">
                                            <h5 class="card-title text-center mb-0">Forget Password?</h5>
                                            <label for="email" class="form-label"><b>Email Address</b></label>
                                            <input type="text" class="form-control is-invalid" id="email" name="email" placeholder="Enter your Email, again">
                                        </div>
                                        <!-- Submit button -->
                                    <div class="d-grid mb-3">
                                        <input type="submit" class="btn btn-success" name="submit" value="Submit">
                                    </div>
                                    </form>
                                    <div class="text-danger text-center mt-0 mb-3">The email you entered is not the same as the registered email. Please try again.</div>
                                    </div>
                            </div>
                        </div>    
            <?php } else { ?>
            <!-- Display the new password input field -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card mt-5 shadow">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="picture/logo.png" alt="I S H A R E Logo" class="logo">
                                </div>
                                <!-- Password Input UI -->
                                <h5 class="card-title text-center mb-0">Reset Password</h5>
                                <div class="text-secondary text-center  mt-0 mb-3">Create new password</div>
                                <form method="POST" action="">
                                    <div class="mb-3">
                                        <input type="hidden"  name="email" value="<?php echo $email;?>">
                                        <label for="new_password" class="form-label"><b>New Password</b></label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter your new password" required>
                                            <span class="input-group-text">
                                                <i class="bi bi-eye-slash" id="togglePassword" onclick="niggaEye()"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Submit button -->
                                    <div class="d-grid mb-3">
                                        <input type="submit" class="btn btn-success" name="Submit_password" value="Reset Password">
                                    </div>
            <?php } ?>
        <!--  Update the password -->
            <?php } else if (isset($_POST['Submit_password'])) {
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
            ?>
    <?php } else { ?>
            <!--  Display the email input field -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card mt-5 shadow">
                            <div class="card-body">
                                <!-- Logo index -->
                                <div class="text-center">
                                    <img src="picture/logo.png" alt="I S H A R E Logo" class="logo">
                                </div>
                                <!-- Email input UI -->
                                <form method="POST" action="">
                                <div class="mb-3">
                                    <h5 class="card-title text-center mb-0">Forget Password?</h5>
                                    <label for="email" class="form-label"><b>Email Address</b></label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                                </div>
                                
                                <!-- Submit button -->
                                <div class="d-grid mb-3">
                                    <input type="submit" class="btn btn-success" name="submit" value="Submit">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php  }  $conn->close(); ?>
</body>
</html>

</form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Show Password script -->
    <script>
        function niggaEye() {
    var passwordInput = document.getElementById('new_password');
    var togglePasswordIcon = document.getElementById('togglePassword');

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        togglePasswordIcon.classList.remove('bi-eye-slash');
        togglePasswordIcon.classList.add('bi-eye');
    } else {
        passwordInput.type = "password";
        togglePasswordIcon.classList.remove('bi-eye');
        togglePasswordIcon.classList.add('bi-eye-slash');
    }
}
</script>

</body>

</html>