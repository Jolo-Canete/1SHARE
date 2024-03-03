<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Item</title>
    <!--- Bootstrap 5 Icons --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
</head>

<body>
    <!--- Navigation Bar --->
    <header>
        <?php include "nav.php"; ?>
    </header>
    <!--- End of Navigation Bar --->

    <main>
        <br>
        <!--- Carousel --->
        <!--- End of Carousel --->

        <!--- Dropdown --->
        <div class="container">
            <div class="row">
                <div class="col-custom-column">
                    <div class="d-grid gap-2 d-md-block">
                        <button id="item_category" type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="item_category">
                            <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                            <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                        </ul> &nbsp;
                        <button id="sort_by_item" type="button" class="btn btn-outline-dark rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort By
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="sort_by_item">
                            <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                            <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                        </ul> &nbsp;
                        <button id="availability_of_item" type="button" class="btn btn-outline-dark rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Availability
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="availability_of_item">
                            <li><a class="dropdown-item" href="#">Available</a></li>
                            <li><a class="dropdown-item" href="#">Not Available</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!--- End of Dropdown --->

        <!--- Item Display --->
        <div class="container">
            <br>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 g-3">
                <div class="col">
                    <div class="card shadow-lg" data-bs-toggle="modal" data-bs-target="#item1">
                        <img src="picture/elmo.jpg" class="rounded-top">

                        <div class="card-body">
                            <p class="h5 card-text text-truncate">
                                Elmo Stuffed Toy
                            </p>
                            <p class="text-start text-secondary">
                                <small>Open for:</small>
                                <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span>
                            </p>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header">
                                                <p class="modal-title h4" id="item1">Details</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <dd class="col-sm-8"><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span></dd>

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
                            <p class="text-start text-secondary">
                                <small>Open for:</small>
                                <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span>
                            </p>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header">
                                                <p class="modal-title h4" id="item1">Details</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <dd class="col-sm-8"><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span></dd>

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
                            <p class="text-start text-secondary">
                                <small>Open for:</small>
                                <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span>
                            </p>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header">
                                                <p class="modal-title h4" id="item1">Details</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <dd class="col-sm-8"><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span></dd>

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
                            <p class="text-start text-secondary">
                                <small>Open for:</small>
                                <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span>
                            </p>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header">
                                                <p class="modal-title h4" id="item1">Details</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <dd class="col-sm-8"><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span></dd>

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
                            <p class="text-start text-secondary">
                                <small>Open for:</small>
                                <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span>
                            </p>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header">
                                                <p class="modal-title h4" id="item1">Details</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <dd class="col-sm-8"><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span></dd>

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
                            <p class="text-start text-secondary">
                                <small>Open for:</small>
                                <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span>
                            </p>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header">
                                                <p class="modal-title h4" id="item1">Details</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <dd class="col-sm-8"><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span></dd>

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
                            <p class="text-start text-secondary">
                                <small>Open for:</small>
                                <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span>
                            </p>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header">
                                                <p class="modal-title h4" id="item1">Details</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <dd class="col-sm-8"><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span></dd>

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
                            <p class="text-start text-secondary">
                                <small>Open for:</small>
                                <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span>
                            </p>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header">
                                                <p class="modal-title h4" id="item1">Details</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <dd class="col-sm-8"><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span></dd>

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
                            <p class="text-start text-secondary">
                                <small>Open for:</small>
                                <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span>
                            </p>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header">
                                                <p class="modal-title h4" id="item1">Details</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <dd class="col-sm-8"><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span></dd>

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
                            <p class="text-start text-secondary">
                                <small>Open for:</small>
                                <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span>
                            </p>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header">
                                                <p class="modal-title h4" id="item1">Details</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <dd class="col-sm-8"><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span></dd>

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
                            <p class="text-start text-secondary">
                                <small>Open for:</small>
                                <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span>
                            </p>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header">
                                                <p class="modal-title h4" id="item1">Details</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <dd class="col-sm-8"><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span></dd>

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
                            <p class="text-start text-secondary">
                                <small>Open for:</small>
                                <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span>
                            </p>

                            <div class="d-flex justify-content-between align-items-center justify-content-md-end">
                                <div class="modal fade" id="item1" tabindex="-1" aria-labelledby="item1" aria-hidden="true">

                                    <!--- Modal --->
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!--- Modal Header --->
                                            <div class="modal-header">
                                                <p class="modal-title h4" id="item1">Details</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <dd class="col-sm-8"><span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Bartering</span></dd>

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
        
            <!--- End of Item Display --->

            <!--- Page Buttons --->
            <br>
            <footer>
                <div class="btn-toolbar mb-3 justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                                <button type="button" class="btn btn-outline-secondary"><</button>
                                <button type="button" class="btn btn-outline-secondary">1</button>
                                <button type="button" class="btn btn-outline-secondary">2</button>
                                <button type="button" class="btn btn-outline-secondary">3</button>
                                <button type="button" class="btn btn-outline-secondary">4</button>
                                <button type="button" class="btn btn-outline-secondary">></button>
                    </div>
                </div>
            </footer>
            <!--- End of Page Buttons --->
            
    </main>

</body>

</html>