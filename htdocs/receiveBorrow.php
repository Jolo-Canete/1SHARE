<?php include "nav.php" ?>
<!doctype html>
<html lang="en">

<head>
    <title>Receive Borrow Item</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
</head>

<body>
    <main>
        <div class="page-content" id="content">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-success text-white">
                                <h1 class="display-4 fw-bold text-center"><i class="bi bi-check-circle"></i> RECEIVE</h1>
                            </div>
                            <div class="card-body">
                                <p class="text-secondary mb-4">Please answer the following questions</p>
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label class="form-label"><b>Have you received your item?</b> <span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Yes" name="received" id="recYes">
                                            <label class="form-check-label" for="recYes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="No" name="received" id="recNo">
                                            <label class="form-check-label" for="recNo">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="proof" class="form-label"><b>Please provide a proof that you have or have not received your item (Optional)</b></label>
                                        <input class="form-control" type="file" id="proof">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>

</body>

</html>