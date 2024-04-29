<?php ob_start(); ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--- Bootstrap Icon --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        input[type="text"],
        input[type="password"] {
            width: 200px;
            /* Set the width of text and password inputs */
        }
    </style>
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
            <div class="col-md-4 col-12">
                <h1 class="text-center fw-bold">I S H A R E</h1>
                <div class="card shadow p-3 mb-5 bg-body rounded-4 border-0">
                    <div class="card-body">
                        <form method="post" action="">

                            <!--- Login --->
                            <label for="username"><b>Username</b></label>
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" aria-label="Enter your username" aria-describedby="addon-wrapping">
                            </div>
                            <label for="password"><b>Password</b></label>
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Enter your password" aria-label="Enter your password" aria-describedby="addon-wrapping">
                            </div>
                            <div class="d-grid gap-2 mb-3">
                                <button id="loginButton" class="btn btn-primary" type="submit" name="login" value="Enter">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);

        $sql = "SELECT * FROM admin WHERE adUsername = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stored_password = $row["adPassword"];

            // Compare the entered password with the stored password
            if ($password == $stored_password) {
                // Passwords match, login successful
                echo '<script>alert("You have successfully logged in ' . $username . '"); window.location.href = "home.php"; </script>';
                exit();
            } else {
                // Invalid password
                echo "Invalid username or password.";
            }
        } else {
            // User not found
            echo "User is not found.";
        }
    }

    $conn->close();
    ob_end_flush();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>