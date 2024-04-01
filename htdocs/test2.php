<!DOCTYPE html>
<html lang="en">

<head>
    <title>Test Code 2</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<style>
    body {
        padding-bottom: 1rem;
        min-height: 100vh;
	    overflow-x: hidden;
    }

    /* Carousel */
    .carousel {
        margin-bottom: 2rem;
    }

    /* Carousel Caption */
    .carousel-caption {
        bottom: 3rem;
        z-index: 10;
    }

    /* Carousel Image Height */
    .carousel-item {
        height: 32rem;
    }

    .carousel-item>img {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        height: 32rem;
    }

    /* Box */
    .box {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    /* Responsive CSS */

    @media (min-width: 40em) {

        /* Bump up size of carousel content */
        .carousel-caption p {
            margin-bottom: 1.25rem;
            font-size: 1.25rem;
            line-height: 1.4;
        }

        .featurette-heading {
            font-size: 50px;
        }
    }

    @media (min-width: 62em) {
        .featurette-heading {
            margin-top: 7rem;
        }
    }
</style>

<body>
    <header>
        <!-- place navbar here -->
    </header>

    <main>
        <div class="container">
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="#777" />
                        </svg>

                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1>Item Name</h1>
                                <p>Item Description</p>
                                <p><a class="btn btn-lg btn-primary" href="#">...</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="#777" />
                        </svg>

                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1>Item Name</h1>
                                <p>Item Description</p>
                                <p><a class="btn btn-lg btn-primary" href="#">...</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="#777" />
                        </svg>

                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1>Item Name</h1>
                                <p>Item Description</p>
                                <p><a class="btn btn-lg btn-primary" href="#">...</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>

            <!--- Categories --->
            <div class="row">
                <div class="col">
                    <p class="h1"><b>CATEGORIES</b></p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="box">
                        <svg class="bd-placeholder-img rounded-circle" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Category Name" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Category Name</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <div class="mb-2"></div>
                        <div class="h3">Category Name</div>
                    </div>
                </div>
                <div class="col">
                    <div class="box">
                        <svg class="bd-placeholder-img rounded-circle" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Category Name" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Category Name</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <div class="mb-2"></div>
                        <div class="h3">Category Name</div>
                    </div>
                </div>
                <div class="col">
                    <div class="box">
                        <svg class="bd-placeholder-img rounded-circle" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Category Name" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Category Name</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <div class="mb-2"></div>
                        <div class="h3">Category Name</div>
                    </div>
                </div>
                <div class="col">
                    <div class="box">
                        <svg class="bd-placeholder-img rounded-circle" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Category Name" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Category Name</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <div class="mb-2"></div>
                        <div class="h3">Category Name</div>
                    </div>
                </div>
                <div class="col">
                    <div class="box">
                        <svg class="bd-placeholder-img rounded-circle" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Category Name" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Category Name</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <div class="mb-2"></div>
                        <div class="h3">Category Name</div>
                    </div>
                </div>
                <div class="col">
                    <div class="box">
                        <svg class="bd-placeholder-img rounded-circle" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Category Name" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Category Name</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <div class="mb-2"></div>
                        <div class="h3">Category Name</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="box">
                        <svg class="bd-placeholder-img rounded-circle" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Category Name" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Category Name</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <div class="mb-2"></div>
                        <div class="h3">Category Name</div>
                    </div>
                </div>
                <div class="col">
                    <div class="box">
                        <svg class="bd-placeholder-img rounded-circle" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Category Name" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Category Name</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <div class="mb-2"></div>
                        <div class="h3">Category Name</div>
                    </div>
                </div>
                <div class="col">
                    <div class="box">
                        <svg class="bd-placeholder-img rounded-circle" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Category Name" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Category Name</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <div class="mb-2"></div>
                        <div class="h3">Category Name</div>
                    </div>
                </div>
                <div class="col">
                    <div class="box">
                        <svg class="bd-placeholder-img rounded-circle" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Category Name" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Category Name</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <div class="mb-2"></div>
                        <div class="h3">Category Name</div>
                    </div>
                </div>
                <div class="col">
                    <div class="box">
                        <svg class="bd-placeholder-img rounded-circle" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Category Name" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Category Name</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <div class="mb-2"></div>
                        <div class="h3">Category Name</div>
                    </div>
                </div>
                <div class="col">
                    <div class="box">
                        <svg class="bd-placeholder-img rounded-circle" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Category Name" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Category Name</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <div class="mb-2"></div>
                        <div class="h3">Category Name</div>
                    </div>
                </div>
                <div class="mb-3"></div>
            </div>
            <!--- End of Category --->

            <div class="row">
                <div class="col">
                    <p class="h1 border-bottom border-dark border-5 p-2 text-center">DAILY DISCOVER</p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 g-3">
                <div class="col">
                    <div class="card shadow-lg" data-bs-toggle="modal" data-bs-target="#item1">
                        <img src="picture/elmo.jpg" class="rounded-top">

                        <div class="card-body">
                            <p class="h5 card-text text-truncate">
                                Elmo Stuffed Toy
                            </p>
                            <div class="row">
                                <div class="col">
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
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <p class="text-start text-secondary">
                                        <small>Open for:</small>
                                        <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Borrow</span>
                                </div>
                                <div class="col">
                                    <p class="text-end bi-cart-plus" style="font-size: 1.3rem;">
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header bg-dark text-light">
                                                <p class="modal-title h4" id="item1">Details</p>
                                            </div>
                                            <!--- End of Modal Header --->

                                            <!--- Modal Body --->
                                            <div class="modal-body">
                                                <img src="picture/elmo.jpg" class="img-fluid rounded">
                                                <hr>
                                                <dl class="row">
                                                    <dt class="col-sm-4 text-secondary bi-card-text">&nbsp; Description</dt>
                                                    <dd class="col-sm-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                                                    <dt class="col-sm-4 text-secondary bi-star-fill">&nbsp; Condition</dt>
                                                    <dd class="col-sm-8">New</dd>

                                                    <dt class="col-sm-4 text-secondary bi-check-circle-fill">&nbsp; Availability</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Available</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-arrow-repeat">&nbsp; Open for</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Barter</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-calendar-check-fill">&nbsp; Posted</dt>
                                                    <dd class="col-sm-8">01/01/24 at 10:16 P.M.</span></dd>
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
                <div class="col">
                    <div class="card shadow-lg" data-bs-toggle="modal" data-bs-target="#item1">
                        <img src="picture/elmo.jpg" class="rounded-top">

                        <div class="card-body">
                            <p class="h5 card-text text-truncate">
                                Elmo Stuffed Toy
                            </p>
                            <div class="row">
                                <div class="col">
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
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <p class="text-start text-secondary">
                                        <small>Open for:</small>
                                        <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Borrow</span>
                                </div>
                                <div class="col">
                                    <p class="text-end bi-cart-plus" style="font-size: 1.3rem;">
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header bg-dark text-light">
                                                <p class="modal-title h4" id="item1">Details</p>
                                            </div>
                                            <!--- End of Modal Header --->

                                            <!--- Modal Body --->
                                            <div class="modal-body">
                                                <img src="picture/elmo.jpg" class="img-fluid rounded">
                                                <hr>
                                                <dl class="row">
                                                    <dt class="col-sm-4 text-secondary bi-card-text">&nbsp; Description</dt>
                                                    <dd class="col-sm-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                                                    <dt class="col-sm-4 text-secondary bi-star-fill">&nbsp; Condition</dt>
                                                    <dd class="col-sm-8">New</dd>

                                                    <dt class="col-sm-4 text-secondary bi-check-circle-fill">&nbsp; Availability</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Available</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-arrow-repeat">&nbsp; Open for</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Barter</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-calendar-check-fill">&nbsp; Posted</dt>
                                                    <dd class="col-sm-8">01/01/24 at 10:16 P.M.</span></dd>
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
                <div class="col">
                    <div class="card shadow-lg" data-bs-toggle="modal" data-bs-target="#item1">
                        <img src="picture/elmo.jpg" class="rounded-top">

                        <div class="card-body">
                            <p class="h5 card-text text-truncate">
                                Elmo Stuffed Toy
                            </p>
                            <div class="row">
                                <div class="col">
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
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <p class="text-start text-secondary">
                                        <small>Open for:</small>
                                        <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Borrow</span>
                                </div>
                                <div class="col">
                                    <p class="text-end bi-cart-plus" style="font-size: 1.3rem;">
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header bg-dark text-light">
                                                <p class="modal-title h4" id="item1">Details</p>
                                            </div>
                                            <!--- End of Modal Header --->

                                            <!--- Modal Body --->
                                            <div class="modal-body">
                                                <img src="picture/elmo.jpg" class="img-fluid rounded">
                                                <hr>
                                                <dl class="row">
                                                    <dt class="col-sm-4 text-secondary bi-card-text">&nbsp; Description</dt>
                                                    <dd class="col-sm-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                                                    <dt class="col-sm-4 text-secondary bi-star-fill">&nbsp; Condition</dt>
                                                    <dd class="col-sm-8">New</dd>

                                                    <dt class="col-sm-4 text-secondary bi-check-circle-fill">&nbsp; Availability</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Available</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-arrow-repeat">&nbsp; Open for</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Barter</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-calendar-check-fill">&nbsp; Posted</dt>
                                                    <dd class="col-sm-8">01/01/24 at 10:16 P.M.</span></dd>
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
                <div class="col">
                    <div class="card shadow-lg" data-bs-toggle="modal" data-bs-target="#item1">
                        <img src="picture/elmo.jpg" class="rounded-top">

                        <div class="card-body">
                            <p class="h5 card-text text-truncate">
                                Elmo Stuffed Toy
                            </p>
                            <div class="row">
                                <div class="col">
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
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <p class="text-start text-secondary">
                                        <small>Open for:</small>
                                        <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Borrow</span>
                                </div>
                                <div class="col">
                                    <p class="text-end bi-cart-plus" style="font-size: 1.3rem;">
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header bg-dark text-light">
                                                <p class="modal-title h4" id="item1">Details</p>
                                            </div>
                                            <!--- End of Modal Header --->

                                            <!--- Modal Body --->
                                            <div class="modal-body">
                                                <img src="picture/elmo.jpg" class="img-fluid rounded">
                                                <hr>
                                                <dl class="row">
                                                    <dt class="col-sm-4 text-secondary bi-card-text">&nbsp; Description</dt>
                                                    <dd class="col-sm-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                                                    <dt class="col-sm-4 text-secondary bi-star-fill">&nbsp; Condition</dt>
                                                    <dd class="col-sm-8">New</dd>

                                                    <dt class="col-sm-4 text-secondary bi-check-circle-fill">&nbsp; Availability</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Available</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-arrow-repeat">&nbsp; Open for</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Barter</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-calendar-check-fill">&nbsp; Posted</dt>
                                                    <dd class="col-sm-8">01/01/24 at 10:16 P.M.</span></dd>
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
                <div class="col">
                    <div class="card shadow-lg" data-bs-toggle="modal" data-bs-target="#item1">
                        <img src="picture/elmo.jpg" class="rounded-top">

                        <div class="card-body">
                            <p class="h5 card-text text-truncate">
                                Elmo Stuffed Toy
                            </p>
                            <div class="row">
                                <div class="col">
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
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <p class="text-start text-secondary">
                                        <small>Open for:</small>
                                        <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Borrow</span>
                                </div>
                                <div class="col">
                                    <p class="text-end bi-cart-plus" style="font-size: 1.3rem;">
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header bg-dark text-light">
                                                <p class="modal-title h4" id="item1">Details</p>
                                            </div>
                                            <!--- End of Modal Header --->

                                            <!--- Modal Body --->
                                            <div class="modal-body">
                                                <img src="picture/elmo.jpg" class="img-fluid rounded">
                                                <hr>
                                                <dl class="row">
                                                    <dt class="col-sm-4 text-secondary bi-card-text">&nbsp; Description</dt>
                                                    <dd class="col-sm-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                                                    <dt class="col-sm-4 text-secondary bi-star-fill">&nbsp; Condition</dt>
                                                    <dd class="col-sm-8">New</dd>

                                                    <dt class="col-sm-4 text-secondary bi-check-circle-fill">&nbsp; Availability</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Available</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-arrow-repeat">&nbsp; Open for</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Barter</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-calendar-check-fill">&nbsp; Posted</dt>
                                                    <dd class="col-sm-8">01/01/24 at 10:16 P.M.</span></dd>
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
                <div class="col">
                    <div class="card shadow-lg" data-bs-toggle="modal" data-bs-target="#item1">
                        <img src="picture/elmo.jpg" class="rounded-top">

                        <div class="card-body">
                            <p class="h5 card-text text-truncate">
                                Elmo Stuffed Toy
                            </p>
                            <div class="row">
                                <div class="col">
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
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <p class="text-start text-secondary">
                                        <small>Open for:</small>
                                        <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Borrow</span>
                                </div>
                                <div class="col">
                                    <p class="text-end bi-cart-plus" style="font-size: 1.3rem;">
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header bg-dark text-light">
                                                <p class="modal-title h4" id="item1">Details</p>
                                            </div>
                                            <!--- End of Modal Header --->

                                            <!--- Modal Body --->
                                            <div class="modal-body">
                                                <img src="picture/elmo.jpg" class="img-fluid rounded">
                                                <hr>
                                                <dl class="row">
                                                    <dt class="col-sm-4 text-secondary bi-card-text">&nbsp; Description</dt>
                                                    <dd class="col-sm-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                                                    <dt class="col-sm-4 text-secondary bi-star-fill">&nbsp; Condition</dt>
                                                    <dd class="col-sm-8">New</dd>

                                                    <dt class="col-sm-4 text-secondary bi-check-circle-fill">&nbsp; Availability</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Available</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-arrow-repeat">&nbsp; Open for</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Barter</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-calendar-check-fill">&nbsp; Posted</dt>
                                                    <dd class="col-sm-8">01/01/24 at 10:16 P.M.</span></dd>
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
                <div class="col">
                    <div class="card shadow-lg" data-bs-toggle="modal" data-bs-target="#item1">
                        <img src="picture/elmo.jpg" class="rounded-top">

                        <div class="card-body">
                            <p class="h5 card-text text-truncate">
                                Elmo Stuffed Toy
                            </p>
                            <div class="row">
                                <div class="col">
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
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <p class="text-start text-secondary">
                                        <small>Open for:</small>
                                        <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Borrow</span>
                                </div>
                                <div class="col">
                                    <p class="text-end bi-cart-plus" style="font-size: 1.3rem;">
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header bg-dark text-light">
                                                <p class="modal-title h4" id="item1">Details</p>
                                            </div>
                                            <!--- End of Modal Header --->

                                            <!--- Modal Body --->
                                            <div class="modal-body">
                                                <img src="picture/elmo.jpg" class="img-fluid rounded">
                                                <hr>
                                                <dl class="row">
                                                    <dt class="col-sm-4 text-secondary bi-card-text">&nbsp; Description</dt>
                                                    <dd class="col-sm-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                                                    <dt class="col-sm-4 text-secondary bi-star-fill">&nbsp; Condition</dt>
                                                    <dd class="col-sm-8">New</dd>

                                                    <dt class="col-sm-4 text-secondary bi-check-circle-fill">&nbsp; Availability</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Available</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-arrow-repeat">&nbsp; Open for</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Barter</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-calendar-check-fill">&nbsp; Posted</dt>
                                                    <dd class="col-sm-8">01/01/24 at 10:16 P.M.</span></dd>
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
                <div class="col">
                    <div class="card shadow-lg" data-bs-toggle="modal" data-bs-target="#item1">
                        <img src="picture/elmo.jpg" class="rounded-top">

                        <div class="card-body">
                            <p class="h5 card-text text-truncate">
                                Elmo Stuffed Toy
                            </p>
                            <div class="row">
                                <div class="col">
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
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <p class="text-start text-secondary">
                                        <small>Open for:</small>
                                        <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Borrow</span>
                                </div>
                                <div class="col">
                                    <p class="text-end bi-cart-plus" style="font-size: 1.3rem;">
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header bg-dark text-light">
                                                <p class="modal-title h4" id="item1">Details</p>
                                            </div>
                                            <!--- End of Modal Header --->

                                            <!--- Modal Body --->
                                            <div class="modal-body">
                                                <img src="picture/elmo.jpg" class="img-fluid rounded">
                                                <hr>
                                                <dl class="row">
                                                    <dt class="col-sm-4 text-secondary bi-card-text">&nbsp; Description</dt>
                                                    <dd class="col-sm-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</dd>

                                                    <dt class="col-sm-4 text-secondary bi-star-fill">&nbsp; Condition</dt>
                                                    <dd class="col-sm-8">New</dd>

                                                    <dt class="col-sm-4 text-secondary bi-check-circle-fill">&nbsp; Availability</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-success-subtle text-success-emphasis rounded-pill">Available</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-arrow-repeat">&nbsp; Open for</dt>
                                                    <dd class="col-sm-8"><span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Barter</span></dd>

                                                    <dt class="col-sm-4 text-secondary bi-calendar-check-fill">&nbsp; Posted</dt>
                                                    <dd class="col-sm-8">01/01/24 at 10:16 P.M.</span></dd>
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
        </div><!-- /.container -->
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="mt-3"></div>
            <div class="row justify-content-center">
                <div class="col-auto"> <a class="btn btn-outline-dark" href="finditem.php" role="button">See More</a> </div>
            </div>
        </div>
        l
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>