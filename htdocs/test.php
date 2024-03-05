<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
        }

        .profile-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-avatar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .verify-badge {
            color: #0f9d58;
            font-size: 1.5em;
            margin-top: 10px;
        }

        .profile-info {
            margin-left: 20px;
        }

        .status-verified {
            color: #0f9d58;
        }

        .rating {
            margin-top: 10px;
        }

        .transaction-box {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .transaction-item {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .modal-body p {
            margin: 5px 0;
        }

        .modal-body span {
            font-weight: bold;
        }

        .modal-body img {
            max-width: 100%;
            border-radius: 5px;
            margin-top: 10px;
        }

        .info h3 {
            margin-bottom: 15px;
            color: #333;
        }

        .info p {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="profile-container">
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="profile-avatar">
                        <img src="https://github.com/mdo.png" alt="user">
                        <div class="verify-badge">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="profile-info">
                        <h4 class="mb-3">Jolo Cañete</h4>
                        <p class="fs-6 status-verified">Status: Verified</p>
                        <p>Resident</p>
                        <div class="rating">
                            <span>Rating:</span>
                            <label for="star5"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating" id="star5" value="5">
                            <label for="star4"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating" id="star4" value="4">
                            <label for="star3"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating" id="star3" value="3">
                            <label for="star2"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating" id="star2" value="2">
                            <label for="star1"><i class="fas fa-star"></i></label>
                            <input type="radio" name="rating" id="star1" value="1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="transaction-box">
            <h3>Transaction History</h3>
            <div class="transaction-item">
                <h4>Transaction</h4>
                <p><i class="fas fa-calendar-alt"></i> Date: 2024-02-15</p>
                <p><i class="fas fa-exchange-alt"></i> Type: Barter</p>
            </div>
            <div class="transaction-item">
                <h4>Transaction</h4>
                <p><i class="fas fa-calendar-alt"></i> Date: 2024-02-10</p>
                <p><i class="fas fa-hand-holding-usd"></i> Type: Borrow</p>
            </div>
            <div class="text-center">
                <button class="btn btn-primary mt-3">Make History Private</button>
            </div>
        </div>
    </div>

    <!-- Modals -->

    <!-- Transaction Modal -->
    <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalLabel">Transaction Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><i class="far fa-calendar-alt"></i> Date: <span id="transactionDate"></span></p>
                    <p><i class="fas fa-info-circle"></i> Type: <span id="transactionType"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Information Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Detailed Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-1 text-center">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="col-md-11">
                            <p>Email: canete.jolo@gmail.com</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 text-center">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="col-md-11">
                            <p>Phone: 09203513491</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 text-center">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="col-md-11">
                            <p>Address: Zone 11, Purok 26-A, Curvada</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 text-center">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <div class="col-md-11">
                            <p>Nearest Landmark: Bilyaran</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha512-MXtRbXdlyFXkdqMCM/ujU4fH0uv/gOMhhCMe92qEG1i4Hbb4yGLz5kwJlWgsGR8t8W1flR0olqtjTDAj6Mciig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
