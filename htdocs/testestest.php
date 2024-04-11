<!--- Page Content Holder --->
<div class="page-content" id="content">
    <div class="container">
        <div class="row">
            <!--- Account Info Tab Pane --->
            <div class="col-12 col-md-6">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-account" role="tabpanel" aria-labelledby="list-account-list">
                        <h3 class="mb-4">Account Information</h3>
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-secondary me-2">First Name:</div>
                                            <span class="text-dark"><?php echo ucfirst($userData['firstName']); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-secondary me-2">Middle Name:</div>
                                            <span class="text-dark"><?php echo ucfirst($userData['middleName']); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-secondary me-2">Last Name:</div>
                                            <span class="text-dark"><?php echo ucfirst($userData['lastName']); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-secondary me-2">Date of Birth:</div>
                                            <span class="text-dark">October 25, 1995</span>
                                            <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-secondary me-2">Date Joined:</div>
                                            <span class="text-dark">January 1, 2024</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-secondary me-2">Purok:</div>
                                            <span class="text-dark"><?php echo $userData['purok']; ?></span>
                                            <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-secondary me-2">Zone:</div>
                                            <span class="text-dark"><?php echo $userData['zone']; ?></span>
                                            <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-secondary me-2">Email:</div>
                                            <span class="text-dark"><?php echo $userData['userEmail']; ?></span>
                                            <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-secondary me-2">Contact Number:</div>
                                            <span class="text-dark"><?php echo $userData['contactNumber']; ?></span>
                                            <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-secondary me-2">Username:</div>
                                            <span class="text-dark">Bobords</span>
                                            <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bold text-secondary me-2">Status:</div>
                                            <span class="text-primary"><b>Verified</b><span class="text-secondary mx-2"><small>last January 1, 2024</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--- End of Account Info Tab Pane --->

            <!--- Privacy Tab Pane --->
            <div class="col-12 col-md-6">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="list-privacy" role="tabpanel" aria-labelledby="list-privacy-list">
                        <h3 class="mb-4">Privacy</h3>
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="fw-bold text-secondary me-2">Password:</div>
                                    <span class="text-dark flex-grow-1">**********************</span>
                                    <button type="button" class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="fw-bold text-secondary me-2">Transaction History</div>
                                    <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                        <i class="bi bi-lock-fill"></i>
                                    </button>
                                </div>
                                <p class="text-dark mb-0">By unlocking your Transaction History, your transactions can be seen by anyone.</p>
                            </div>
                        </div>
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="fw-bold text-secondary me-2">Item Owned</div>
                                    <button type="button" class="btn btn-outline-secondary btn-sm ms-auto">
                                        <i class="bi bi-lock-fill"></i>
                                    </button>
                                </div>
                                <p class="text-dark mb-0">By unlocking your Item Owned, your owned items can be seen by anyone.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--- End of Privacy Tab Pane --->

            <!--- Terms and Conditions Tab Pane --->
            <div class="col-12">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="list-termsandconditions" role="tabpanel" aria-labelledby="list-termsandconditions-list">
                        <h3 class="mb-4">Terms and Conditions</h3>
                        <div class="card shadow-sm mb-4">
                            <div class="card-body">
                                <?php include "termsandcondition.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--- End of Terms and Conditions Tab Pane --->
        </div>
    </div>
</div>
</main>