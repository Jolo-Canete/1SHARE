<?php ob_start(); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--- Bootstrap Icons --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
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
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  enctype="multipart/form-data">
                                <!--- Login --->
                                <label for="email_address"><b>Email Address</b></label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">@</span>
                                    <input type="text" class="form-control" name="userEmail" placeholder="Email Address or Mobile Number" aria-label="Email Address or Mobile Number" aria-describedby="addon-wrapping">

                                </div>
                                <div class="mb-3"></div>
                                <label for="email_address"><b>Password</b></label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">
                                        <div class="bi-lock-fill"></div>
                                    </span>
                                    <input type="password" class="form-control" name="userPassword" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">
                                </div>
                                <div class="mb-3"></div>
                                <div class="d-grid gap-2">
                                    <button id="loginButton" class="btn btn-primary" type="submit" name="login" value="login">Login</button>

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
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark text-light">
                                                <h5 class="modal-title text-light" id="sign_up">Sign Up</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="first_name" class="form-label"><b> First Name</b></label>
                                                            <input type="text" class="form-control" placeholder="First name" id="first_name" name="first_name" aria-label="First name">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="middle_name" class="form-label"><b>Middle Name</b></label>
                                                        <input type="text" class="form-control" placeholder="Middle name" id="middle_name" name="middle_name" aria-label="Middle name">
                                                    </div>
                                                    <div class="col">
                                                        <label for="last_name" class="form-label"><b>Last Name</b></label>
                                                        <input type="text" class="form-control" placeholder="Last name" id="last_name" name="last_name" aria-label="Last name">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="purok" class="form-label"><b>Purok</b></label>
                                                            <select class="form-select" aria-label="Select your purok" name="purok">
                                                                <option selected>Select your purok</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="zone" class="form-label"><b>Zone</b></label>
                                                        <select class="form-select" aria-label="Select your zone" name ="zone">
                                                            <option selected>Select your zone</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="mobile_number" class="form-label"><b>Mobile Number</b></label>
                                                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter mobile number" aria-label="Enter mobile number">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email_address" class="form-label"><b>Email Address</b></label>
                                                        <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Enter your email address" aria-label="Enter your email address" >
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label"><b>Username</b></label>
                                                        <input type="text" class="form-control" id="username" name="username" placeholder="Create your own username" aria-label="Create your own unsername">
                                                    </div>
                                                    <label for="new_password" class="form-label"><b>New Password</b></label>
                                                    <div class="input-group mb-3">
                                                        <input type="password" class="form-control" id="new_password" name="password1" placeholder="Create a new password" aria-label="Create a new password" >
                                                        <button class="btn btn-outline-secondary bi bi-eye" type="button" id="see_new_password"></button>
                                                    </div>
                                                    <label for="confirm_new_password" class="form-label"><b>Confirm New Password</b></label>
                                                    <div class="input-group mb-3">
                                                        <input type="password" class="form-control" id="confirm_new_password" name="password2" placeholder="Confirm new password" aria-label="Confirm new password" >
                                                        <button class="btn btn-outline-secondary bi bi-eye" type="button" id="see_confirmed_password"></button>
                                                    </div>
                                                    <label for="" class="form-label"><b>Proof of Residency</b></label>
                                                    <div class="mb-3">
                                                        <div class="input-group mb-3">
                                                            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" accept="image/*">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="confirm_SignUp" class="form-label">By clicking the <span class="badge text-bg-success">Sign Up</span> button, you agree to our <a href="Terms & privacy/terms_condition.html">Terms and Condition</a> and <a href=""> Privacy Policy.</a> You may wait for the confirmation of your account through your local SK Chairman.</label>
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
        $email = trim($_POST['email_address']);
        $username = trim($_POST['username']);
        $password1 = trim($_POST['password1']);
        $password2 = trim($_POST['password2']);
    
        if (empty($first_name) || empty($middle_name) || empty($last_name) || empty($purok) || empty($zone) || empty($mobile_number) || empty($email) || empty($username) || empty($password1) || empty($password2)) {
            echo "<div class='alert alert-warning mt-3'>Error: Signup Failed is incomplete.</div>" ;
            return;
        }
    
        // Upload Image to the different directory
        $targetDirectory = "verify/";
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }
    
        // Get the uploaded image information
        $uploadedImagePath = $_FILES['fileToUpload']['tmp_name'];
        $uploadedImageName = $_FILES['fileToUpload']['name'];
    
        // Move the uploaded file to the target directory
        $targetFile = $targetDirectory . basename($uploadedImageName);
        if (move_uploaded_file($uploadedImagePath, $targetFile)) {
            echo "<div class='alert alert-success mt-3'>The file " . basename($uploadedImageName) . " has been uploaded.</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Failed to move uploaded file.</div>";
            return;
        }
    
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
    
            // Insert into user table without the verifyImage_path
            $sql_user = "INSERT INTO user (firstName, middleName, lastName, contactNumber, zone, purok, dateJoined, userEmail, username, password) VALUES ('$first_name', '$middle_name', '$last_name', '$mobile_number', '$zone', '$purok', '$dateJoined', '$email', '$username', '$default_password')";
    
            if ($conn->query($sql_user) === TRUE) {
                // Get the last inserted ID
                $last_id = $conn->insert_id;
    
                // Rename the uploaded file to its corresponding auto-incremented primary key
                $newFileName = $last_id . '.' . pathinfo($uploadedImageName, PATHINFO_EXTENSION);
                rename($targetFile, $targetDirectory . $newFileName);
    
                // Update the verifyImage_path in the database
                $sql_update = "UPDATE user SET verifyImage_path = '$newFileName' WHERE `userID` = $last_id";
                echo "$sql_update";
                $conn->query($sql_update);
    
                $conn->commit();
                echo '<script>alert("You have successfully Signed up ' . $first_name . '"); window.location.href = "loading.php"; </script>';
            } else {
                // Rollback the transaction if there is an error in the first query
                $conn->rollback();
                echo 'Error: ' . $sql_user . '<br>' . $conn->error;
            }
        }
    }
}

    // Login form
    if (isset($_POST['login'])) {
        $username = trim($_POST['userEmail']);
        $password = trim($_POST['userPassword']);

    if (empty($username) || empty($password)) { 
        echo "<div class='alert alert-warning mt-3'>username or password is empty.</div>" ;
        return;
    }

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
            $user_id = $row["userID"]; 

            // Verify the password
            if (password_verify($password, $stored_password)) {
                 // Login successful, store user information in the session
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
                // Login successful, redirect to the home page
                header('Location: loading.php');
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
 



?>
<?php ob_end_flush(); ?>
</body>

</html>