<?php include "nav.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile TEST</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <style>
        .profile-container {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            position: relative;
        }

        .profile-header {
            color: #ffffff;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            align-items: center;
            justify-content: space-between;
        }

        .profile-header .verify-badge {
            background-color: #ffffff;
            color: #00C9FF;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }

        .profile-avatar img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .profile-info h4 {
            color: #333333;
            margin-bottom: 5px;
        }

        .profile-info .text-secondary {
            font-size: 14px;
        }

        .rating {
            text-align: center;
            margin-top: 10px;
        }

        .rating span {
            color: #666666;
            font-size: 14px;
            margin-right: 5px;
        }

        .rating label {
            color: #FFD700;
            font-size: 20px;
            margin: 0 2px;
            cursor: pointer;
        }

        .right {
            margin-top: 20px;
        }

        .data {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .data h4 {
            color: #333333;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .data h4 i {
            margin-right: 10px;
        }

        .data p {
            margin-bottom: 0;
        }

        .transaction-box {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .transaction-box h3 {
            color: #333333;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .transaction-box h3 .btn {
            color: #00C9FF;
            font-size: 18px;
            padding: 0;
        }

        .transaction-item {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .transaction-item:hover {
            background-color: #e9ecef;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .transaction-item h4 {
            color: #333333;
            margin-bottom: 10px;
        }

        .transaction-item p {
            color: #666666;
            margin-bottom: 0;
            display: flex;
            align-items: center;
        }

        .transaction-item p i {

            margin-right: 10px;
        }

        .item-owned-box {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .item-owned-box h3 {
            color: #333333;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .item-owned-box h3 .btn {
            color: #00C9FF;
            font-size: 18px;
            padding: 0;
        }

        .item-owned-item {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .item-owned-item:hover {
            background-color: #e9ecef;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .item-owned-item h4 {
            color: #333333;
            margin-bottom: 10px;
        }

        .item-owned-item p {
            color: #666666;
            margin-bottom: 0;
            display: flex;
            align-items: center;
        }

        .item-owned-item p i {

            margin-right: 10px;
        }

        .modal-content {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background: #212529;
            color: #ffffff;
            border-radius: 10px 10px 0 0;
            padding: 15px 20px;
        }

        .modal-title {
            font-size: 18px;
            font-weight: bold;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-body p {
            color: #666666;
            margin-bottom: 10px;
        }

        .modal-body p i {

            margin-right: 10px;
        }

        .modal-footer {
            padding: 15px 20px;
            border-top: none;
        }

        .rating {
            text-align: center;
        }

        .rating>input {
            display: none;
        }

        .rating>label {
            font-size: 18px;
            color: #ffc107;
            display: inline-block;
            cursor: pointer;
        }

        .rating>input:checked~label {
            color: #f8de7e;
        }
    </style>
</head>

<body>

    <header>
        <!-- place navbar here -->
    </header>

    <main>

        <!--- Details --->
        <div class="page-content" id="content">
            <div class="container mt-4">
                <div class="h2">My Profile</div>
                <div class="profile-container">
                    <div class="row">
                        <div class="col-3 text-center">
                            <div class="profile-avatar">
                                <img src="https://github.com/mdo.png" alt="Jolo A. Cañete" class="rounded-circle">
                            </div>
                            <div class="h4 mt-2 mb-1">Jolo A. Cañete</div>
                            <div class="rating mt-1">
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
                        <div class="col-md-3">
                            <div class="data" data-bs-toggle="modal" data-bs-target="#statusModal">
                                <h4><i class="bi-check-circle-fill"></i>Status</h4>
                                <p><span class="badge bg-primary text-white rounded-pill">Verified</span></p>
                            </div>
                            <div class="data">
                                <h4><i class="bi-envelope-fill"></i>Email</h4>
                                <p class="text-secondary">canete.jolo@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="data">
                                <h4><i class="bi-map-fill"></i>Zone</h4>
                                <p class="text-secondary">Zone 11</p>
                            </div>
                            <div class="data">
                                <h4><i class="bi-map-fill"></i>Purok</h4>
                                <p class="text-secondary">Purok 26A</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="data">
                                <h4><i class="bi-pin-map-fill"></i>Nearest Landmark</h4>
                                <p class="text-secondary">Bilyaran</p>
                            </div>
                            <div class="data">
                                <h4><i class="bi-telephone-fill"></i> Phone</h4>
                                <p class="text-secondary">09203513491</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--- Transaction History --->
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="h2 d-flex align-items-center">Transaction History
                            <button type="button" class="btn btn-link ms-auto text-dark" data-bs-toggle="modal" data-bs-target="#unlockModal">
                                <i class="bi bi-lock-fill fs-5"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="data transaction-item" data-bs-toggle="modal" data-bs-target="#transactionModal" data-date="2024-02-15" data-type="Barter">
                            <h4>Transaction</h4>
                            <p><i class="fas fa-calendar-alt"></i> Date: 2024-02-15</p>
                            <p><i class="fas fa-exchange-alt"></i> Type: Barter</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="data transaction-item" data-bs-toggle="modal" data-bs-target="#transactionModal" data-date="2024-02-15" data-type="Barter">
                            <h4>Transaction</h4>
                            <p><i class="fas fa-calendar-alt"></i> Date: 2024-02-15</p>
                            <p><i class="fas fa-exchange-alt"></i> Type: Barter</p>
                        </div>
                    </div>
                </div>

                <!--- Item Owned --->
                <div class="row">
                    <div class="col-md-12">
                        <h2>Item Owned</h2>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 g-3">
                    <div class="col">
                        <div class="card shadow-lg" data-bs-toggle="modal" data-bs-target="#item1">
                            <img src="picture/elmo.jpg" class="rounded-top">

                            <div class="card-body">
                                <p class="h5 card-text text-truncate mt-0 mb-0">
                                    Elmo Toy
                                </p>
                                <p class="card-text text-secondary mt-0 mb-0">
                                    <small>01/01/24 at 10:16 P.M.</small>
                                </p>

                                <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                    <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                        <!--- Modal --->
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <!--- Modal Header --->
                                                <div class="modal-header bg-dark text-light">
                                                    <p class="modal-title h4" id="item1">Details</p>
                                                </div>
                                                <!--- End of Modal Header --->

                                                <!--- Modal Body --->
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <img src="picture/elmo.jpg" class="img-fluid rounded">
                                                        </div>
                                                        <div class="col-md-7">
                                                            <dl class="row">
                                                                <dt class="col-sm-4 text-secondary bi-card-text">&nbsp; Description</dt>
                                                                <dd class="col-sm-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                                                                <dt class="col-sm-4 text-secondary bi-star-fill">&nbsp; Condition</dt>
                                                                <dd class="col-sm-8">New</dd>

                                                                <dt class="col-sm-4 text-secondary bi-check-circle-fill">&nbsp; Availability</dt>
                                                                <dd class="col-sm-8"><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Available</span></dd>

                                                                <dt class="col-sm-4 text-secondary bi-arrow-repeat">&nbsp; Open for</dt>
                                                                <dd class="col-sm-8"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Barter</span></dd>

                                                                <dt class="col-sm-4 text-secondary bi-calendar-check-fill mb-0">&nbsp; Posted</dt>
                                                                <dd class="col-sm-8">01/01/24 at 10:16 P.M.</span></dd>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--- Modal Footer --->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-success" id="openButton">Open</button>
                                                </div>
                                                <!--- End of Modal Footer --->

                                                <!--- Modal JavaScript --->
                                                <script>
                                                    document.getElementById('openButton').addEventListener('click', function() {
                                                        window.location.href = 'itemdetail.php';
                                                    });
                                                </script>
                                                <!--- End of JavaScript --->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Unlock Modal -->
                <div class="modal fade" id="unlockModal" tabindex="-1" aria-labelledby="unlockModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="unlockModalLabel">Unlock Transaction History</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Add your unlock content here -->
                                <p>Are you sure you want to unlock your transaction history?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Unlock</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Modal -->
                <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="statusModalLabel"><i class="fas fa-exchange-alt"></i>Status</h5>
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

                <!-- Transaction History Modal -->
                <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="transactionModalLabel">Transaction
                                    Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="picture/elmo.jpg" class="img-fluid rounded">
                                    </div>
                                    <div class="col-md-7">
                                        <dl class="row">
                                            <dt class="col-sm-5 text-secondary bi-card-text">&nbsp; Description</dt>
                                            <dd class="col-sm-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                                            <dt class="col-sm-5 text-secondary bi-star-fill">&nbsp; Transaction Type</dt>
                                            <dd class="col-sm-7"><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Borrow<i class=""></i>
                                    </span></span></dd>

                                            <dt class="col-sm-5 text-secondary bi-check-circle-fill">&nbsp; Started</dt>
                                            <dd class="col-sm-7">01/01/24 at 10:16 P.M.</dd>

                                            <dt class="col-sm-5 text-secondary bi-arrow-repeat">&nbsp; Ended</dt>
                                            <dd class="col-sm-7">02/02/24 at 10:30 A.M.</dd>

                                            <dt class="col-sm-5 text-secondary bi-calendar-check-fill mb-0">&nbsp; Owned By</dt>
                                            <dd class="col-sm-7"><span class="badge align-items-center text-light-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
                                <img class="rounded-circle me-1" width="23" height="23" src="picture/elmo.jpg">Elmo
                            </span></dd>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item Owned Modal -->
                <div class="modal fade" id="itemOwnedModal" tabindex="-1" aria-labelledby="itemOwnedLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="itemOwnedLabel"><i class="fas fa-exchange-alt"></i> Transaction
                                    Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><i class="far fa-calendar-alt"></i> Date: <span id="itemOwnedDate"></span></p>
                                <p><i class="fas fa-info-circle"></i> Type: <span id="itemOwnedType"></span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--- Transaction History Script --->
                <script>
                    document.querySelectorAll('.transaction-item').forEach(item => {
                        item.addEventListener('click', event => {
                            const date = item.dataset.date;
                            const type = item.dataset.type;
                            document.getElementById('transactionDate').innerText = `${date}`;
                            document.getElementById('transactionType').innerText = `${type}`;
                        });
                    });
                </script>

                <!--- Item Owned Script --->
                <script>
                    document.querySelectorAll('.item-owned-item').forEach(item => {
                        item.addEventListener('click', event => {
                            const date = item.dataset.date;
                            const type = item.dataset.type;
                            document.getElementById('itemOwnedDate').innerText = `${date}`;
                            document.getElementById('itemOwnedType').innerText = `${type}`;
                        });
                    });
                </script>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>