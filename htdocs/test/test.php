<?php
include "nav.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Inventory</title>


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
            padding: 10px;
            transition: transform 0.3s;
        }

        .card-img-top {
            width: 100%;
            height: 300px;
            /* Adjust the height as needed */
            object-fit: fill;
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

        #but {
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
            max-width: 100%;
            /* Half of the modal body */
            height: 300px;
            /* Adjust the height as needed */
            object-fit: fill;
            border-radius: 10px;
        }

        .item-detail .modal-body .modal-details {
            flex: 1;
            /* Add some spacing between image and details */
        }
    </style>
</head>

<body>
    <?php
    // Retrieve the user's items
    $userID = $_SESSION['user_id'];
    $sqlSelect = "SELECT * FROM item WHERE userID = ?";
    $stmt = $conn->prepare($sqlSelect);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $items = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    ?>

    <div class="page-content" id="content">
        <br>
        <h1 class="text-center mb-4"><i class="bi bi-archive-fill"></i> MY ITEMS</h1>
        <div class="container">
            <button id="but" type="button" class="btn btn btn-outline-success btn-add mb-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#uploadModal">
                <i class="bi bi-plus"></i> Add New Item
            </button>
        </div>

        <div class="container">
            <div class="container-box">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($items as $item) { ?>
                        <!-- Item Card -->
                        <div class="col">
                            <div class="card" data-bs-toggle="modal" data-bs-target="#itemDetailModal" onclick="populateModal('<?php echo $item['itemName']; ?>', '<?php echo $item['itemImage_path']; ?>', '<?php echo $item['itemAvailability']; ?>', '<?php echo $item['requestType']; ?>')">
                                <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="card-img-top" alt="<?php echo $item['itemName']; ?>">

                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $item['itemName']; ?></h5>

                                </div>
                                <div class="col d-flex align-items-center">
                                    <p class="text-start text-secondary">
                                        <small>Open for:</small>
                                        <?php
                                        $requestTypes = explode(',', $item['requestType']);
                                        foreach ($requestTypes as $requestType) {
                                            echo "<span class='badge bg-secondary-subtle text-secondary-emphasis rounded-pill'>" . $requestType . "</span> ";
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <p class="text-start text-secondary">
                                        <small>Availability:</small>
                                        <?php
                                        $availability = $item['itemAvailability'];
                                        $badgeColor = ($availability == 'Available') ? 'bg-success-subtle text-success-emphasis' : 'bg-danger-subtle text-danger-emphasis';
                                        echo "<span class='badge $badgeColor rounded-pill'>$availability</span>";
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>


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
                        <div class="row">
                            <div class="col-md-6">
                                <img id="modalItemImage" src="" alt="" class="img-fluid rounded">
                            </div>

                            <div class="col-md-6">
                                <!-- Item Name -->
                                <h5 id="modalItemName"></h5>

                                <!-- Other Item Details -->
                                <p><i class="bi bi-tags-fill"></i> Category: <span id="modalItemCategory"></span></p>
                                <p><i class="bi bi-card-text"></i> Description: <span id="modalItemDescription"></span></p>
                                <p><i class="bi bi-hammer"></i> Condition: <span id="modalItemCondition"></span></p>
                                <p><i class="bi bi-box-seam"></i> Availability: <span id="modalItemAvailability"></span></p>
                                <p><i class="bi bi-person-fill"></i> Open For: <span id="modalItemRequestType"></span></p>

                                <!-- Display Buy Price field if request type is Buy -->
                                <div id="buyPriceField" style="display: none;">
                                    <p><i class="bi bi-cash-coin"></i> Buy Price: <span id="modalBuyPrice"></span></p>
                                </div>

                                <!-- Display Borrow Price and Borrowed Duration fields if request type is Borrow -->
                                <div id="borrowFields" style="display: none;">
                                    <p><i class="bi bi-cash"></i> Borrow Price: <span id="modalBorrowPrice"></span></p>
                                    <p><i class="bi bi-clock"></i> Borrowed Duration: <span id="modalBorrowDuration"></span></p>
                                </div>

                                <!-- Display Date Time Posted -->
                                <p><i class="bi bi-calendar"></i> Date Time Posted: <span id="modalDateTimePosted"></span></p>
                            </div>
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
                        <form id="uploadForm">
                            <div class="mb-3 <?php echo isset($errors['itemPicture']) ? 'has-error' : ''; ?>">
                                <label for="itemPicture" class="form-label"><i class="bi bi-image"></i> Item Picture:</label>
                                <input type="file" class="form-control" id="itemPicture" name="fileToUpload" accept="image/*" onchange="previewImage(this)">
                                <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid mt-3" style="max-height: 200px; display: none;">
                                <?php if (isset($errors['itemPicture'])) { ?>
                                    <div class="invalid-feedback"><?php echo $errors['itemPicture']; ?></div>
                                <?php } ?>
                            </div>
                            <div class="mb-3">
                                <label for="itemName" class="form-label"><i class="bi bi-card-heading"></i> Item Name:</label>
                                <input type="text" class="form-control" id="itemName" placeholder="Enter item name">
                            </div>
                            <div class="mb-3">
                                <label for="itemDescription" class="form-label"><i class="bi bi-card-text"></i> Item Description:</label>
                                <input type="text" class="form-control" id="itemDescription" placeholder="Enter item description">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label"><i class="bi bi-tags"></i> Category:</label>
                                <input type="text" class="form-control" id="category" placeholder="Enter item category">
                            </div>
                            <div class="mb-3">
                                <label for="itemCondition" class="form-label"><i class="bi bi-gem"></i> Item Condition:</label>
                                <input type="text" class="form-control" id="itemCondition" placeholder="Enter item condition (e.g. new, old, good, bad)">
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
                                    <input class="form-check-input" type="checkbox" value="Barter" name="requestType" id="requestTypeBarter">
                                    <label class="form-check-label" for="requestTypeBarter">
                                        Barter
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Borrow" name="requestType" id="requestTypeBorrow">
                                    <label class="form-check-label" for="requestTypeBorrow">
                                        Borrow
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Buy" name="requestType" id="requestTypeBuy">
                                    <label class="form-check-label" for="requestTypeBuy">
                                        Buy
                                    </label>
                                </div>

                            </div>
                            <div class="mb-3" id="buyPriceField" style="display: none;">
                                <label for="buyPrice" class="form-label"><i class="bi bi-cash"></i> Selling Price:</label>
                                <input type="number" class="form-control" id="buyPrice" placeholder="Enter selling price">
                            </div>
                            <div class="mb-3" id="borrowPriceField" style="display: none;">
                                <label for="borrowPrice" class="form-label"><i class="bi bi-cash"></i> Borrow Price:</label>
                                <input type="number" class="form-control" id="borrowPrice" placeholder="Enter borrow price">
                            </div>
                            <div class="mb-3" id="borrowDurationField" style="display: none;">
                                <label for="borrowDuration" class="form-label"><i class="bi bi-clock"></i> Borrow Duration:</label>
                                <input type="number" class="form-control" id="borrowDuration" placeholder="Enter borrow duration (in days)">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x"></i> Close</button>
                        <button id="but" type="button" class="btn btn-add btn-outline-dark" onclick="uploadItem()"><i class="bi bi-cloud-upload"></i> Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function populateModal(itemName, itemImagePath, itemAvailability, requestType) {
                // Update item image
                document.getElementById('modalItemImage').src = "pictures/" + itemImagePath;

                // AJAX request to fetch item details based on item image path
                $.ajax({
                    type: 'POST',
                    url: 'get_item_details.php',
                    data: {
                        itemImagePath: itemImagePath
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Populate modal with fetched item details
                        document.getElementById('modalItemName').textContent = response.itemName;
                        document.getElementById('modalItemCategory').textContent = response.category;
                        document.getElementById('modalItemDescription').textContent = response.ItemDescription;
                        document.getElementById('modalItemCondition').textContent = response.itemCondition;
                        document.getElementById('modalItemAvailability').textContent = itemAvailability;
                        document.getElementById('modalItemRequestType').textContent = requestType;

                        // Show/hide Buy Price and Borrow fields based on the request type
                        if (requestType === 'Buy') {
                            document.getElementById('buyPriceField').style.display = 'block';
                            document.getElementById('modalBuyPrice').textContent = response.buyPrice;
                            document.getElementById('borrowFields').style.display = 'none';
                        } else if (requestType === 'Borrow') {
                            document.getElementById('buyPriceField').style.display = 'none';
                            document.getElementById('borrowFields').style.display = 'block';
                            document.getElementById('modalBorrowPrice').textContent = response.borrowPrice;
                            document.getElementById('modalBorrowDuration').textContent = response.borrowDuration;
                        } else {
                            document.getElementById('buyPriceField').style.display = 'none';
                            document.getElementById('borrowFields').style.display = 'none';
                        }
                        var datePosted = new Date(response.DateTimePosted);
                        var formattedDate = datePosted.toLocaleString('en-US', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });
                        document.getElementById('modalDateTimePosted').textContent = formattedDate;
                    },

                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            }
        </script>
        <script>
            function uploadItem() {
                // Get the form data
                var formData = new FormData();
                formData.append('fileToUpload', $('#itemPicture')[0].files[0]);
                formData.append('itemName', $('#itemName').val());
                formData.append('itemDescription', $('#itemDescription').val());
                formData.append('category', $('#category').val());
                formData.append('itemCondition', $('#itemCondition').val());
                formData.append('itemAvailability', $('#itemAvailability').val());
                var requestTypes = $('input[name="requestType"]:checked').map(function() {
                    return this.value;
                }).get();
                formData.append('requestTypes', requestTypes.join(','));

                // Get the price if the request type is "Buy"
                if (requestTypes.includes('Buy')) {
                    var buyPrice = $('#buyPrice').val();
                    if (buyPrice === '') {
                        alert('Please enter the item price.');
                        return;
                    }
                    formData.append('buyPrice', buyPrice);
                }

                // Get the price and duration if the request type is "Borrow"
                if (requestTypes.includes('Borrow')) {
                    var borrowPrice = $('#borrowPrice').val();
                    var borrowDuration = $('#borrowDuration').val();
                    if (borrowPrice === '') {
                        alert('Please enter the item price.');
                        return;
                    }
                    if (borrowDuration === '') {
                        alert('Please enter the borrow duration.');
                        return;
                    }
                    formData.append('borrowPrice', borrowPrice);
                    formData.append('borrowDuration', borrowDuration);
                }

                if (!itemPicture || !itemName || !category || !itemAvailability || requestTypes.length === 0) {
                    alert('Please fill in all required fields.');
                    return;
                }
                // Send the form data to the server
                $.ajax({
                    type: 'POST',
                    url: 'upload.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response !== 'Error') {
                            alert('Item uploaded successfully');
                            // Close the modal
                            $('#uploadModal').modal('hide');
                            // Reset the form fields
                            $('#uploadForm')[0].reset();
                            // Hide the image preview
                            $('#imagePreview').hide();
                            // Redirect to the additem.php page
                            window.location.href = 'additem.php';
                        } else {
                            // Display the error message
                            alert('Error uploading item');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle the upload error
                        alert('Error uploading file: ' + error);
                    }
                });
            }

          // Show/hide the price field based on the request type
          $('input[name="requestType"]').on('change', function() {
                var selectedRequestTypes = getSelectedRequestTypes();

                // Show/hide the buy price field
                if (selectedRequestTypes.includes('Buy')) {
                    $('#buyPriceField').show();
                } else {
                    $('#buyPriceField').hide();
                    $('#buyPrice').val('');
                }

                // Show/hide the borrow price and duration fields
                if (selectedRequestTypes.includes('Borrow')) {
                    $('#borrowPriceField').show();
                    $('#borrowDurationField').show();
                } else {
                    $('#borrowPriceField').hide();
                    $('#borrowPrice').val('');
                    $('#borrowDurationField').hide();
                    $('#borrowDuration').val('');
                }
            });

            function getSelectedRequestTypes() {
                var requestTypes = [];
                $('input[name="requestType"]:checked').each(function() {
                    requestTypes.push($(this).val());
                });
                return requestTypes;
            }

            // Preview the uploaded image
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</body>

</html>