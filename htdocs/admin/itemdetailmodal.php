

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
                <div id="loadingIndicator" style="display: none; text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div id="modalContent" style="display: none;">
                    <div class="row">
                        <div class="col-md-6" style="width: 339px; height: 339px; overflow: hidden;">
                            <img id="modalItemImage" src="your_image_url.jpg" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%; border-radius: 0px;">
                        </div>
                        <div class="col-md-6">
                            <!-- Item Name -->
                            <h5 class="h5" id="modalItemName"></h5>
                            <p><span class="text-dark" id="modalItemDescription"></span></p>
                            <!-- Other Item Details -->
                            <table class="table table-borderless ">
                                <tr>
                                    <td><i class="bi bi-tags text-dark"></i> <b>Category</b> </td>
                                    <td><span class="text-dark" id="modalItemCategory"></span></td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-check-circle-fill text-dark"></i> <b>Availability</b></td>
                                    <td><span class="text-dark" id="modalItemAvailability"></span></td>
                                </tr>
                                <tr style="display: none;">
                                    <td><i class="bi bi-check-circle-fill text-dark"></i> <b>Item ID</b></td>
                                    <td><span class="text-dark" id="modalItemID"></span></td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-arrow-repeat text-dark"></i> <b>Request Type</b></td>
                                    <td><span class="text-dark" id="modalItemRequestType"></span></td>
                                </tr>

                                <tbody id="buyField">
                                    <tr>
                                        <td><i class="bi bi-cash-coin text-dark"></i> <b>Sell Price</b></td>
                                        <td>₱<span class="text-dark" id="modalBuyPrice"></span></td>
                                    </tr>
                                </tbody>

                                <tbody id="borrowFields">
                                    <tr>
                                        <td><i class="bi bi-cash text-dark"></i> <b>Borrow Price</b></td>
                                        <td>₱<span class="text-dark" id="modalBorrowPrice"></span></td>
                                    </tr>
                                    <tr>
                                        <td><i class="bi bi-clock text-dark"></i> <b>Borrowed Duration</b></td>
                                        <td><span class="text-dark" id="modalBorrowDuration"></span> Day/s</td>
                                    </tr>
                                </tbody>

                           
                                <tr>
                                    <td><i class="bi bi-calendar text-dark"></i> <b>Date Time Posted</b></td>
                                    <td><span class="text-dark" id="modalDateTimePosted"></span></td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-box"></i> <b>Quantity</b></td>
                                    <td><span class="text-dark" id="modalItemQuantity">Item/s Left</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer fixed">
                <div class="d-flex justify-content-center mt-4">

                    <button id="editButton" type="button" class="btn btn-primary" onclick="editItem()" style="display: none;">
                        <i class="bi bi-pencil-fill"></i> Edit
                    </button>
                    &nbsp;

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i> Close
                    </button>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editItem() {
            // Get the item ID from the modal
            var itemID = document.getElementById('modalItemID').textContent;

            // Redirect to edit.php with the item ID as query parameter
            window.location.href = 'edit.php?itemID=' + encodeURIComponent(itemID);
        }
    </script>

    <script>
        function populateModal(itemName, itemImagePath, itemAvailability, requestType) {
            document.getElementById('modalContent').style.display = 'none';
            document.getElementById('loadingIndicator').style.display = 'block';
            document.getElementById('editButton').style.display = 'none';


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
                    document.getElementById('loadingIndicator').style.display = 'none';

                    document.getElementById('modalItemID').textContent = response.itemID;
                    document.getElementById('modalItemQuantity').textContent = response.itemQuantity;
                    document.getElementById('modalItemName').textContent = response.itemName;
                    document.getElementById('modalItemCategory').textContent = response.category;
                    document.getElementById('modalItemDescription').textContent = response.ItemDescription;
                    document.getElementById('modalItemAvailability').textContent = itemAvailability;
                    document.getElementById('modalItemRequestType').textContent = requestType;

                    // Show/hide appropriate price fields based on the request type
                    if (requestType.includes('Buy')) {
                        $("#buyField").show();
                        $("#modalBuyPrice").text(parseFloat(response.buyPrice).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    } else {
                        $("#buyField").hide();
                    }

                    
                    if (requestType.includes('Borrow')) {
                        $("#borrowFields").show();
                        $("#modalBorrowPrice").text(parseFloat(response.borrowPrice).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        $("#modalBorrowDuration").text(parseFloat(response.borrowDuration));
                    } else {
                        $("#borrowFields").hide();
                    }

                    var datePosted = new Date(response.DateTimePosted);
                    var formattedDate = datePosted.toLocaleString('en-US', {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    });


                    document.getElementById('modalDateTimePosted').textContent = formattedDate;
                    // Show modal content
                    document.getElementById('modalContent').style.display = 'block';

                    // Show edit button
                    document.getElementById('editButton').style.display = 'block';
                },

                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        }
    </script>