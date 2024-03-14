<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container-box {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .card-img-top {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-title {
            font-weight: bold;
        }

        .card-text {
            color: #6c757d;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .total-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .total-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <?php include "nav.php"; ?>
    </header>

    <div id="content" class="content">
        <br>
        <h1 class="text-center mb-4"><i class="bi bi-cart-fill"></i> Cart</h1>
        <div class="container">
            <div class="container-box">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Cart Item 1 -->
                    <div class="col">
                        <div class="card">
                            <img src="picture/elmo.jpg" class="card-img-top" alt="Cart Item 1">
                            <div class="card-body">
                                <h5 class="card-title">Elmo</h5>
                                <p class="card-text"><i class="bi bi-tags-fill"></i> Category: Toys</p>
                                <p class="card-text"><i class="bi bi-card-text"></i> Item Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p class="card-text"><i class="bi bi-star-fill"></i> Condition: Like New</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Remove</button>
                                    <p class="card-text"><i class="bi bi-currency-dollar"></i> Price: $10.00</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item 2 -->
                    <div class="col">
                        <div class="card">
                            <img src="picture/elmo.jpg" class="card-img-top" alt="Cart Item 2">
                            <div class="card-body">
                                <h5 class="card-title">Elmo</h5>
                                <p class="card-text"><i class="bi bi-tags-fill"></i> Category: Toys</p>
                                <p class="card-text"><i class="bi bi-card-text"></i> Item Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p class="card-text"><i class="bi bi-star-fill"></i> Condition: Very New</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Remove</button>
                                    <p class="card-text"><i class="bi bi-currency-dollar"></i> Price: $15.00</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item 3 -->
                    <div class="col">
                        <div class="card">
                            <img src="picture/elmo.jpg" class="card-img-top" alt="Cart Item 3">
                            <div class="card-body">
                                <h5 class="card-title">Elmo</h5>
                                <p class="card-text"><i class="bi bi-tags-fill"></i> Category: Toys</p>
                                <p class="card-text"><i class="bi bi-card-text"></i> Item Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p class="card-text"><i class="bi bi-star-fill"></i> Condition: Like Old</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Remove</button>
                                    <p class="card-text"><i class="bi bi-currency-dollar"></i> Price: $5.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="total-container mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="total-label">Total:</p>
                    <p class="card-text"><i class="bi bi-currency-dollar"></i> $30.00</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>