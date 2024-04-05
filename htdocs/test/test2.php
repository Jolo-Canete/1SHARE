<?php include 'nav.php';?>

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

        .right {
            margin-top: 20px;
        }

        .data {
            background-color: yellow;
            padding: 8px;
            margin-top: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .data h4 {
            color: #333333;
            margin-bottom: 10px;
            display: flex;
            text-align: center;
        }

        .data h4 i {
            color: #212529;
            margin-right: 10px;
        }

        .data p {
            color: #666666;
            margin-bottom: 0;
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

        .table thead th, td {
  text-align: center;
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
                                    <label><b>Please specify your reason for reporting this account </b></label>
                                    <div class="input-group mb-3">
                                        <textarea class="form-control" aria-label="With textarea"></textarea>
                                    </div>
                                    <div>
                                        <input type="file" class="form-control" id="inputGroupFile01">
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
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ratings-tab" data-bs-toggle="tab" data-bs-target="#ratings" type="button" role="tab" aria-controls="ratings" aria-selected="false">Ratings</button>
                        </li>
                    </ul>

                    <!--- Tab Content --->

                    <!--- Personal Information --->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <!--- Detials content --->
                        </div>
                        <!--- End of Personal Information --->
                        
                        <!--- Transaction History --->
                        <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
                            <div class="mt-3">
                            <div class="h2 d-flex align-items-center"><i class="bi bi-arrow-repeat me-2"></i> Transaction History
                                <button type="button" class="btn btn-link ms-auto text-dark" data-bs-toggle="modal" data-bs-target="#unlockModal">
                                <i class="bi bi-lock-fill fs-5"></i>
                            </button>
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
                                            <dd class="col-sm-7">Book</dd>

                                            <dt class="col-sm-5 text-secondary bi-card-text">&nbsp; Description</dt>
                                            <dd class="col-sm-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                                            <dt class="col-sm-5 text-secondary bi-star-fill">&nbsp; Transaction Type</dt>
                                            <dd class="col-sm-7"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Borrow<i class=""></i>
                                    </span></span></dd>

                                            <dt class="col-sm-5 text-secondary bi-check-circle-fill">&nbsp; Started</dt>
                                            <dd class="col-sm-7">01/01/24 at 10:16 P.M.</dd>

                                            <dt class="col-sm-5 text-secondary bi-arrow-repeat">&nbsp; Ended</dt>
                                            <dd class="col-sm-7">02/02/24 at 10:30 A.M.</dd>

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
                                </div>
                            <!--- End of Transaction History Modal ---> 

                            </div>
                            <!-- End of Transaction History -->

                            <!--- Item Owned --->
                            <div class="tab-pane fade" id="itemowned" role="tabpanel" aria-labelledby="itemowned-tab">
                            <div class="mt-3">
                            <div class="h2 d-flex align-items-center"><i class="bi bi-box me-2"></i> Item Owned
                                
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
                                                            <dt class="col-sm-4 text-secondary bi-card-heading">&nbsp; Item Name</dt>
                                                                <dd class="col-sm-8">Elmo Stuff Toy</dd>

                                                                <dt class="col-sm-4 text-secondary bi-card-text">&nbsp; Description</dt>
                                                                <dd class="col-sm-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                                                                <dt class="col-sm-4 text-secondary bi-star-fill">&nbsp; Condition</dt>
                                                                <dd class="col-sm-8">New</dd>

                                                                <dt class="col-sm-4 text-secondary bi-check-circle-fill">&nbsp; Availability</dt>
                                                                <dd class="col-sm-8"><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Available</span></dd>

                                                                <dt class="col-sm-4 text-secondary bi-arrow-repeat">&nbsp; Open for</dt>
                                                                <dd class="col-sm-8"><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Barter</span></dd>

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
                            </div>
                            <!--- End of Item Owned --->

                            <!--- Ratings --->
                            <div class="tab-pane fade" id="ratings" role="tabpanel" aria-labelledby="ratings-tab">
                            <div class="mt-3">
                            <div class="h2 d-flex align-items-center"><i class="bi bi-star-fill me-2"></i> Ratings
                                
</div>
                            </div>
                            <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Jane Pie</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Resident</h6>
    <p class="card-text">A good borrower! Five star ka saakin kumare!!</p>
    <div class="rating">
            
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
                <span class="text-warning">5/5</span>
          </div>
  </div>
</div>
                            </div>
                            <!--- End of Ratings --->

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
