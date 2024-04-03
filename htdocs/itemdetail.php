<?php
        include "nav.php";
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ItemDetail</title>
    <style>
          .review-container {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
    }
    .review-box {
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 15px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .rating {
        color: #ffd700; /* Yellow color for stars */
    }
    .star {
        font-size: 20px;
        margin-right: 5px;
    }
    .star-empty {
        color: #ccc;
    }
    .overall-rating {
        font-size: 24px;
        margin-top: 20px;
        color: orangered; /* Yellow color for overall rating */
    }
    </style>
</head>

<body>
    
    <div class="page-content" id="content">

    <br>
    <div class="container text-center">
        <div class="row">
            <div class="col-6">
                <img src="picture/elmo.jpg" class="rounded" style="max-width: 540px;" height="490px" alt="Elmo">
            </div>
            <div class="col-6">
                <div class="card overflow-auto shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="max-width: 530px; height: 30.7rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title text-start">Elmo Stuff Toy</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="card-text text-start">Elmo also shows off his friendly smile and features a soft, huggable body that makes him perfect for all ages 1 and up. This plush toy is surface-washable for easy cleaning and ships in a protective poly bag. GUND has teamed up with Sesame Street to make playtime a more huggable experience!</p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <p class="text-start"><b>Category:</b>&nbsp;Toys</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text-start"><b>Status:</b>&nbsp;<span class="badge bg-success-subtle text-success-emphasis rounded-pill">Available</span></p>
                            </div>
                            <div class="col">
                                <p class="text-start"><b>Open for:</b>&nbsp;
                                    <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">
                                        Barter <i class="bi bi-arrow-repeat"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <p class="text-start"><b>Address:</b>&nbsp;Purok 31, Zone 13</b></p>
                        <p class="text-start"><b>Pick up Location:</b>&nbsp;Overton</p>
                        <p class="text-start"><b>Owned by:</b>&nbsp;
                            <span class="badge align-items-center text-light-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
                                <img class="rounded-circle me-1" width="23" height="23" src="picture/elmo.jpg">Elmo
                            </span>
                        </p>

                        <!-- Barter Button -->
                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#barterModal">Barter</button>
                        <!-- Borrow Button -->
                        <button type="button" class="btn btn-outline-dark disabled" data-bs-toggle="modal" data-bs-target="#borrowModal">Borrow</button>
                        <!-- Lend Button -->
                       

                        <!-- Barter Modal -->
                        <div class="modal fade" id="barterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Barter</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">

                                                <!-- Choose Item from Owned Items -->
                                                <div class="form-group">
                                                    <label for="ownedItem">Choose an item from your owned items:</label>
                                                    <select class="form-select" id="ownedItem">
                                                        <option selected disabled>Select an item</option>
                                                        <option value="item1">Item 1</option>
                                                        <option value="item2">Item 2</option>
                                                        <option value="item3">Item 3</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                  
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Request</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="borrowModal" tabindex="-1" aria-labelledby="borrowModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="borrowModalLabel">Borrow</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Borrow Form -->
                                        <form>
                                            <div class="mb-3">
                                                <label for="borrowStartDate" class="form-label">Start Date:</label>
                                                <input type="date" class="form-control" id="borrowStartDate">
                                            </div>
                                            <div class="mb-3">
                                                <label for="borrowEndDate" class="form-label">End Date:</label>
                                                <input type="date" class="form-control" id="borrowEndDate">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Request</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        <div class="container text-left">
    <div class="col">
        <p class="text-start h2">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Resident Reviews</b>
        </p>
        
        <div class="review-container" style="height: 300px; overflow-y: auto;">
            <div class="card">
                <div class="card-body">
                    <div class="overall-rating" style="font-size: 24px; color: #ffbb00; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                        Overall Rating: 4.75
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="review-box">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text">"This item is amazing! 5 stars!"</p>
                        <p class="text-muted">Date: 2024-03-05 10:30 AM</p>
                        <div class="rating">
                        <span class="star" style="color: #ffbb00;">&#9733; </span>
                            <span class="star" style="color: #ffbb00;">&#9733; </span>
                            <span class="star" style="color: #ffbb00;">&#9733; </span>
                            <span class="star" style="color: #ffbb00;">&#9733; </span>
                            <span class="star" style="color: #ffbb00;">&#9733; 5/5</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="review-box">
                        <h5 class="card-title">Jane Smith</h5>
                        <p class="card-text">"Great item, highly recommended! 4 stars!"</p>
                        <p class="text-muted">Date: 2024-03-04 3:45 PM</p>
                        <div class="rating">
                            <span class="star" style="color: #ffbb00;">&#9733; </span>
                            <span class="star" style="color: #ffbb00;">&#9733; </span>
                            <span class="star" style="color: #ffbb00;">&#9733; </span>
                            <span class="star-empty" style="color: #ffbb00;">&#9733; 4/5</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more reviews here -->
        </div>
    </div>
</div>
</div>


</body>

</html>