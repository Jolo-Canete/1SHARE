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
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: relative;
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
                        <div class="col mt-4">
                            <div class="d-flex align-items-center text-secondary">
                                <span class="bi-envelope">&nbsp; canete.jolo@gmail.com</span>
                                <span class="bi-map ms-4">&nbsp; Purok 31, Zone 13</span>
                            </div>
                        </div>
                        <div class="col mt-1">
                            <div class="d-flex align-items-center text-secondary">
                                <span class="bi-calendar">&nbsp; Joined January 2024</span>
                                <span class="bi-telephone ms-5">&nbsp; 09203513491</span>
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
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="tweets-tab">
                        </div>
                            <div class="h4 mt-3"><i class="bi bi-person"></i> Personal Information</div>
                            <div class="d-flex justify-content-between">
                                <p><b>First Name:</b> Jolo</p>
                                <p><b>Middle Name:</b> Alvarado</p>
                                <p><b>Last Name:</b> Cañete</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p><b>Purok:</b> 31</p>
                                <p><b>Zone:</b> 13</p>
                            </div>
                        <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="tweets-replies-tab">
                            <!-- Tweets & replies content -->
                        </div>
                        <div class="tab-pane fade" id="itemowned" role="tabpanel" aria-labelledby="media-tab">
                            <!-- Media content -->
                        </div>
                        <div class="tab-pane fade" id="ratings" role="tabpanel" aria-labelledby="likes-tab">
                            <!-- Likes content -->
                        </div>
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