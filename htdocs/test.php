<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Testing</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

  <style>
    .rating>input {
      display: none;
    }

    .rating>label {
      padding: 0px;
      font-size: 15px;
      color: #FFD700;
      display: inline-block;
      cursor: pointer;
    }

    .rating>input:checked~label {
      color: #f8de7e;
    }

    body {
      background-color: #808080;
    }



    .left {
      background: linear-gradient(to right, #01a9ac, #01dbdf);
      padding: 30px 25px;
      border-radius: 5px;
      text-align: center;
      color: #fff;
      margin-bottom: 20px;
    }

    .left img {
      border-radius: 5px;
      margin-bottom: 10px;
    }

    .info h3 {
      margin-bottom: 15px;
      padding-bottom: 5px;
      border-bottom: 1px solid #e0e0e0;
      color: #353c4e;

    }

    .data h4 {
      color: #353c4e;
      margin-bottom: 5px;
      font-size: 18px;
    }

    .data p {
      font-size: 16px;
      margin-bottom: 10px;
      color: #919aa3;
    }

    .transaction-box {
      background-color: #ffffff;
      border-radius: 10px;
 

    }

    .transaction-item {
      border: 8px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 10px;
    }

    .transaction-item:hover {
      border: 1px solid black;
      cursor: pointer;
    }


    .profile-container {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border: 2px solid black;
      padding: 20px;
    }

    .profile-avatar {
      position: relative;
    }

    .verify-badge {
      position: absolute;
      bottom: 0;
      right: 0;
      background-color: #4CAF50;
      /* Green background */
      color: white;
      padding: 5px 10px;
      border-radius: 50%;
    }

    .profile-info h4 {
      margin-bottom: 10px;
    }

    .rating {
      text-align: center;
    }



    /* Just for demo */
    .profile-info p {
      margin-bottom: 5px;
    }

    .modal-content {
      background-color: #f8f9fa;
      border-radius: 10px;
    }

    .modal-header {
      border-bottom: none;
    }

    .modal-footer {
      border-top: none;
    }

    .modal-title {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }

    .modal-body {
      padding: 30px;
    }

    .modal-body p {
      font-size: 18px;
      color: #666;
    }

    .modal-body p i {
      margin-right: 10px;
    }

    .modal-body img {
      width: 100px;
      height: 100px;
      border-radius: 10px;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <header>
    <?php include "nav.php"; ?>
  </header>
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="profile-container">
          <div class="row">
            <div class="col-md-3 text-center">
              <div class="profile-avatar">
                <img src="https://github.com/mdo.png" width="120" class="rounded-circle">
              </div>
            </div>
            <div class="col-md-9">
              <div class="profile-info">
                <h4 class="mb-0">Jolo Cañete</h4>
                <div class="text-secondary mt-0 mb-0">Resident</div>
                <div class="mb-2"></div>
                <p class="fs-6 status-verified">Status:&nbsp;<span class="badge text-bg-primary rounded-pill">Verified</span></p>
              </div>
              <!-- Star rating -->
              <div class="rating text-start">
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
          <br>
          <hr>
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
                <button type="button" class="btn btn-link ms-auto text-dark" data-bs-toggle="modal" data-bs-target="#unlockModal">
                  <i class="bi bi-lock-fill fs-5"></i>
                </button>
              </h3>

              <div class="row">
                <div class="col-md-6">
                  <div class="data transaction-item" data-bs-toggle="modal" data-bs-target="#transactionModal" data-date="2024-02-15" data-type="Barter">
                    <h4>Transaction</h4>
                    <p><i class="fas fa-calendar-alt"></i> Date: 2024-02-15</p>
                    <p><i class="fas fa-exchange-alt"></i> Type: Barter</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="data transaction-item" data-bs-toggle="modal" data-bs-target="#transactionModal" data-date="2024-02-10" data-type="Borrow">
                    <h4>Transaction</h4>
                    <p><i class="fas fa-calendar-alt"></i> Date: 2024-02-10</p>
                    <p><i class="fas fa-hand-holding-usd"></i> Type: Borrow</p>
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


            <!-- Transaction Modal -->
            <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalLabel"><i class="fas fa-exchange-alt"></i> Transaction Details</h5>
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




</body>

</html>