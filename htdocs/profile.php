<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <style>
    <?php include "profile.css"; ?>
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
              <img src="https://github.com/mdo.png" alt="user" width="100" class="rounded-circle">
              <div class="verify-badge">
                <i class="fas fa-check-circle"></i> <!-- Font Awesome icon for verified -->
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="profile-info">
              <h4 class="mb-3">Jolo Cañete</h4>
              <p class="fs-6 status-verified">Status: Verified</p>
              <p>Resident</p>
            </div>
              <!-- Star rating -->
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
      <br>
        <div class="right">
          <div class="info" data-bs-toggle="modal" data-bs-target="#infoModal">
            <h3><i class="fas fa-info-circle"></i> Information</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="data">
                  <h4><i class="fas fa-envelope"></i> Email</h4>
                  <p>canete.jolo@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="data">
                  <h4><i class="fas fa-phone"></i> Phone</h4>
                  <p>09203513491</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="data">
                  <h4><i class="fas fa-map-marker-alt"></i> Address</h4>
                  <p>Zone 11, Purok 26-A, Curvada</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="data">
                  <h4><i class="fas fa-landmark"></i> Nearest Landmark</h4>
                  <p>Bilyaran</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      

          <div class="transaction-box">
            <h3>Transaction History</h3>
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
            <div class="text-center">
              <button class="btn btn-primary mt-3">Make History Private</button>
            </div>
          </div>
          <!-- Item Owned box -->
          <div class="transaction-box">
          <h3>Item Owned</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="data transaction-item" data-bs-toggle="modal" data-bs-target="#itemOwnedModal" data-name="Item Name" data-date="2024-02-15" data-status="Active" data-type="Barter">
                <h4>Item Name</h4>
                <p><i class="far fa-calendar-alt"></i> Date & Time Published: <small>2024-02-15 08:30 AM</small></p>
                <p><i class="fas fa-info-circle"></i> Item Status: <small>Active</small></p>
                <p><i class="fas fa-exchange-alt"></i> Type of Request: <small>Barter</small></p>
                <img src="item_picture.jpg" alt="Item Picture" width="50" class="img-thumbnail">
              </div>
            </div>
        </div>
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
    <!-- Item Owned Modal -->
    <div class="modal fade" id="itemOwnedModal" tabindex="-1" aria-labelledby="itemOwnedModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itemOwnedModalLabel">Item Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><i class="far fa-calendar-alt"></i> Date & Time Published: <span id="itemOwnedDate"></span></p>
        <p><i class="fas fa-info-circle"></i> Item Status: <span id="itemOwnedStatus"></span></p>
        <p><i class="fas fa-exchange-alt"></i> Type of Request: <span id="itemOwnedType"></span></p>
        <img id="itemOwnedImg" src="" alt="Item Picture">
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
      document.getElementById('transactionDate').innerText = `Date: ${date}`;
      document.getElementById('transactionType').innerText = `Type: ${type}`;
    });
  });
</script>



<!-- Information Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoModalLabel"><i class="fas fa-info-circle"></i> Detailed Information</h5>
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

</body>
</html>
