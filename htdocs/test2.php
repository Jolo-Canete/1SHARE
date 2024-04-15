<!doctype html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

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

    <main>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <p class="h1 text-center mb-3"><b>I S H A R E</b></p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow p-3 mb-5 bg-body rounded-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

                                    <!--- Login --->
                                    <label for="admin_username"><b>Username</b></label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input type="text" class="form-control" name="admin_username" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">

                                    </div>
                                    <div class="mb-3"></div>
                                    <label for="admin_password"><b>Password</b></label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">
                                            <div class="bi-lock-fill"></div>
                                        </span>
                                        <input type="password" class="form-control" name="admin_password" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">
                                    </div>
                                    <div class="mb-3"></div>
                                    <div class="d-grid gap-2">
                                        <button id="admin_login" class="btn btn-primary" type="submit" name="admin_login" value="admin_login">Login</button>

                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-link" name="admin_forgotpassword">Forgot Password?</button>
                                    </div>
                                    <hr>
                                    <button type="button" class="btn btn-success d-grid gap-2 col-6 mx-auto" data-bs-toggle="modal" data-bs-target="#admin_sign_up">
                                        Sign Up
                                    </button>

                                    <!--- Sign Up --->
                                    <div class="modal fade" id="admin_sign_up" tabindex="-1" aria-labelledby="sign_up" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-light">
                                                    <h5 class="modal-title text-light" id="sign_up">Sign Up</h5>
                                                </div>

                                                <!--- Modal Sign Up --->
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="admin_first_name" class="form-label"><b> First Name</b> <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" placeholder="First name" id="admin_first_name" name="admin_first_name" aria-label="First name">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <label for="middle_name" class="form-label"><b>Middle Name</b></label>
                                                            <input type="text" class="form-control" placeholder="Middle name" id="middle_name" name="middle_name" aria-label="Middle name">
                                                        </div>
                                                        <div class="col">
                                                            <label for="last_name" class="form-label"><b>Last Name</b> <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Last name" id="last_name" name="last_name" aria-label="Last name">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="admin_barangay_position" class="form-label"><b>Barangay Position</b> <span class="text-danger">*</span></label>
                                                                <select class="form-select" aria-label="Select your barangay position" name="admin_barangay_position">
                                                                    <option selected>Select your barangay position</option>
                                                                    <option value="1">Barangay SK Chairman</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="admin_username" class="form-label"><b>Username</b> <span class="text-danger">*</span></label>
                                                                <input type="text" name="admin_username" class="form-control" id="username" placeholder="Create your own username" aria-label="Create your own username">
                                                                <div id="username-error" class="text-danger" style="display: none;"></div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="admin_new_password" class="form-label"><b>New Password</b> <span class="text-danger">*</span></label>
                                                                <div class="input-group mb-3">
                                                                    <input type="password" class="form-control" id="admin_new_password" name="admin_new_password" placeholder="Create a new password" aria-label="Create a new password" minlength="8">
                                                                    <button class="btn btn-outline-secondary bi bi-eye-slash" type="button" id="see_admin_new_password" onclick="togglePasswordVisibility('admin_new_password', 'see_admin_new_password')"></button>
                                                                </div>
                                                                <div id="password-requirement-error" class="text-danger" style="display: none;">Password must be at least 8 characters long.</div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="confirm_admin_password" class="form-label"><b>Confirm New Password</b> <span class="text-danger">*</span></label>
                                                            <div class="input-group mb-3">
                                                                <input type="password" class="form-control" id="confirm_admin_password" name="confirm_admin_password" placeholder="Confirm new password" aria-label="Confirm new password">
                                                                <button class="btn btn-outline-secondary bi bi-eye-slash" type="button" id="see_confirmed_admin_password" onclick="togglePasswordVisibility('confirm_admin_password', 'see_confirmed_admin_password')"></button>
                                                            </div>
                                                            <div id="confirm-password-error" class="text-danger" style="display: none;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success d-grid gap-2 col-6 mx-auto" name="admin_sign_up" value="admin_sign_up" id="admin_sign_up">Sign Up</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>