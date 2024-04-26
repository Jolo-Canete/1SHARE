<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
/* Adjust the size of the container */
.container {
  max-width: 600px; /* Adjust the max-width as per your requirement */
  margin: 0 auto; /* Center the container horizontally */
}

/* Change the background color of the header */
.card-header {
    background-color:#899499 !important; /* Change the color as per your preference */
  color: #fff; /* Change the text color to ensure good contrast */
  font-size: 1.50rem;
  padding: 0.75rem 1.25rem; /* Adjust the padding as per your design */
}
    </style>
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--- Bootstrap Icon --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>
<div class="page-content" id="content">
    <div class="container">
        <!-- Header for Table -->
        <div class="card col-12">
            <div class="card-header card bg-secondary-gray text-white">
                <b>Edit Item: Sa Pula sa Puti </b>
            </div>
    <div class="container my-5">
        <div class="page-content" id="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="card border-0">
                        <div class="card-body item-detail">
                            <form id="editItemForm" onsubmit="return uploadItem(event);">
                                <input type="hidden" name="itemID" value="6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="item-image" onclick="document.getElementById('itemPicture').click();">
                                            <img id="previewImage"> <img src="../../pictures/6617fb157f588.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="mb-3 mt-2">
                                            <div class="mb-2">
                                                <label for="itemPicture"><b>Sa Pula sa Puti</b> <span class="text-danger"></span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <!--- Owner Name --->
                                        <div class="mb-3">
                                            <label for="itemName" class="form-label"><i class="bi bi-person"></i> <b>Owned By</b> <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="itemName" name="itemName" value="Johnny Sins">
                                            <div class="invalid-feedback">⚠️ Please enter an item name.</div>
                                        </div>

                                        <!--- Item Name --->
                                        <div class="mb-3">
                                            <label for="itemName" class="form-label"><i class="bi bi-card-heading"></i> <b>Item Name</b> <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="itemName" name="itemName" value="Sa Pula sa Puti Book">
                                            <div class="invalid-feedback">⚠️ Please enter an item name.</div>
                                        </div>

                                        <!--- Item Description --->
                                        <div class="mb-3">
                                            <label for="itemDescription" class="form-label"><i class="bi bi-card-text"></i> <b>Item Description</b></label>
                                            <textarea class="form-control" id="itemDescription" name="itemDescription">A book that is slightly worn down and is used for 2 years</textarea>
                                        </div>

                                        <!--- Item Category --->
                                        <label for="category" class="form-label"><i class="bi bi-tags"></i> <b>Category</b> <span class="text-danger">*</span></label>

                                        <!--- Item Category Select --->
                                        <input type="text" class="form-control" id="itemName" name="itemName" value="Books">
                                        <br>
                                        <div id="specifyCategoryInput" placeholder="Enter other category">
                                        </div>
                                        <div class="invalid-feedback">⚠️ Please select a category.</div>

                                        <!--- Item Availability --->
                                        <div class="mb-3">
                                            <label for="itemAvailability" class="form-label"><i class="bi bi-check2-circle"></i> <b>Availability </b> <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="itemName" name="itemName" value="Borrow">
                                        </div>
                                        <div class="invalid-feedback">⚠️ Please select an availability option.</div>

                                        <!--- Item Quantity --->
                                        <div class="mb-3">
                                            <label for="itemQuantity" class="form-label"><i class="bi bi-box"></i> <b>Item Quantity</b> <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="itemQuantity" name="itemQuantity" value="6">
                                            <div class="invalid-feedback">⚠️ Please enter the item quantity.</div>
                                        </div>
                                        
                                        <!--- Item Date --->
                                        <div class="mb-3">
                                            <label for="itemQuantity" class="form-label"><i class="bi bi-calendar2-range"></i> <b>Date Posted</b> <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="itemQuantity" name="itemQuantity" value="January 20, 2024">
                                            <div class="invalid-feedback">⚠️ Please enter the item quantity.</div>
                                        </div>

                                        <!--- Item Open for --->
                                        <div class="mb-3">
                                            <label class="form-label"><i class="bi bi-arrow-repeat"></i> <b>Request Type</b> <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Barter" name="requestType[]" id="requestTypeBarter">
                                                <label class="form-check-label" for="requestTypeBarter">
                                                    Barter
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Borrow" name="requestType[]" id="requestTypeBorrow">
                                                <label class="form-check-label" for="requestTypeBorrow">
                                                    Borrow
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Buy" name="requestType[]" id="requestTypeBuy">
                                                <label class="form-check-label" for="requestTypeBuy">
                                                    Buy
                                                </label>
                                            </div>
                                            <div class="invalid-feedback">⚠️ Please select at least one request type.</div>
                                        </div>

                                        <!--- If buy, input selling price --->
                                        <div class="mb-3" id="buyPriceField">
                                            <label for="buyPrice" class="form-label"><i class="bi bi-cash"></i> <b>Selling Price (₱)</b> <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="buyPrice" name="buyPrice" value="300">
                                        </div>

                                        <!--- If borrow, input borrowing price --->
                                        <div class="mb-3" id="borrowPriceField">
                                            <label for="borrowPrice" class="form-label"><i class="bi bi-cash"></i> <b>Borrow Price (₱)</b> <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="borrowPrice" name="borrowPrice" value="120">
                                        </div>
                                        <div class="mb-3" id="borrowDurationField">

                                            <!--- If borrow, input borrowing duration --->
                                            <label for="borrowDuration" class="form-label"><i class="bi bi-clock"></i> <b>Borrow Duration (Days)</b> <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="borrowDuration" name="borrowDuration" value="6">
                                        </div>

                                    <!--- Button to save changes --->
                                    <div class="d-flex justify-content-end mt-3">
                                    <input type="submit" class="btn btn-primary me-2" name="exitSave" value="Save">
                                    <input type="submit" class="btn btn-outline-primary me-2" name="save" value="Save but not exit">
                                    <input type="submit" class="btn btn-outline-danger me-3" name="discard" value="Discard">
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
    <script>
        function uploadItem(event) {
            event.preventDefault(); // Prevent the default form submission

            // Disable the submit button to prevent multiple submissions
            $('#submitButton').prop('disabled', true);

            // Get the form data
            var formData = new FormData(document.getElementById('editItemForm'));

            if (document.getElementById('itemPicture').files.length > 0) {
                // Append the file to the formData
                formData.append('itemPicture', document.getElementById('itemPicture').files[0]);
            }

            // Send the form data to the server using AJAX
            $.ajax({
                type: 'POST',
                url: 'editfunction.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Check if the response contains 'success'
                    if (response.indexOf('success') !== -1) {
                        alert('Successfully edited an item');
                        // Redirect to the additem.php page
                        window.location.href = 'additem.php';
                    } else {
                        // Display the error message
                        alert('Error editing item: ' + response);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle the edit error
                    alert('Error editing item: ' + error);
                },
                complete: function() {
                    // Re-enable the submit button after form submission is complete
                    $('#submitButton').prop('disabled', false);
                }
            });
        }
    </script>


    <script>
        document.getElementById('itemPicture').addEventListener('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        });

        $(document).ready(function() {
            // Function to handle category selection
            function handleCategorySelection() {
                var selectedCategory = $('#category').val();
                console.log('Selected category:', selectedCategory);

                // Show/hide the specify category input field
                if (selectedCategory === 'Others') {
                    $('#specifyCategoryInput').show();
                } else {
                    $('#specifyCategoryInput').hide();
                    $('#otherCategory').val('');
                }
            }

            // Attach the event listener to the category select
            $('#category').on('change', handleCategorySelection);

            // Call the function initially to set the initial state
            handleCategorySelection();
        });
    </script>

    <script>
        // Add event listeners to the request type checkboxes
        document.querySelectorAll('[name="requestType[]"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                toggleFields();
            });
        });

        function toggleFields() {
            var buyPriceField = document.getElementById('buyPriceField');
            var borrowPriceField = document.getElementById('borrowPriceField');
            var borrowDurationField = document.getElementById('borrowDurationField');

            var buyCheckbox = document.getElementById('requestTypeBuy');
            var borrowCheckbox = document.getElementById('requestTypeBorrow');

            if (buyCheckbox.checked) {
                buyPriceField.style.display = 'block';
            } else {
                buyPriceField.style.display = 'none';
            }

            if (borrowCheckbox.checked) {
                borrowPriceField.style.display = 'block';
                borrowDurationField.style.display = 'block';
            } else {
                borrowPriceField.style.display = 'none';
                borrowDurationField.style.display = 'none';
            }
        }

        // Call the toggleFields function to initialize the field visibility
        toggleFields();
    </script>
    <br>
    <br>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>