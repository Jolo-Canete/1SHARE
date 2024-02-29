<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ItemDetail</title>
</head>
<body>
<header> <?php
include "nav.php";
?></header>
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
                                <p class="text-start"><b>Open for:</b>&nbsp; <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Barter</span></p>
                            </div>
                        </div>
                        <p class="text-start"><b>Address:</b>&nbsp;Purok 31, Zone 13</b></p>
                        <p class="text-start"><b>Pick up Location:</b>&nbsp;Overton</p>
                        <p class="text-start"><b>Owned by:</b>&nbsp;<span class="badge  align-items-center text-dark-emphasis bg-dark-subtle border border-dark-subtle rounded-pill">
                                <img class="rounded-circle me-1" width="23" height="23" src="picture/elmo.jpg">Elmo
                            </span></p>

                        <button type="button" class="btn btn-outline-dark">Barter</button>
                        <button class="btn disabled btn-outline-dark" aria-disabled="true" role="button" data-bs-toggle="button">Borrow</button>
                        <button class="btn disabled btn-outline-dark" aria-disabled="true" role="button" data-bs-toggle="button">Lend</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-start h2">
                    <b>Resident Reviews</b>
                </p>
            </div>
        </div>
    </div> 
</body>
</html>