<?php
include "nav.php";

// Check if itemID is provided in the query parameter
if (isset($_GET['itemID'])) {
    // Sanitize the input
    $itemID = $_GET['itemID'];

    // Retrieve item details from the database using the provided itemID
    $sql = "SELECT * FROM item WHERE itemID = '$itemID'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Output the retrieved item details
        $item = mysqli_fetch_assoc($result);
    } else {
        // Handle error if itemID is not found
        echo 'Item not found';
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle error if itemID is not provided
    echo 'Item ID is required';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item: <?php echo $item['itemName']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-TWPVX5vtT7KlsmtQms7N4/PrKMB8E81EOQ/sGHWszNLxEJU+6+C1kG9a6aZGpmO7OvNi4s2msMHW+vqyVZLqpw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php
        include "edit.css";
        ?>
    </style>

</head>

<body>
    <div class="container my-5">
        <div class="page-content" id="content">
            <div class="row-12">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Edit Item</div>
                        <div class="card-body item-detail">
                            <form id="editItemForm" onsubmit="return uploadItem(event);">
                                <input type="hidden" name="itemID" value="<?php echo $itemID; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="item-image" onclick="document.getElementById('itemPicture').click();">
                                            <img id="previewImage" src="pictures/<?php echo $item['itemImage_path']; ?>" class="img-fluid" alt="<?php echo $item['itemName']; ?>">
                                        </div>
                                        <div class="mb-3 mt-2">
                                            <div class="mb-2">
                                                <label for="itemPicture"><b>Upload Item Picture</b> <span class="text-danger">*</span></label>
                                            </div><input type="file" class="form-control" id="itemPicture" name="itemPicture">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <!--- Item Name --->
                                        <div class="mb-3">
                                            <label for="itemName" class="form-label"><i class="bi bi-card-heading"></i> <b>Item Name</b> <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="itemName" name="itemName" value="<?php echo $item['itemName']; ?>">
                                            <div class="invalid-feedback">⚠️ Please enter an item name.</div>
                                        </div>

                                        <!--- Item Description --->
                                        <div class="mb-3">
                                            <label for="itemDescription" class="form-label"><i class="bi bi-card-text"></i> <b>Item Description</b></label>
                                            <textarea class="form-control" id="itemDescription" name="itemDescription"><?php echo $item['ItemDescription']; ?></textarea>
                                        </div>

                                        <!--- Item Category --->
                                        <label for="category" class="form-label"><i class="bi bi-tags"></i> <b>Category</b> <span class="text-danger">*</span></label>

                                        <!--- Item Category Select --->
                                        <select class="form-select <?php echo isset($errors['category']) ? 'is-invalid' : ''; ?>" id="category" name="category" required>
                                            <option value="" selected disabled>Select item category</option>
                                            <option value="Toys" <?php if ($item['category'] == 'Toys') echo 'selected'; ?>>Toys</option>
                                            <option value="Cloths" <?php if ($item['category'] == 'Cloths') echo 'selected'; ?>>Cloths</option>
                                            <option value="Kitchen Utensils" <?php if ($item['category'] == 'Kitchen Utensils') echo 'selected'; ?>>Kitchen Utensils</option>
                                            <option value="Tools" <?php if ($item['category'] == 'Tools') echo 'selected'; ?>>Tools</option>
                                            <option value="Sports Items" <?php if ($item['category'] == 'Sports Items') echo 'selected'; ?>>Sports Items</option>
                                            <option value="School Supply" <?php if ($item['category'] == 'School Supply') echo 'selected'; ?>>School Supply</option>
                                            <option value="Others" <?php if ($item['category'] == 'Others' || !in_array($item['category'], ['Toys', 'Cloths', 'Kitchen Utensils', 'Tools', 'Sports Items', 'School Supply'])) echo 'selected'; ?>>Others</option>
                                        </select>
                                        <br>
                                        <div id="specifyCategoryInput" <?php if ($item['category'] !== 'Others' && in_array($item['category'], ['Toys', 'Cloths', 'Kitchen Utensils', 'Tools', 'Sports Items', 'School Supply'])) echo 'style="display: none;"'; ?>>
                                            <label for="otherCategory" class="form-label"><i class="bi bi-tags"></i> <b>Specify Category</b> <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="otherCategory" name="otherCategory" value="<?php echo $item['category']; ?>" placeholder="Enter other category">
                                        </div>
                                        <div class="invalid-feedback">⚠️ Please select a category.</div>

                                        <!--- Item Availability --->
                                        <div class="mb-3 mt-3">
                                            <label for="itemAvailability" class="form-label"><i class="bi bi-check2-circle"></i> <b>Availability </b> <span class="text-danger">*</span></label>
                                            <select class="form-select" id="itemAvailability" name="itemAvailability">
                                                <option value="Available" <?php if ($item['itemAvailability'] == 'Available') echo 'selected'; ?>>Available</option>
                                                <option value="Unavailable" <?php if ($item['itemAvailability'] == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                                            </select>
                                        </div>
                                        <div class="invalid-feedback">⚠️ Please select an availability option.</div>

                                        <!--- Item Quantity --->
                                        <div class="mb-3">
                                            <label for="itemQuantity" class="form-label"><i class="bi bi-box"></i> <b>Item Quantity</b> <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="itemQuantity" name="itemQuantity" value="<?php echo $item['itemQuantity']; ?>">
                                            <div class="invalid-feedback">⚠️ Please enter the item quantity.</div>
                                        </div>

                                        <!--- Item Open for --->
                                        <div class="mb-3">
                                            <label class="form-label"><i class="bi bi-arrow-repeat"></i> <b>Request Type</b> <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Barter" name="requestType[]" id="requestTypeBarter" <?php if (strpos($item['requestType'], 'Barter') !== false) echo 'checked'; ?>>
                                                <label class="form-check-label" for="requestTypeBarter">
                                                    Barter
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Borrow" name="requestType[]" id="requestTypeBorrow" <?php if (strpos($item['requestType'], 'Borrow') !== false) echo 'checked'; ?>>
                                                <label class="form-check-label" for="requestTypeBorrow">
                                                    Borrow
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Buy" name="requestType[]" id="requestTypeBuy" <?php if (strpos($item['requestType'], 'Buy') !== false) echo 'checked'; ?>>
                                                <label class="form-check-label" for="requestTypeBuy">
                                                    Buy
                                                </label>
                                            </div>
                                            <div class="invalid-feedback">⚠️ Please select at least one request type.</div>
                                        </div>

                                        <!--- If buy, input selling price --->
                                        <div class="mb-3" id="buyPriceField" <?php if (strpos($item['requestType'], 'Buy') === false) echo 'style="display: none;"'; ?>>
                                            <label for="buyPrice" class="form-label"><i class="bi bi-cash"></i> <b>Selling Price (₱)</b> <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="buyPrice" name="buyPrice" value="<?php echo $item['buyPrice']; ?>">
                                        </div>

                                        <!--- If borrow, input borrowing price --->
                                        <div class="mb-3" id="borrowPriceField" <?php if (strpos($item['requestType'], 'Borrow') === false) echo 'style="display: none;"'; ?>>
                                            <label for="borrowPrice" class="form-label"><i class="bi bi-cash"></i> <b>Maintenance Fee (₱)</b> <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="borrowPrice" name="borrowPrice" value="<?php echo $item['borrowPrice']; ?>">
                                        </div>
                                        <div class="mb-3" id="borrowDurationField" <?php if (strpos($item['requestType'], 'Borrow') === false) echo 'style="display: none;"'; ?>>

                                            <!--- If borrow, input borrowing duration --->
                                            <label for="borrowDuration" class="form-label"><i class="bi bi-clock"></i> <b>Borrow Duration (Days)</b> <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="borrowDuration" name="borrowDuration" value="<?php echo $item['borrowDuration']; ?>">
                                        </div>

                                        <!--- Button to save changes --->
                                        <button type="submit" id="submitButton" value="Submit" class="btn btn-primary">Save Changes</button>
                            </form>
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
                        alert('You have successfully edited an item');
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

            var category = document.getElementById('category').value;

            if (buyCheckbox.checked) {
                buyPriceField.style.display = 'block';
            } else {
                buyPriceField.style.display = 'none';
            }

            if (borrowCheckbox.checked && (category === 'Tools' || category === 'Machinery')) {
                borrowPriceField.style.display = 'block';
                borrowDurationField.style.display = 'block';
            } else {
                borrowPriceField.style.display = 'none';
                borrowDurationField.style.display = 'none';
            }

            // If "Borrow" checkbox is checked, ensure borrow duration field is visible
            if (borrowCheckbox.checked) {
                borrowDurationField.style.display = 'block';
            } else {
                borrowDurationField.style.display = 'none';
            }
        }

        // Call the toggleFields function to initialize the field visibility
        toggleFields();
    </script>
    <br>
    <br>
</body>

</html>