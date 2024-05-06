<?php
ob_start();
session_start();
include('1db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--- Bootstrap Icons --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <style>
        body {
            background-color: #3e3e42	;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .modal-footer {
            position: sticky;
            bottom: 0;
            background-color: #fff;
        }

        .modal-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: #fff;
        }
    </style>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <header>
        <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container">

                <a class="navbar-brand" href="login.php" style="margin-left: 50px;">
                    <img src="picture/logo.png" alt="web-logo" style="height: 30px; ">
                    I S H A R E
                </a>
        </nav>
    </header>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-4 col-12">
                <h1 class="text-center fw-bold" style="color: #f5f8fa;">ADMIN</h1>
                <div class="card shadow p-3 mb-5 bg-body rounded-4 border-0">
                    <div class="card-body">
                    
                    <form method="post" action="">

                            <!--- Login --->
                            <label for="email_address"><b>Username</b></label>
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control" name="Lgn_Username" placeholder="Phone Number or Username" aria-label="Email Address or Mobile Number" aria-describedby="addon-wrapping">
                            </div>
                            <label for="password"><b>Password</b></label>
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" class="form-control" id="Lgn_Password" name="Lgn_Password" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i id="togglePassword" class="bi bi-eye-fill"></i></span>
                                </div>
                             </div>
                            <div class="d-grid gap-2 mb-3">
                                <button id="loginButton" class="btn btn-primary" type="submit" name="login" value="login">Login</button>
                            </div>  
                            <div class="d-grid gap-3 mb-3">
                            <div id="alert_placeholder"></div>
                            </div>         
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- Php script to login into admin dashboard -->
<?php
// SERVER REQUEST METHOD
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // LOGIN BUTTON
    if (isset($_POST['login'])) {
        $Lgn_Username = $_POST['Lgn_Username'];
        $Lgn_Password = $_POST['Lgn_Password'];
        
    // If the fields are empty
    if (empty($Lgn_Username) || empty($Lgn_Password)) { 
        echo "<script>
        var alertElement = document.createElement('div');
        alertElement.innerHTML = '<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">Please fill in all fields<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>';
        document.getElementById('alert_placeholder').appendChild(alertElement);
        
        setTimeout(function() {
            alertElement.remove();
        }, 3000);
        </script>";
        exit;
    }

        $sql = "SELECT * FROM admin WHERE adUsername = '$Lgn_Username' AND adPassword = '$Lgn_Password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $_SESSION['Lgn_Username'] = $Lgn_Username;
            $_SESSION['Lgn_Password'] = $Lgn_Password;
            header("location: admin/ad_dashboard.php");
        } else {
            echo "<script>
            var alertElement = document.createElement('div');
            alertElement.innerHTML = '<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">Invalid Username or Password<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>';
            document.getElementById('alert_placeholder').appendChild(alertElement);
            
            setTimeout(function() {
                alertElement.remove();
            }, 3000);
            </script>";

        }
    }
} 


?>


<!-- JS script for eye icon -->
<script>
    document.getElementById('togglePassword').addEventListener('click', function (e) {
    var passwordInput = document.getElementById('Lgn_Password');
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        e.target.classList.remove('bi-eye-fill');
        e.target.classList.add('bi-eye-slash-fill');
    } else {
        passwordInput.type = "password";
        e.target.classList.remove('bi-eye-slash-fill');
        e.target.classList.add('bi-eye-fill');
    }
});
</script>
</body>
</html>