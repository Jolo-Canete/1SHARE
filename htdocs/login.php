<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <style>
    </style>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login/signup</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        <?php include "1db.php"; ?>
        <header>
            <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
                <div class="container">
                    
                <a class="navbar-brand" href="login.php" style="margin-left: 50px;">
            <img src="picture/logo.png" alt="I S H A R E logo" style="height: 30px; ">
            I S H A R E
        </a>
                </nav>
        </header>

        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <h1><b>            
                                <p class="text-center">I S H A R E</p>
                            </b></h1>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow p-3 mb-5 bg-body rounded-4">
                        <div class="card-body">
                            <div class="mb-3">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <!--- Login --->
                                <label for="email_address">Email Address</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">@</span>
                                    <input type="text" class="form-control" name="userEmail" placeholder="Email Address or Mobile Number" aria-label="Email Address or Mobile Number" aria-describedby="addon-wrapping">

                                </div>
                                <div class="mb-3"></div>
                                <label for="email_address">Password</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">
                                        <div class="bi-person-fill"></div>
                                    </span>
                                    <input type="password" class="form-control" name="userPassword" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">
                                </div>
                                <div class="mb-3"></div>
                                <div class="d-grid gap-2">
                                    <button id="loginButton" class="btn btn-primary" type="submit" name="login" value="login">Login</button>
                                    <script>
                                        // Function to redirect to the specified link when the button is clicked
                                        document.getElementById('loginButton').addEventListener('click', function() {
                                            // Replace 'your-link-here' with the actual URL you want to redirect to
                                            window.location.href = 'home.php';
                                        });
                                    </script>
                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="button" class="btn btn-link">Forgot Password?</button>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-success d-grid gap-2 col-6 mx-auto" data-bs-toggle="modal" data-bs-target="#sign_up">
                                    Sign Up
                                </button>
                                <!--- Sign Up --->
                                <div class="modal fade" id="sign_up" tabindex="-1" aria-labelledby="sign_up" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark text-light">
                                                <h5 class="modal-title text-light" id="sign_up">Sign Up</h5>

                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="first_name" class="form-label">First Name</label>
                                                            <input type="text" class="form-control" placeholder="First name" id="first_name" name="first_name" aria-label="First name">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="middle_name" class="form-label">Middle Name</label>
                                                        <input type="text" class="form-control" placeholder="Middle name" id="middle_name" name="middle_name" aria-label="Middle name">
                                                    </div>
                                                    <div class="col">
                                                        <label for="last_name" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" placeholder="Last name" id="last_name" name="last_name" aria-label="Last name">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="purok" class="form-label">Purok</label>
                                                            <input type="text" class="form-control" id="purok" placeholder="Enter purok" id="purok" name="purok" aria-label="Enter purok">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="zone" class="form-label">Zone</label>
                                                        <input type="text" class="form-control" id="zone" name="zone" placeholder="Enter zone" aria-label="Enter zone">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="mobile_number" class="form-label">Mobile Number</label>
                                                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter mobile number" aria-label="Enter mobile number">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email_address">Email Address</label>
                                                        <div class="input-group flex-nowrap">
                                                            <span class="input-group-text" id="addon-wrapping">@</span>
                                                            <input type="text" class="form-control" placeholder="Email Address or Mobile Number" name="email" aria-label="Email Address or Mobile Number" aria-describedby="addon-wrapping">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="username" name="username" placeholder="Create your own username" aria-label="Create a new password" >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="new_password" class="form-label">New Password</label>
                                                            <input type="password" class="form-control" id="new_password" name="password1" placeholder="Create a new password" aria-label="Create a new password">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="confirm_new_password" class="form-label">Confirm New Password</label>
                                                            <input type="password" class="form-control" id="confirm_new_password" name="password2" placeholder="Confirm new password" aria-label="Confirm new password">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="confirm_SignUp" class="form-label" >By clicking Sign Up, you agree to our <a href="Terms & privacy/terms_condition.html">Terms and Condition,</a> and <a href=""> Privacy Policy.</a> You may wait for the Confirmation of your account through your local SK Chairman.</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success d-grid gap-2 col-6 mx-auto" name="signup" type="submit" value="sign_up">Sign Up</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>

                                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
    <!-- Create database first before operating -->
    <?php
    //  Login System
    // Check errors
    ini_set('display_errors', 1);
        // Form Submission

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['signup'])) {
                // Gather the Input data
                $first_name = trim($_POST['first_name']);
                $middle_name = trim($_POST['middle_name']);
                $last_name = trim($_POST['last_name']);
                $purok = trim($_POST['purok']);
                $zone = trim($_POST['zone']);
                $mobile_number = trim($_POST['mobile_number']);
                $email = trim($_POST['email']);
                $username = trim($_POST['username']);
                $password1 = trim($_POST['password1']);
                $password2 = trim($_POST['password2']);
            
                // Capture the correct time and date
                $dateJoined = date('Y-m-d H:i:s');
            
                // Check if password matched
                if ($password1 !== $password2) {
                    echo 'Password does not match';
                } else {
                    // rename the password
                    $default_password = password_hash($password1, PASSWORD_DEFAULT);
            
                    // Start a transaction
                    $conn->begin_transaction();
            
                    // Insert into user table
                    $sql_user = "INSERT INTO user (firstName, middleName, lastName, contactNumber, zone, purok, dateJoined, userEmail, username, password) VALUES ('$first_name', '$middle_name', '$last_name', '$mobile_number', '$zone', '$purok', '$dateJoined', '$email', '$username', '$default_password')";
            
                    if ($conn->query($sql_user) === TRUE) {
                        $conn->commit();
                        echo '<script>alert("You have successfully Signed up <b>'. $first_name .'</b>"); window.location.href = "loading.php"; </script>';
                    } else {
                        // Rollback the transaction if there is an error in the first query
                        $conn->rollback();
                        echo 'Error: ' . $sql_user . '<br>' . $conn->error;
                    }
                }
            }
            
            // Login form
            if (isset($_POST['login'])) {
                $username = trim($_POST['userEmail']);
                $password = trim($_POST['userPassword']);
            
                // Prepare the MySQL query
                $sql = "SELECT * FROM user WHERE username = '$username'";
                $result = $conn->query($sql);
                
                // og ang piste mo palpak
                if ($result === false) {
                    echo "Error executing the query: " . $conn->error;
                    return;
                }
            
                // Check if the user exists and the password is correct
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $stored_password = $row["password"];
            
                    // Verify the password
                    if (password_verify($password, $stored_password)) {
                        // Login successful, redirect to the home page
                        echo '<script>alert("You have successfully logged in '. $username .'"); window.location.href = "home.php"; </script>';
                        exit();
                    } else {
                        // Invalid password
                        echo "Invalid email or password. <br>";
                       
                    }
                } else {
                    // User not found
                    echo "User not found.";
                }
            }
            
            
        
        }

        
        
        ?>
<?php ob_end_flush(); ?> 
</body>

</html>