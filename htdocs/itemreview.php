<!doctype html>
<html lang="en">

<head>
    <title>Item Review</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!--- Bootstrap Icon --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
    <main>
        <div class="container my-5">
            <!--- Write your review --->
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <div class="text-center fw-bold">
                                Write your Review
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="mb-3">
                                    <label for="photoReview" class="form-label"><b>Add Photo (Optional)</b></label>
                                    <input class="form-control" type="file" id="photoReview">
                                </div>
                                <div class="mb-3">
                                    <label for="writeReview" class="form-label"><b>Write your review</b></label>
                                    <textarea class="form-control" id="writeReview" rows="3" placeholder="Would you like to write anything about this item?"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="rate" class="form-label"><b>Rate:</b>
                                        <i class="bi bi-star-fill text-warning" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-star-fill text-warning ms-1" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-star-fill text-warning ms-1" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-star-fill text-warning ms-1" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-star-fill text-warning ms-1" style="font-size: 1.2rem;"></i>
                                </label>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <button class="btn btn-primary">Submit Review</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5"></div>

            <!--- Item Review 1 --->
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center"></div>
                            <div class="row">
                                <div class="col-3">
                                    <img src="https://via.placeholder.com/150" class="rounded-circle" alt="Reviewer Avatar">
                                </div>
                                <div class="col-9">
                                    <a href="profile.php" class="h5 fw-bold link-offset-2 link-underline link-underline-opacity-0">Detective Jolo</a>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning ms-1"></i>
                                        <i class="bi bi-star-fill text-warning ms-1"></i>
                                        <i class="bi bi-star-fill text-warning ms-1"></i>
                                        <i class="bi bi-star-fill text-warning ms-1"></i>
                                        <small class="ms-2 text-warning">5.0</small>
                                    </div>
                                    <p class="mt-2">This chair is a great addition for any room in your home, not only just the living room. Featuring a mid-century design with modern available on the market. And with that said, if you are like most people in the...</p>
                                    <small class="text-muted">April 16, 2024 at 6:50:00 A.M.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5"></div>

            <!--- Item Review 2 --->
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center"></div>
                            <div class="row">
                                <div class="col-3">
                                    <img src="https://via.placeholder.com/150" class="rounded-circle" alt="Reviewer Avatar">
                                </div>
                                <div class="col-9">
                                    <a href="profile.php" class="h5 fw-bold link-offset-2 link-underline link-underline-opacity-0">Detective Pepay</a>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning ms-1"></i>
                                        <i class="bi bi-star-fill text-warning ms-1"></i>
                                        <i class="bi bi-star-fill text-warning ms-1"></i>
                                        <i class="bi bi-star-fill text-warning ms-1"></i>
                                        <small class="ms-2 text-warning">5.0</small>
                                    </div>
                                    <p class="mt-2">Great!</p>
                                    <small class="text-muted">April 16, 2024 at 6:50:00 A.M.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>