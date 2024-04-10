<?php ob_start(); session_start(); include('1db.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Sign Up</title>
<style>
/* Hide the button from input number */
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--- Bootstrap Icons --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>


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
                                    <input type="text" class="form-control" name="Lgn_Username" placeholder="Email Address or Mobile Number" aria-label="Email Address or Mobile Number" aria-describedby="addon-wrapping">

                                </div>
                                <div class="mb-3"></div>
                                <label for="password"><b>Password</b></label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">
                                        <div class="bi-lock-fill"></div>
                                    </span>
                                    <input type="password" class="form-control" name="Lgn_Password" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">
                                </div>
                                <div class="mb-3"></div>
                                <div class="d-grid gap-2">
                                    <button id="loginButton" class="btn btn-primary" type="submit" name="login" value="login">Login</button>

                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-link" name="forgetPass">Forgot Password?</button>
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
                                                        <label for="mobile_number" class="form-label"><b>Date of Birth</b></label>
                                                        <input type="date" class="form-control" id="birthDate" name="birthDay" placeholder="" aria-label="Enter Date of Birth">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="mobile_number" class="form-label"><b>Mobile Number</b></label>
                                                        <input type="number" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter mobile number" aria-label="Enter mobile number">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email_address" class="form-label"><b>Email Address</b></label>
                                                        <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Enter your email address" aria-label="Enter your email address" >
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label"><b>Username</b></label>
                                                        <input type="text" name="username"  class="form-control" id="username" placeholder="Create your own username" aria-label="Create your own username">
                                                        <div id="username-error" class="text-danger" style="display: none;"></div>
                                                    </div>
                                                    <div class="mb-3">
                                                    <label for="new_password" class="form-label"><b>New Password</b></label>
                                                    <div class="input-group mb-3">
                                                        <input type="password" class="form-control" id="new_password" name="SgnUp_Password_1" placeholder="Create a new password" aria-label="Create a new password" minlength="8">
                                                        <button class="btn btn-outline-secondary bi bi-eye-slash" type="button" id="see_new_password" onclick="togglePasswordVisibility('new_password', 'see_new_password')"></button>
                                                    </div>
                                                    <div id="password-requirement-error" class="text-danger" style="display: none;">Password must be at least 8 characters long.</div>  
                                                    </div>
                                                    </div>
                                                    <div class="mb-3">
                                                    <label for="confirm_new_password" class="form-label"><b>Confirm New Password</b></label>
                                                    <div class="input-group mb-3">
                                                        <input type="password" class="form-control" id="confirm_new_password" name="SgnUp_Password_2" placeholder="Confirm new password" aria-label="Confirm new password" >
                                                        <button class="btn btn-outline-secondary bi bi-eye-slash" type="button" id="see_confirmed_password" onclick="togglePasswordVisibility('confirm_new_password', 'see_confirmed_password')"></button>
                                                    </div>
                                                    <div id="confirm-password-error" class="text-danger" style="display: none;"></div>
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
                                            
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success d-grid gap-2 col-6 mx-auto" name="signup" value="sign_up" id="signup">Sign Up</button>
                                            </div>
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
    if (isset($_POST['forgetPass'])) {
        $username = trim($_POST['Lgn_Username']);
        $password = trim($_POST['Lgn_Password']);
    
        if (empty($username)) { 
            echo "<div class='alert alert-warning mt-3'>Please enter your username.</div>" ;
            return;
        }
    
            // Prepare the MySQL query
            $sql = "SELECT * FROM user WHERE username = '$username'";
            $result = $conn->query($sql);
    
            // If hindi maka connect si cute user >.< sa database :< 
            if ($result === false) {
                echo "Error executing the query: " . $conn->error;
                return;
            }
    
            // Check if the user exist
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $user_id = $row["userID"]; 

                // store the variables and session it
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['userEmail'];

                // Username = True, direct to ForgerPassword.php
                    header("Location: forgetPassword.php");
                    exit();
                } else {
                // User not found
                    echo '<div class="alert alert-danger" role="alert">
                    User not Found.
                  </div>';
            }
        }
    }


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
        $password1 = trim($_POST['SgnUp_Password_1']);
        $password2 = trim($_POST['SgnUp_Password_2']);
        $birthDay = date('Y-m-d', strtotime($_POST['birthDay']));
        $status = "Unverified";

    
        if (empty($first_name) || empty($middle_name) || empty($last_name) || empty($purok) || empty($zone) || empty($mobile_number) || empty($email) || empty($username) || empty($password1) || empty($password2) || empty($birthDay)) {
            echo "<div class='alert alert-warning mt-3'>Error: Signup Failed is incomplete.</div>" ;
            return;
        }

        // If the user is already taken
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<div class="alert alert-danger mt-3">Username is already taken.</div>';
            return;
        }

        // If the password is less than 8 characters
        if (strlen($password1) < 8) {
            echo '<div class="alert alert-danger mt-3">Password must be at least 8 characters long.</div>';
            return;
        }

        // // If the email is already taken
        // $sql = "SELECT * FROM user WHERE userEmail = '$email'";
        // $result = $conn->query($sql);
        // if ($result->num_rows > 0) {
        //     echo '<div class="alert alert-danger mt-3">Email is already taken.</div>';
        //     return;
        // }

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
        if (!move_uploaded_file($uploadedImagePath, $targetFile)) {
            echo "<div class='alert alert-danger mt-3'>Failed to move uploaded file.</div>";
            return;
        }
    
        // Capture the correct time and date
        $dateJoined = date('Y-m-d H:i:s');
    
        // Check if password matched
        if ($password1 !== $password2) {
            echo '<div class="alert alert-danger mt-3">Password does not match.</div>';
        } else {
            // rename the password
            $default_password = password_hash($password1, PASSWORD_DEFAULT);
    
            // Start a transaction
            $conn->begin_transaction();
    
            // Insert into user table without the verifyImage_path
            $sql_user = "INSERT INTO user (firstName, middleName, lastName, contactNumber, zone, purok, dateJoined, userEmail, username, password, Birthday, status) VALUES ('$first_name', '$middle_name', '$last_name', '$mobile_number', '$zone', '$purok', '$dateJoined', '$email', '$username', '$default_password', '$birthDay', '$status')";
    
            if ($conn->query($sql_user) === TRUE) {
                // Get the last inserted ID
                $last_id = $conn->insert_id;
    
                // Rename the uploaded file to its corresponding auto-incremented primary key
                $newFileName = $last_id . '.' . pathinfo($uploadedImageName, PATHINFO_EXTENSION);
                rename($targetFile, $targetDirectory . $newFileName);
    
                // Update the verifyImage_path in the database
                $sql_update = "UPDATE user SET verifyImage_path = '$newFileName' WHERE `userID` = $last_id";
                $conn->query($sql_update);
    
                $conn->commit();
                echo ' <div class="alert alert-success mt-">User has been recorded successfully you can now Log in.</div>,';
            } else {
                // Rollback the transaction if there is an error in the first query
                $conn->rollback();
                echo 'Error: ' . $sql_user . '<br>' . $conn->error;
            }
        }
    }


    // Login form
    if (isset($_POST['login'])) {
        $username = trim($_POST['Lgn_Username']);
        $password = trim($_POST['Lgn_Password']);

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
            $_SESSION['email'] = $row['userEmail'];
                // Login successful, redirect to the home page
                echo '<script>alert("You have successfully logged in ' . $username . '"); window.location.href = "home.php"; </script>';
                exit();
            } else {
                // Invalid password
                echo '
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </symbol>
                        </svg>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                        Relax, try to remember your password again. If not try to reset your password.
                        </div>
                    </div> ';
            }
        } else {
            // User not found
            echo '
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
            </svg>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                User not Found.
            </div>
        </div>
            ';
        }
    }
 



