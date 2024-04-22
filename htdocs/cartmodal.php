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
                         <p><i class="bi bi-tags-fill"></i> <b>Category:</b> <span id="modalItemCategory"></span></p>
                         <p><i class="bi bi-card-text"></i> <b>Description:</b> <span id="modalItemDescription"></span></p>
                         <p><i class="bi bi-hammer"></i> <b>Condition:</b> <span id="modalItemCondition"></span></p>
                         <p><i class="bi bi-check-circle-fill"></i> <b>Availability:</b> <span id="modalItemAvailability"></span></p>
                         <p style="display: none;"><i class="bi bi-check-circle-fill"></i> Item ID: <span id="modalItemID"></span></p>

                         <p><i class="bi bi-arrow-repeat"></i> <b>Request Type:</b> <span id="modalItemRequestType"></span></p>

                         <!-- Display Buy Price field if request type is Buy -->
                         <div id="buyField" style="display: none;">
                             <p><i class="bi bi-cash-coin"></i> <b>Sell Price:</b> ₱<span id="modalBuyPrice"></span></p>
                         </div>

                         <!-- Display Borrow Price and Borrowed Duration fields if request type is Borrow -->
                         <div id="borrowFields" style="display: none;">
                             <p><i class="bi bi-cash"></i> <b>Borrow Price:</b> </b>₱<span id="modalBorrowPrice"></span></p>
                             <p><i class="bi bi-clock"></i> <b>Borrowed Duration:</b> <span id="modalBorrowDuration"></span> Day/s</p>
                         </div>


                         <!-- Display Date Time Posted -->
                         <p><i class="bi bi-calendar"></i> <b>Date Time Posted:</b> <span id="modalDateTimePosted"></span></p>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <div class="d-flex justify-content-start align-items-center flex-grow-1">
                     <p class="mb-0"><b><i class="bi bi-box"></i> <b>Quantity:</b> </b><span id="modalItemQuantity"></span> Item/s Left!</p>
                 </div>
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                     <i class="bi bi-x"></i> Close
                 </button>
                 <button style="display: none;" type="button" class="btn btn-primary" onclick="removeCart()">
                     <i class="bi bi-cart-plus"></i> Redirect
                 </button>
                 <button type="button" class="btn btn-primary" onclick="redirectCart()">
                     <i class="bi bi-cart-plus"></i> Remove
                 </button>
                 <!-- Edit button -->
                 <button type="button" class="btn btn-primary" onclick="openItem()">
                     <i class="bi bi-pencil-fill"></i> Open
                 </button>

             </div>
         </div>
     </div>
 </div>
 <script>
     function redirectCart() {
         removeCart();
         window.location.href = 'cart.php';
     }

     function removeCart() {
         var itemID = document.getElementById('modalItemID').textContent.trim();
         $.ajax({
             type: 'POST',
             url: 'removecart.php',
             data: {
                 itemID: itemID
             },
             dataType: 'json',
             success: function(response) {
                 console.log('Success callback function triggered');
                 console.log(response); // Log the response object

                 // Check if removal was successful
                 if (response.status === 'success') {
                     // Redirect the user to the cart.php page
                     window.location.href = 'cart.php';
                 } else {
                     // Handle removal error
                     console.error(response.message);
                     alert('Error: ' + response.message);
                 }
             },
             error: function(xhr, status, error) {
                 // Handle AJAX error
                 console.error(xhr.responseText);
             }
         });
     }
 </script>
 <script>
     function openItem() {
    // Get the item ID and availability from the modal
    var itemID = document.getElementById('modalItemID').textContent;
    var itemAvailability = document.getElementById('modalItemAvailability').textContent.trim();

    // Check if the item availability is "Available"
    if (itemAvailability === 'Available') {
        // Redirect to itemdetail.php with the item ID as query parameter
        window.location.href = 'itemdetail.php?itemID=' + encodeURIComponent(itemID);
    } else {
        // Optionally display a message or take alternative action
        alert('This item is not Available .');
    }
}

 </script>

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
                 document.getElementById('modalItemID').textContent = response.itemID;
                 document.getElementById('modalItemQuantity').textContent = response.itemQuantity;
                 document.getElementById('modalItemName').textContent = response.itemName;
                 document.getElementById('modalItemCategory').textContent = response.category;
                 document.getElementById('modalItemDescription').textContent = response.ItemDescription;
                 document.getElementById('modalItemCondition').textContent = response.itemCondition;
                 document.getElementById('modalItemAvailability').textContent = itemAvailability;
                 document.getElementById('modalItemRequestType').textContent = requestType;

                 // Show/hide appropriate price fields based on the request type
                 if (requestType.includes('Buy')) {
                     document.getElementById('buyField').style.display = 'block';
                     document.getElementById('modalBuyPrice').textContent = parseFloat(response.buyPrice).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");; // Format to 2 decimal places
                 } else {
                     document.getElementById('buyField').style.display = 'none';
                 }

                 if (requestType.includes('Borrow')) {
                     document.getElementById('borrowFields').style.display = 'block';
                     document.getElementById('modalBorrowPrice').textContent = parseFloat(response.borrowPrice).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");; // Format to 2 decimal places
                     document.getElementById('modalBorrowDuration').textContent = parseFloat(response.borrowDuration); // Format to 2 decimal places
                 } else {
                     document.getElementById('borrowFields').style.display = 'none';
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
             },

             error: function(xhr, status, error) {
                 // Handle error
                 console.error(xhr.responseText);
             }
         });
     }
 </script>