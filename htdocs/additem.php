<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Inventory</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container-box {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-content {
            background-color: #f8f9fa;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            border-bottom: none;
            background-color: #343a40;
            color: #fff;
        }

        .modal-body p {
            margin-bottom: 10px;
        }

        .modal-footer {
            background-color: #e9ecef;
        }

        #but{
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
            border: 2px solid #28a745;
            border-radius: 20px;
            transition: all 0.3s ease-in-out;   
        }

        .container .btn-add:hover {
            background-color: #333333;
            color: #fff;
        }

       

        .item-detail .modal-body {
            display: flex;
            align-items: center;
        }

        .item-detail .modal-body img {
            max-width: 50%; /* Half of the modal body */
            height: auto;
            border-radius: 10px;
        }

        .item-detail .modal-body .modal-details {
            flex: 1;
            padding-left: 20px; /* Add some spacing between image and details */
        }
    </style>
</head>
<body>
 <?php
                include "nav.php";
                ?>
    
    <br>
    <h1 class="text-center mb-4"><i class="bi bi-archive-fill"></i> My Items</h1>
    <div class="container">
        <button id="but" type="button" class="btn btn-add mb-3 border border-success rounded-pill" data-bs-toggle="modal" data-bs-target="#uploadModal">
            <i class="bi bi-plus"></i> Add New Item
        </button>
    </div>

    <div class="container">
        <div class="container-box">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Item Card 1 -->
        <div class="col">
            <div class="card" data-bs-toggle="modal" data-bs-target="#itemDetailModal" onclick="populateModal('Item 1', 'picture/elmo.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.', 'January 1, 2024', 'Like New', 'Available', 'Barter')">
                <img src="picture/elmo.jpg" class="card-img-top" alt="Item 1">
                <div class="card-body">
                    <h5 class="card-title">Elmo</h5>
                    <p class="card-text"><i class="bi bi-card-text"></i> Item Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</p>
                    <p class="card-text"><i class="bi bi-calendar"></i> Date and Time Posted: January 1, 2024</p>
                    <p class="card-text"><i class="bi bi-star-fill"></i> Condition: Like New</p>
                    <p class="card-text"><i class="bi bi-check-circle-fill"></i> Availability: Available</p>
                    <p class="card-text"><i class="bi bi-arrow-repeat"></i> Request Type: Barter</p>
                </div>
            </div>
        </div>
        <!-- Item Card 2 -->
        <div class="col">
            <div class="card" data-bs-toggle="modal" data-bs-target="#itemDetailModal" onclick="populateModal('Item 2', 'picture/elmo.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.', 'January 1, 2024', 'Like New', 'Available', 'Barter')">
                <img src="picture/elmo.jpg" class="card-img-top" alt="Item 2">
                <div class="card-body">
                    <h5 class="card-title">Elmo</h5>
                    <p class="card-text"><i class="bi bi-card-text"></i> Item Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</p>
                    <p class="card-text"><i class="bi bi-calendar"></i> Date and Time Posted: January 1, 2024</p>
                    <p class="card-text"><i class="bi bi-star-fill"></i> Condition: Very New</p>
                    <p class="card-text"><i class="bi bi-check-circle-fill"></i> Availability: Available</p>
                    <p class="card-text"><i class="bi bi-arrow-repeat"></i> Request Type: Borrow</p>
                </div>
            </div>
        </div>
        <!-- Item Card 3 -->
        <div class="col">
            <div class="card" data-bs-toggle="modal" data-bs-target="#itemDetailModal" onclick="populateModal('Item 3', 'picture/elmo.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.', 'January 1, 2024', 'Like New', 'Available', 'Barter')">
                <img src="picture/elmo.jpg" class="card-img-top" alt="Item 3">
                <div class="card-body">
                    <h5 class="card-title">Elmo</h5>
                    <p class="card-text"><i class="bi bi-card-text"></i> Item Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin euismod tristique hendrerit. Duis quis luctus nunc.</p>
                    <p class="card-text"><i class="bi bi-calendar"></i> Date and Time Posted: January 1, 2024</p>
                    <p class="card-text"><i class="bi bi-star-fill"></i> Condition: Like Old</p>
                    <p class="card-text"><i class="bi bi-check-circle-fill"></i> Availability: Available</p>
                    <p class="card-text"><i class="bi bi-arrow-repeat"></i> Request Type: Barter/Borrow</p>
                </div>
            </div>
        </div>
        <!-- Repeat the pattern for more items -->
        <!-- Item Card 4 -->
        <div class="col">
            <!-- Content for Item Card 4 -->
        </div>
        <!-- Item Card 5 -->
        <div class="col">
            <!-- Content for Item Card 5 -->
        </div>
        <!-- Item Card 6 -->
        <div class="col">
            <!-- Content for Item Card 6 -->
        </div>
        <!-- Item Card 7 -->
        <div class="col">
            <!-- Content for Item Card 7 -->
        </div>
        <!-- Item Card 8 -->
        <div class="col">
            <!-- Content for Item Card 8 -->
        </div>
        <!-- Item Card 9 -->
        <div class="col">
            <!-- Content for Item Card 9

 <!-- Item Detail Modal -->
 <div class="modal fade item-detail" id="itemDetailModal" tabindex="-1" aria-labelledby="itemDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="itemDetailModalLabel">
                        <i class="bi bi-info-circle-fill"></i> Item Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalItemImage" src="" alt="">
                    <div class="modal-details">
                        <h5 id="modalItemName"></h5>
                        <p><i class="bi bi-card-text"></i> <span id="modalItemDescription"></span></p>
                        <p><i class="bi bi-calendar"></i> <span id="modalItemDatePosted"></span></p>
                        <p><i class="bi bi-star-fill"></i> <span id="modalItemCondition"></span></p>
                        <p><i class="bi bi-check-circle-fill"></i> <span id="modalItemAvailability"></span></p>
                        <p><i class="bi bi-arrow-repeat"></i> <span id="modalItemRequestType"></span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i> Close
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Upload Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="uploadModalLabel">Add New Item</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="itemPicture" class="form-label"><i class="bi bi-image"></i> Item Picture:</label>
                            <input type="file" class="form-control" id="itemPicture">
                        </div>
                        <div class="mb-3">
                            <label for="itemName" class="form-label"><i class="bi bi-card-heading"></i> Item Name:</label>
                            <input type="text" class="form-control" id="itemName">
                        </div>
                        <div class="mb-3">
                            <label for="itemDescription" class="form-label"><i class="bi bi-card-text"></i> Item Description:</label>
                            <input type="text" class="form-control" id="itemDescription">
                        </div>
                        <div class="mb-3">
                            <label for="itemCondition" class="form-label"><i class="bi bi-gem"></i> Item Condition:</label>
                            <input type="text" class="form-control" id="itemCondition">
                        </div>
                        <div class="mb-3">
                            <label for="itemAvailability" class="form-label"><i class="bi bi-check2-circle"></i> Availability:</label>
                            <select class="form-select" id="itemAvailability">
                            <option value="" selected>Select an option...</option>
                                <option value="available">Available</option>
                                <option value="notAvailable">Not Available</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-arrow-repeat"></i> Request Type:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="barter" id="requestTypeBarter">
                                <label class="form-check-label" for="requestTypeBarter">
                                    Barter
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="borrow" id="requestTypeBorrow">
                                <label class="form-check-label" for="requestTypeBorrow">
                                    Borrow
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x"></i> Close</button>
                    <button id="but" type="button" class="btn btn-add btn-outline-dark"><i class="bi bi-cloud-upload"></i> Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function populateModal(name, image, description, datePosted, condition, availability, requestType) {
            document.getElementById("modalItemImage").src = image; // Set src to image path directly
            document.getElementById("modalItemName").innerText = name;
            document.getElementById("modalItemDescription").innerText = "Item Description: " + description;
            document.getElementById("modalItemDatePosted").innerText = "Date and Time Posted: " + datePosted;
            document.getElementById("modalItemCondition").innerText = "Condition: " + condition;
            document.getElementById("modalItemAvailability").innerText = "Availability: " + availability;
            document.getElementById("modalItemRequestType").innerText = "Request Type: " + requestType;
        }
    </script>
</body>
</html>