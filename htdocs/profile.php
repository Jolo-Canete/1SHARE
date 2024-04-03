<?php
        include "nav.php";
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

  <style>
    body {
      background: linear-gradient(135deg, #D7FFD9, #B7DEED);
      min-height: 100vh;
    }

    .profile-container {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 20px;
      position: relative;
    }

    .profile-header {
      background: linear-gradient(90deg, #00C9FF, #92FE9D);
      color: #ffffff;
      padding: 20px;
      border-radius: 10px 10px 0 0;
      display: flex;
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
      color: #00C9FF;
      margin-right: 10px;
    }

    .data p {
      color: #666666;
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
      color: #00C9FF;
      margin-right: 10px;
    }

    .modal-content {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
      background: linear-gradient(90deg, #00C9FF, #92FE9D);
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
      color: #00C9FF;
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
    padding: 5px;
    font-size: 25px;
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

  <div class="page-content" id="content">

  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="profile-container">
          <div class="profile-header">
            <div class="profile-avatar">
              <img src="https://github.com/mdo.png" class="rounded-circle">
            </div>
            <div class="verify-badge">Verified</div>
          </div>
          <div class="profile-info mt-3">
            <h4 class="mb-0">Jolo Cañete</h4>
            <div class="text-secondary">Resident</div>
          </div>
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
          <div class="right">
            <div class="h1 fs-5 mb-3">
              Details
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="data">
                  <h4><i class="bi-envelope-fill"></i> Email</h4>
                  <p>canete.jolo@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="data">
                  <h4><i class="bi-telephone-fill"></i> Phone</h4>
                  <p>09203513491</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="data">
                  <h4><i class="bi-map-fill"></i> Address</h4>
                  <p>Zone 11, Purok 26-A, Curvada</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="data">
                  <h4><i class="bi-pin-map-fill"></i> Nearest Landmark</h4>
                  <p>Bilyaran</p>
                </div>
              </div>
            </div>
            <hr>
            <div class="transaction-box">
              <h3 class="d-flex align-items-center h1 fs-5 mb-3">Transaction History
                <button type="button" class="btn btn-link ms-auto text-dark" data-bs-toggle="modal"
                  data-bs-target="#unlockModal">
                  <i class="bi bi-lock-fill fs-5"></i>
                </button>
              </h3>

              <div class="row">
                <div class="col-md-6">
                  <div class="data transaction-item" data-bs-toggle="modal" data-bs-target="#transactionModal"
                    data-date="2024-02-15" data-type="Barter">
                    <h4>Transaction</h4>
                    <p><i class="fas fa-calendar-alt"></i> Date: 2024-02-15</p>
                    <p><i class="fas fa-exchange-alt"></i> Type: Barter</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="data transaction-item" data-bs-toggle="modal" data-bs-target="#transactionModal"
                    data-date="2024-02-10" data-type="Borrow">
                    <h4>Transaction</h4>
                    <p><i class="fas fa-calendar-alt"></i> Date: 2024-02-10</p>
                    <p><i class="fas fa-hand-holding-usd"></i> Type: Borrow</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Unlock Modal -->
            <div class="modal fade" id="unlockModal" tabindex="-1" aria-labelledby="unlockModalLabel"
              aria-hidden="true">
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

            <!-- Transaction Modal -->
            <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalLabel"><i class="fas fa-exchange-alt"></i> Transaction
                      Details</h5>
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
          </div>
        </div>
        <br>
      </div>
    </div>
  </div>
            </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>