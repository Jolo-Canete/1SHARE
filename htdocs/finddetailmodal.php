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
             <p><i class="bi bi-check-circle-fill"></i> Availability: <span id="modalItemAvailability"></span></p>
             <p style="display: none;"><i class="bi bi-check-circle-fill"></i> Item ID: <span id="modalItemID"></span></p>

             <p><i class="bi bi-arrow-repeat"></i> Open For: <span id="modalItemRequestType"></span></p>

             <!-- Display Buy Price field if request type is Buy -->
             <div id="buyField" style="display: none;">
               <p><i class="bi bi-cash-coin"></i> Sell Price: ₱<span id="modalBuyPrice"></span></p>
             </div>

             <!-- Display Borrow Price and Borrowed Duration fields if request type is Borrow -->
             <div id="borrowFields" style="display: none;">
               <p><i class="bi bi-cash"></i> Borrow Price: ₱<span id="modalBorrowPrice"></span></p>
               <p><i class="bi bi-clock"></i> Borrowed Duration: <span id="modalBorrowDuration"></span> Day/s</p>
             </div>


             <!-- Display Date Time Posted -->
             <p><i class="bi bi-calendar"></i> Date Time Posted: <span id="modalDateTimePosted"></span></p>
           </div>
         </div>
       </div>
       <div class="modal-footer">
         <div class="d-flex justify-content-start align-items-center flex-grow-1">
           <p class="mb-0"><i class="bi bi-box"></i> Quantity: <span id="modalItemQuantity"></span> Item/s Left!</p>
         </div>
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
           <i class="bi bi-x"></i> Close
         </button>
         <button type="button" class="btn btn-primary " onclick="openCart()">
           <i class="bi bi-cart-plus"></i> Add To Cart
         </button>
         <button type="button" class="btn btn-primary" onclick="openItem()">
           <i class="bi bi-pencil-fill"></i> Open
         </button>
         <div id="cart-popup" class="cart-popup hidden">
           Added to Cart <i class="fa fa-shopping-cart"></i>
         </div>
       </div>
     </div>
   </div>
 </div>
 <script>
   function openItem() {
     // Get the item ID from the modal
     var itemID = document.getElementById('modalItemID').textContent;

     // Redirect to edit.php with the item ID as query parameter
     window.location.href = 'itemdetail.php?itemID=' + encodeURIComponent(itemID);
   }

   function showCartPopup() {
     var popup = document.getElementById('cart-popup');
     popup.classList.remove('hidden');
     setTimeout(function() {
       popup.classList.add('hidden');
     }, 2000); // Show for 2 seconds
   }

   function openCart() {
     var itemID = document.getElementById('modalItemID').textContent;

     // AJAX request to add item to the cart
     $.ajax({
       type: 'POST',
       url: 'cartfunc.php',
       data: {
         itemID: itemID
       },
       success: function(response) {
         // Handle success if needed
         console.log(response);
         showCartPopup();

       },
       error: function(xhr, status, error) {
         // Handle error
         console.error(xhr.responseText);
       }
     });
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