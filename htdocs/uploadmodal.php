<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h5 class="modal-title" id="uploadModalLabel">Add New Item</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadingIndicator" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); z-index:9999;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div id="loadingMessage" class="text-center mt-2">Uploading...</div>
                </div>
                <form id="uploadForm">
                    <div class="mb-3 <?php echo isset($errors['itemPicture']) ? 'has-error' : ''; ?>">
                        <label for="itemPicture" class="form-label"><i class="bi bi-image"></i> *Item Picture:</label>
                        <input type="file" class="form-control <?php echo isset($errors['itemPicture']) ? 'is-invalid' : ''; ?>" id="itemPicture" name="fileToUpload" accept="image/*" onchange="previewImage(this)" required>
                        <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid mt-3" style="max-height: 200px; display: none;">
                        <?php if (isset($errors['itemPicture'])) { ?>
                            <div class="invalid-feedback"><?php echo $errors['itemPicture']; ?></div>
                        <?php } else { ?>
                            <div class="invalid-feedback">⚠️ Please select an image.</div>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label for="itemName" class="form-label"><i class="bi bi-card-heading"></i> *Item Name:</label>
                        <input type="text" class="form-control <?php echo isset($errors['itemName']) ? 'is-invalid' : ''; ?>" id="itemName" placeholder="Enter item name" required>
                        <div class="invalid-feedback">⚠️ Please enter an item name.</div>
                    </div>
                    <div class="mb-3">
                        <label for="itemDescription" class="form-label"><i class="bi bi-card-text"></i> Item Description:</label>
                        <input type="text" class="form-control" id="itemDescription" placeholder="Enter item description">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label"><i class="bi bi-tags"></i> *Category:</label>
                        <select class="form-select <?php echo isset($errors['category']) ? 'is-invalid' : ''; ?>" id="category" required>
                            <option value="" selected disabled>Select item category</option>
                            <option value="Toys">Toys</option>
                            <option value="Cloths">Cloths</option>
                            <option value="Kitchen Utensils">Kitchen Utensils</option>
                            <option value="Tools">Tools</option>
                            <option value="Sports Items">Sports Items</option>
                            <option value="School Supply">School Supply</option>
                            <option value="Others">Others</option>
                            <!-- Add more options as needed -->
                        </select>
                        <div id="specifyCategoryInput" style="display: none;">
                            <label for="otherCategory" class="form-label"><i class="bi bi-tags"></i> *Specify Category:</label>
                            <input type="text" class="form-control" id="otherCategory" placeholder="Enter other category">
                        </div>
                        <div class="invalid-feedback">⚠️ Please select a category.</div>
                        <br>
                        <div class="mb-3">
                            <label for="itemQuantity" class="form-label"><i class="bi bi-box-arrow-down"></i> *Item Quantity:</label>
                            <input type="number" class="form-control" id="itemQuantity" min="1" placeholder="Enter item quantity" required>
                        </div>
                        <div class="invalid-feedback">⚠️ Please add a Quantity.</div>

                    </div>
                    <div class="mb-3">
                        <label for="itemCondition" class="form-label"><i class="bi bi-gem"></i> *Item Condition:</label>
                        <input type="text" class="form-control <?php echo isset($errors['itemCondition']) ? 'is-invalid' : ''; ?>" id="itemCondition" placeholder="Enter item condition (e.g. new, old, good, bad)" required>
                        <div class="invalid-feedback">⚠️ Please enter the item condition.</div>
                    </div>
                    <div class="mb-3">
                        <label for="itemAvailability" class="form-label"><i class="bi bi-check2-circle"></i> *Availability:</label>
                        <select class="form-select <?php echo isset($errors['itemAvailability']) ? 'is-invalid' : ''; ?>" id="itemAvailability" required>
                            <option value="" selected>Select an option...</option>
                            <option value="Available">Available</option>
                            <option value="Unavailable">Not Available</option>
                        </select>
                        <div class="invalid-feedback">⚠️ Please select an availability option.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-arrow-repeat"></i> *Open For:</label>
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
                        <div class="invalid-feedback">⚠️ Please select at least one request type.</div>
                    </div>
                    <div class="mb-3" id="buyPriceField" style="display: none;">
                        <label for="buyPrice" class="form-label"><i class="bi bi-cash"></i> Selling Price(₱):</label>
                        <input type="text" class="form-control" id="buyPrice" min="0" step=".01" placeholder="Enter selling price">
                    </div>
                    <div class="mb-3" id="borrowPriceField" style="display: none;">
                        <label for="borrowPrice" class="form-label"><i class="bi bi-cash"></i> Borrow Price(₱):</label>
                        <input type="number" class="form-control" id="borrowPrice" min="0" step=".01" placeholder="Enter borrow price">
                    </div>
                    <div class="mb-3" id="borrowDurationField" style="display: none;">
                        <label for="borrowDuration" class="form-label"><i class="bi bi-clock"></i> Borrow Duration:</label>
                        <input type="number" class="form-control" id="borrowDuration" min="0" placeholder="Enter borrow duration (in days)">
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
        // Disable the submit button to prevent multiple submissions
        $('#but').prop('disabled', true);

        // Get the form data
        var formData = new FormData();
        formData.append('fileToUpload', $('#itemPicture')[0].files[0]);
        formData.append('itemName', $('#itemName').val());
        formData.append('itemQuantity', parseInt($('#itemQuantity').val()));
        formData.append('itemDescription', $('#itemDescription').val());
        formData.append('category', $('#category').val());
        // Check for "Others" category
        var selectedCategory = $('#category').val();
        if (selectedCategory === 'Others') {
            var otherCategory = $('#otherCategory').val();
            if (!otherCategory) {
                $('#otherCategory').addClass('is-invalid');
                isValid = false;
                // Re-enable the submit button
                $('#but').prop('disabled', false);
                return; // Stop further processing if category is not valid
            } else {
                formData.append('otherCategory', otherCategory);
            }
        }
        formData.append('itemCondition', $('#itemCondition').val());
        formData.append('itemAvailability', $('#itemAvailability').val());
        var requestTypes = $('input[name="requestType"]:checked').map(function() {
            return this.value;
        }).get();
        formData.append('requestTypes', requestTypes.join(','));

        // Check if required fields are filled
        var isValid = true;
        if (!$('#itemPicture')[0].files[0]) {
            $('#itemPicture').addClass('is-invalid');
            isValid = false;
        }
        if (!$('#itemQuantity').val()) {
            $('#itemQuantity').addClass('is-invalid');
            isValid = false;
        }

        if (!$('#itemName').val()) {
            $('#itemName').addClass('is-invalid');
            isValid = false;
        }
        if (!$('#category').val()) {
            $('#category').addClass('is-invalid');
            isValid = false;
        }
        if (!$('#itemCondition').val()) {
            $('#itemCondition').addClass('is-invalid');
            isValid = false;
        }
        if (!$('#itemAvailability').val()) {
            $('#itemAvailability').addClass('is-invalid');
            isValid = false;
        }
        if (requestTypes.length === 0) {
            $('.form-check-input[name="requestType"]').closest('.form-check').addClass('is-invalid');
            isValid = false;
        }

        // Check for "Buy" request type
        if (requestTypes.includes('Buy')) {
            var buyPrice = $('#buyPrice').val();
            if (!buyPrice) {
                $('#buyPrice').addClass('is-invalid');
                isValid = false;
            } else {
                // Parse the buy price to float
                buyPrice = parseFloat(buyPrice);
                if (isNaN(buyPrice) || buyPrice <= 0) {
                    $('#buyPrice').addClass('is-invalid');
                    alert('Please enter a valid item price.');
                    isValid = false;
                } else {
                    formData.append('buyPrice', buyPrice);
                }
            }
        }

        // Check for "Borrow" request type
        if (requestTypes.includes('Borrow')) {
            var borrowPrice = $('#borrowPrice').val();
            var borrowDuration = $('#borrowDuration').val();
            if (!borrowPrice) {
                $('#borrowPrice').addClass('is-invalid');
                isValid = false;
            } else {
                // Parse the borrow price to float
                borrowPrice = parseFloat(borrowPrice);
                if (isNaN(borrowPrice) || borrowPrice <= 0) {
                    $('#borrowPrice').addClass('is-invalid');
                    alert('Please enter a valid item price.');
                    isValid = false;
                } else {
                    formData.append('borrowPrice', borrowPrice);
                }
            }
            if (!borrowDuration) {
                $('#borrowDuration').addClass('is-invalid');
                isValid = false;
            } else {
                // Parse the borrow duration to float
                borrowDuration = parseFloat(borrowDuration);
                if (isNaN(borrowDuration) || borrowDuration <= 0) {
                    $('#borrowDuration').addClass('is-invalid');
                    alert('Please enter a valid borrow duration.');
                    isValid = false;
                } else {
                    formData.append('borrowDuration', borrowDuration);
                }
            }
        }

        if (!isValid) {
            // Re-enable the submit button
            $('#but').prop('disabled', false);
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
            },
            complete: function() {
                // Re-enable the submit button after form submission is complete
                $('#but').prop('disabled', false);
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


    var selectedCategory = $('#category').val();

    console.log(selectedCategory);
    // jQuery script to show/hide specify category input based on selected category
    $('#category').on('change', function() {
        var selectedCategory = $(this).val();


        // Show/hide the specify category input field
        if (selectedCategory === 'Others') {
            $('#specifyCategoryInput').show();
        } else {
            $('#specifyCategoryInput').hide();
            $('#otherCategory').val('');
        }
    });
</script>