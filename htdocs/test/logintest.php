<?php 
if (isset($_POST['login'])) {
    $login = trim($_POST['Lgn_Username']);
    $password = trim($_POST['Lgn_Password']);

    if (empty($login) || empty($password)) { 
        echo "<div class='alert alert-warning mt-3'>Username or email, and password are required.</div>" ;
        return;
    }

    try {
        // Prepare the MySQL query
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT * FROM user WHERE userEmail = '$login'";
        } else {
            $sql = "SELECT * FROM user WHERE username = '$login'";
        }

        $result = $conn->query($sql);

        // Check if the user exists and the password is correct
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedPassword = $row["password"];
            $userId = $row["userID"]; 

            // Verify the password
            if (password_verify($password, $storedPassword)) {
                // Login successful, store user information in the session
                $_SESSION['user_id'] = $userId;
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['userEmail'];
                // Login successful, redirect to the home page
                header('Location: loading.php');
            } else {
                // Invalid password
                echo '
                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill"/>
                        </svg>
                </svg>
                        <div>
                            Try to remember your password again. If not, try to reset your password.
                        </div>
                    </div>
                ';
             return;
            }
           
        } else {
            // User not found
            echo '
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill"/>
                    </svg>
            </svg>
                    <div>
                        User not Found.
                    </div>
                </div>
            ';
            return;
        }
    } catch (Exception $e) {
        // Log the error
        error_log('Error during login: ' . $e->getMessage());
        echo '
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill"/>
                </svg>
        </svg>
                <div>
                    An error occurred during login. Please try again later.
                </div>
            </div>
        ';
    }
}




?>