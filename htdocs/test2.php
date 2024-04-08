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
                    <button type="button" class="btn btn-primary me-2">Login</button>
                    <button type="button" class="btn btn-success">Sign-up</button>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">

            <!--- if --->
            <div class="col-md-4">
                <div class="card mt-5 shadow">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="htdocs/picture/logo.png" alt="I S H A R E Logo" class="logo">
                        </div>
                        <h5 class="card-title text-center mb-0">Forgot Password?</h5>
                        <div class="text-secondary text-center mt-0 mb-3">Please enter your registered email.</div>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="email" class="form-label"><b>Email address</b></label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--- elseif --->
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
                                <input type="email" class="form-control is-invalid" id="email" placeholder="Enter your email" required>
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--- else --->
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
                                <input type="password" class="form-control" id="new_password" placeholder="Enter your new password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_new_password" class="form-label"><b>Confirm New Password</b></label>
                                <input type="password" class="form-control" id="confirm_new_password" placeholder="Confirm your new password" required>
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-success">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--- Successful --->
            <div class="col-md-4">
                <div class="card mt-5 shadow">
                    <div class="card-body">
                        <div class="text-center">
                            <span class="bi bi-check-circle text-success" style="font-size: 8rem;"></span>
                        </div>
                        <h5 class="card-title text-center mb-0">Password Changed!</h5>
                        <div class="text-secondary text-center mt-0 mb-3">Your password has been changed successfully!</div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>