?>

<!-- Function for Password -->
<script>
// Function for Lacking password characters
    const passwordInput = document.getElementById('new_password');
    const passwordRequirementError = document.getElementById('password-requirement-error');

    passwordInput.addEventListener('input', function() {
        if (passwordInput.value.length < 8) {
            passwordRequirementError.style.display = 'block';
            passwordRequirementError.textContent = 'Password must be at least 8 characters long.';
        } else {
            passwordRequirementError.style.display = 'none';
        }
    
    });


// Function for Show password
    function showPassword() {
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

// Function for show password in confirm password
function togglePasswordVisibility(inputId, buttonId) {
  const passwordInput = document.getElementById(inputId);
  const passwordButton = document.getElementById(buttonId);

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    passwordButton.classList.remove('bi-eye-slash');
    passwordButton.classList.add('bi-eye');
  } else {
    passwordInput.type = 'password';
    passwordButton.classList.remove('bi-eye');
    passwordButton.classList.add('bi-eye-slash');
  }
}
    

// If the password is not matched

    const confirmPasswordInput = document.getElementById('confirm_new_password');

    // Get the error message container
    const errorMessageContainer = document.getElementById('confirm-password-error');

// Add an event listener to the confirm password input field
confirmPasswordInput.addEventListener('input', () => {
  // Get the password and confirm password values
  const password = passwordInput.value;
  const confirmPassword = confirmPasswordInput.value;

  // Check if the password and confirm password match
  if (password !== confirmPassword) {
    // Display an error message
    errorMessageContainer.textContent = 'The password and confirm password fields must match.';
    errorMessageContainer.style.display = 'block';
    confirmPasswordInput.classList.add('is-invalid');
  } else {
    // Hide the error message
    errorMessageContainer.style.display = 'none';
    confirmPasswordInput.classList.remove('is-invalid');
  }
    });


// If the username is already taken print an error message
async function checkUsernameAvailability(username) {
    try {
        // Make an AJAX request to the server to check if the username is available
        const response = await fetch('login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ username })
        });

        const data = await response.json();

        // If the response indicates the username is available, return true
        return data.available;
    } catch (error) {
        console.error(error);
        return false;
    }
}
</script>
<?php ob_end_flush(); ?>






</body>

</html>