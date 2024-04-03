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
                        <div class="card" data-bs-toggle="modal" data-bs-target="#itemDetailModal" onclick="populateModal('<?php echo $item['itemName']; ?>', '<?php echo $item['itemImage_path']; ?>', '<?php echo $item['ItemDescription']; ?>', '<?php echo $item['itemCondition']; ?>', '<?php echo $item['itemAvailability']; ?>', '<?php echo $item['requestType']; ?>', '<?php echo $item['price']; ?>')">
                            <img src="pictures/<?php echo $item['itemImage_path']; ?>" class="card-img-top" alt="<?php echo $item['itemName']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item['itemName']; ?></h5>
                                <p class="card-text"><i class="bi bi-tags-fill"></i> Category: <?php echo $item['category']; ?></p>
                                <p class="card-text"><i class="bi bi-card-text"></i> Item Description: <?php echo $item['ItemDescription']; ?></p>
                                <p class="card-text"><i class="bi bi-hammer"></i> Item Condition: <?php echo $item['itemCondition']; ?></p>
                                <p class="card-text"><i class="bi bi-box-seam"></i> Item Availability: <?php echo $item['itemAvailability']; ?></p>
                                <p class="card-text"><i class="bi bi-person-fill"></i> Request Type: <?php echo $item['requestType']; ?></p>
                                <?php if ($item['price'] !== null) { ?>
                                    <p class="card-text"><i class="bi bi-cash-coin"></i> Price: $<?php echo $item['price']; ?></p>
                                <?php } ?>
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
                        <img id="modalItemImage" src="" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h5 id="modalItemName"></h5>
                        <p><i class="bi bi-tags-fill"></i> Category: <span id="modalItemCategory"></span></p>
                        <p><i class="bi bi-card-text"></i> Description: <span id="modalItemDescription"></span></p>
                        <p><i class="bi bi-hammer"></i> Condition: <span id="modalItemCondition"></span></p>
                        <p><i class="bi bi-box-seam"></i> Availability: <span id="modalItemAvailability"></span></p>
                        <p><i class="bi bi-person-fill"></i> Request Type: <span id="modalItemRequestType"></span></p>
                        <p><i class="bi bi-cash-coin"></i> Price: <span id="modalItemPrice"></span></p>
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
                    <div class="mb-3">
                        <label for="itemPicture" class="form-label"><i class="bi bi-image"></i> Item Picture:</label>
                        <input type="file" class="form-control" id="itemPicture" name="fileToUpload" accept="image/*" onchange="previewImage(this)">
                        <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid mt-3" style="max-height: 200px; display: none;">
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
                            <input class="form-check-input" type="checkbox" value="barter" name="requestType" id="requestTypeBarter">
                            <label class="form-check-label" for="requestTypeBarter">
                                Barter
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="borrow" name="requestType" id="requestTypeBorrow">
                            <label class="form-check-label" for="requestTypeBorrow">
                                Borrow
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="buy" name="requestType" id="requestTypeBuy">
                            <label class="form-check-label" for="requestTypeBuy">
                                Buy
                            </label>
                        </div>
                    </div>
                    <div class="mb-3" id="priceField" style="display: none;">
                        <label for="price" class="form-label"><i class="bi bi-cash"></i> Price:</label>
                        <input type="number" class="form-control" id="price" placeholder="Enter item price">
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

    // Get the price if the request type is "buy"
    if (requestTypes.includes('buy')) {
        var itemPrice = $('#price').val();
        if (itemPrice === '') {
            alert('Please enter the item price.');
            return;
        }
        formData.append('price', itemPrice);
    }

    // Send the form data to the server
    $.ajax({
        type: 'POST',
        url: 'upload.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // Handle the successful upload
            if (response !== 'Error') {
                alert('Item uploaded successfully');
                // Close the modal
                $('#uploadModal').modal('hide');
                // Reset the form fields
                $('#uploadForm')[0].reset();
                // Hide the image preview
                $('#imagePreview').hide();
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
    if ($('#requestTypeBuy').is(':checked')) {
        $('#priceField').show();
    } else {
        $('#priceField').hide();
        $('#price').val('');
    }
});
</script>

    <script>
 function populateModal(itemName, itemDescription, category, condition, availability, requestType, price) {
    document.getElementById('modalItemName').textContent = itemName;
document.getElementById('modalItemImage').src = "pictures/<?php echo $item['itemImage_path']; ?>";
    document.getElementById('modalItemDescription').textContent = itemDescription;
    document.getElementById('modalItemCategory').textContent = category;
    document.getElementById('modalItemCondition').textContent = condition;
    document.getElementById('modalItemAvailability').textContent = availability;
    document.getElementById('modalItemRequestType').textContent = requestType;
    document.getElementById('modalItemPrice').textContent = price !== null ? '$' + price : 'N/A';
}
</script>
</body>
</html>
