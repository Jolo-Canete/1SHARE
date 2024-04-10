<?php include 'nav.php'; ?>

<!--- Preview the uploaded image --->
<script>
  function previewImage(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagePreview').attr('src', e.target.result);
        $('#imagePreview').show();
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Test Code 2</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <style>
    .profile-container {
      background-color: #e8e9e8;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
      padding: 20px;
      position: relative;
      width: 103%;
      margin: 0 auto;
      margin-bottom: 2rem;
    }

    .profile-header {
      background-color: #212529;
      color: #ffffff;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .profile-avatar img {
      width: 18%;
      height: 18%;
      object-fit: cover;
      border-radius: 50%;
      border: 5px solid #ffffff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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

    .data {
      background-color: yellow;
      padding: 8px;
      margin-top: 15px;
      margin-bottom: 15px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
      margin-bottom: 10px;
    }

    .modal-body p i {
      margin-right: 10px;
    }

    .rating {
      text-align: left;
      margin-top: 0;
    }

    .rating>input {
      display: none;
    }

    .rating>label {
      font-size: 15px;
      color: #ffc107;
      display: inline-block;
      cursor: pointer;
    }

    .rating>input:checked~label {
      color: #f8de7e;
    }

    .nav-underline {
      border-bottom: 2px solid #dee2e6;
    }

    .nav-link {
      color: #495057;
      font-weight: 600;
      padding: 0.5rem 1rem;
      border-bottom: 2px solid transparent;
      transition: color 0.3s ease, border-color 0.3s ease;
    }

    .nav-link.active,
    .nav-link:hover {
      color: #212529;
      border-bottom-color: #212529;
    }

    .nav-link.active {
      color: #fff;
    }

    .table-hover tbody tr.table-row:hover {
      background-color: #f5f5f5;
      cursor: pointer;
    }

    .table-row {
      transition: background-color 0.3s ease;
    }

    .table-wrapper {
      width: 103%;
      margin: 0 auto;
    }

    .table thead th,
    td {
      text-align: center;
    }

    .form-box {
      background-color: #f8f9fa;
      padding: 10px 12px;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>



<body>
  <header>
    <!-- place navbar here -->
  </header>

  <main>
    <div class="page-content" id="content">
      <div class="container mt-4">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="profile-avatar">
              <img src="https://github.com/mdo.png" class="rounded-circle">
            </div>
            <div class="col mt-3">
              <div class="d-flex align-items-center">
                <h2 class="mb-0"><b>Jolo A. Cañete</b></h2>
                <button type="button" class="btn btn-link ms-auto text-danger" data-bs-toggle="modal" data-bs-target="#reportUserModal">
                  <i class="bi bi-flag fs-5"></i>
                </button>
              </div>
            </div>
            <div class="col">
              <div class="text-secondary">Resident</div>
            </div>
            <div class="col">
              <span class="badge text-bg-primary rounded-pill">Verified</span>
            </div>
            <div class="col mt-4">
              <div class="d-flex align-items-center text-secondary">
                <span class="bi-envelope">&nbsp; canete.jolo@gmail.com</span>
                <span class="bi-map ms-4">&nbsp; Purok 31, Zone 13</span>
              </div>
            </div>
            <div class="col mt-1">
              <div class="d-flex align-items-center text-secondary">
                <span class="bi-telephone">&nbsp; 09203513491</span>
              </div>
            </div>
          </div>

          <!--- Report User Modal --->
          <div class="modal fade" id="reportUserModal" tabindex="-1" aria-labelledby="reportUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="reportUserModalLabel">Report User</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <label class="form-label"><b>Please specify your reason for reporting this account</b></label>
                  <textarea class="form-control" aria-label="Report reason"></textarea>
                  <label class="form-label mt-3"><b>Upload a screenshot for evidence/proof</b></label>
                  <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Report</button>
                </div>
              </div>
            </div>
          </div>
          <!--- End of Report User Modal --->

          <!--- Tab --->
          <ul class="nav nav-underline mt-4 ms-4 justify-content-between" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="true">Details</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="transaction-tab" data-bs-toggle="tab" data-bs-target="#transaction" type="button" role="tab" aria-controls="transaction" aria-selected="false">Transaction</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="itemowned-tab" data-bs-toggle="tab" data-bs-target="#itemowned" type="button" role="tab" aria-controls="itemowned" aria-selected="false">Item Owned</button>
            </li>
          </ul>

          <!--- Tab Content --->

          <!--- Details --->
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
              <div class="h2 d-flex align-items-center mt-3"><i class="bi bi-person me-2"></i> Details</div>
              <div class="row">
                <div class="col-md-6 mt-3">
                  <div class="card mb-4 shadow">
                    <div class="card-header"><b>Personal Information</b></div>
                    <div class="card-body">
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <label for="firstName" class="form-label text-secondary"><b>First Name</b></label>
                          <div class="form-box" readonly><b>Jolo</b></div>
                        </div>
                        <div class="col-sm-6">
                          <label for="lastName" class="form-label text-secondary"><b>Last Name</b></label>
                          <div class="form-box" readonly><b>Cañete</b></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <label for="status" class="form-label">Status</label>
                          <div class="form-box text-primary" readonly><b>Verified</b><span class="text-secondary mx-2"><small>last January 1, 2024</small></span></div>
                        </div>
                        <div class="col-sm-6">
                          <label for="dateJoined" class="form-label text-secondary"><b>Date Joined</b></label>
                          <div class="form-box" readonly><b>January 1, 2024</b></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="card mb-4 shadow">
                    <div class="card-header"><b>Contact Information</b></div>
                    <div class="card-body">
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <label for="email" class="form-label text-secondary"><b>Email</b></label>
                          <div class="form-box" readonly><b>canete.jolo@ici.edu.ph</b></div>
                        </div>
                        <div class="col-sm-6">
                          <label for="contactNumber" class="form-label text-secondary"><b>Contact Number</b></label>
                          <div class="form-box" readonly><b>09203513491</b></div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <label for="purok" class="form-label text-secondary"><b>Purok</b></label>
                          <div class="form-box" readonly><b>31</b></div>
                        </div>
                        <div class="col-sm-6">
                          <label for="zone" class="form-label text-secondary"><b>Zone</b></label>
                          <div class="form-box" readonly><b>13</b></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--- End of Details --->

            <!--- Transaction History --->
            <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
              <div class="mt-3">
                <div class="h2"><i class="bi bi-arrow-repeat me-2"></i> Transaction History
                </div>
              </div>
              <div class="table-wrapper">
                <table class="table table-bordered table-border-2 table-hover mb-3 mt-3">
                  <thead>
                    <tr class="table-dark">
                      <th>Transaction Type</th>
                      <th>Item Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="table-row table-light" data-bs-toggle="modal" data-bs-target="#transactionModal1">
                      <td>Borrow</span></td>
                      <td>Book</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- Transaction History Modal -->
              <div class="modal fade" id="transactionModal1" tabindex="-1" aria-labelledby="transactionModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="transactionModalLabel1">Transaction Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row g-4">
                        <div class="col-md-5">
                          <img src="htdocs/picture/elmo.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-7">
                          <dl class="row g-0">
                            <dt class="col-sm-5 text-secondary"><i class="bi bi-card-heading"></i>&nbsp; Item Name</dt>
                            <dd class="col-sm-7">Book</dd>

                            <dt class="col-sm-5 text-secondary"><i class="bi bi-card-text"></i>&nbsp; Description</dt>
                            <dd class="col-sm-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                            <dt class="col-sm-5 text-secondary"><i class="bi bi-star-fill"></i>&nbsp; Transaction Type</dt>
                            <dd class="col-sm-7"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Borrow</span></dd>

                            <dt class="col-sm-5 text-secondary"><i class="bi bi-calendar"></i>&nbsp; Started</dt>
                            <dd class="col-sm-7">01/01/24 at 10:16 P.M.</dd>

                            <dt class="col-sm-5 text-secondary"><i class="bi bi-calendar"></i>&nbsp; Ended</dt>
                            <dd class="col-sm-7">02/02/24 at 10:30 A.M.</dd>

                            <dt class="col-sm-5 text-secondary"><i class="bi bi-calendar-check-fill"></i>&nbsp; Owned By</dt>
                            <dd class="col-sm-7">
                              <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill align-items-center">
                                <img class="rounded-circle me-1" width="23" height="23" src="picture/elmo.jpg">Elmo
                              </span>
                            </dd>
                          </dl>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End of Transaction History Modal -->

            </div>
            <!-- End of Transaction History -->

            <!--- Item Owned --->
            <div class="tab-pane fade" id="itemowned" role="tabpanel" aria-labelledby="itemowned-tab">
              <div class="mt-3">
                <div class="h2 d-flex align-items-center"><i class="bi bi-box me-2"></i> Item Owned
                </div>
              </div>
              <div class="table-wrapper">
                <table class="table table-bordered table-border-2 table-hover mb-3 mt-3">
                  <thead>
                    <tr class="table-dark">
                      <th>Item Name</th>
                      <th>Posted</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="table-row table-light" data-bs-toggle="modal" data-bs-target="#itemOwnedModal1">
                      <td>Halloween Costume</span></td>
                      <td>02/03/24 11:18 P.M.</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- Item Owned Modal -->
              <div class="modal fade" id="itemOwnedModal1" tabindex="-1" aria-labelledby="itemOwnedModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="itemOwnedModalLabel1">Item Owned Details</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-5">
                          <img src="htdocs/picture/elmo.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-7">
                          <dl class="row">
                            <dt class="col-sm-5 text-secondary bi-card-heading">&nbsp; Item Name</dt>
                            <dd class="col-sm-7">Halloween Costume</dd>

                            <dt class="col-sm-5 text-secondary bi-card-text">&nbsp; Description</dt>
                            <dd class="col-sm-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                            <dt class="col-sm-5 text-secondary bi-arrow-repeat">&nbsp; Open for</dt>
                            <dd class="col-sm-7"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Borrow<i class=""></i>
                              </span></span></dd>

                            <dt class="col-sm-5 text-secondary bi-pin-map">&nbsp; Pick up</dt>
                            <dd class="col-sm-7">Overton</dd>

                            <dt class="col-sm-5 text-secondary bi-clock">&nbsp; Duration</dt>
                            <dd class="col-sm-7">5 Days</dd>

                            <dt class="col-sm-5 text-secondary bi-calendar-check-fill mb-0">&nbsp; Owned By</dt>
                            <dd class="col-sm-7"><span class="badge align-items-center text-light-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
                                <img class="rounded-circle me-1" width="23" height="23" src="picture/elmo.jpg">Elmo
                              </span>
                            </dd>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
                <!--- End of Item Owned Modal --->

              </div>
              <!--- End of Item Owned --->

            </div>
            <!--- End of Tab Content --->

          </div>
          <!--- End of Tab --->

        </div>
      </div>
    </div>
  </main>

  <footer>
  </footer>

</body>

</html>