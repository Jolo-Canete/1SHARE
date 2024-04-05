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
                        <p><i class="bi bi-arrow-repeat"></i> Open For: <span id="modalItemRequestType"></span></p>

                        <div class="mb-3" id="requestTypeField" style="display: none;">
    <label class="form-label"><i class="bi bi-arrow-repeat"></i> Open For:</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" value="Barter" name="requestType" id="requestTypeBarter">
        <label class="form-check-label" for="requestTypeBarter">
            Barter
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" value="Borrow" name="requestType" id="requestTypeBorrow">
        <label class="form-check-label" for="requestTypeBorrow">
            Borrow
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" value="Buy" name="requestType" id="requestTypeBuy">
        <label class="form-check-label" for="requestTypeBuy">
            Buy
        </label>
    </div>
</div>

<div id="buyPriceField" style="display: none;">
    <label for="buyPrice" class="form-label"><i class="bi bi-cash"></i> Selling Price:</label>
    <input type="number" class="form-control" id="buyPrice" placeholder="Enter selling price">
</div>
<div id="borrowPriceField" style="display: none;">
    <label for="borrowPrice" class="form-label"><i class="bi bi-cash"></i> Borrow Price:</label>
    <input type="number" class="form-control" id="borrowPrice" placeholder="Enter borrow price">
</div>
<div id="borrowDurationField" style="display: none;">
    <label for="borrowDuration" class="form-label"><i class="bi bi-clock"></i> Borrow Duration:</label>
    <input type="number" class="form-control" id="borrowDuration" placeholder="Enter borrow duration (in days)">
</div>



                        <!-- Display Date Time Posted -->
                       
                    </div>
                   <div> 
                    <p><i class="bi bi-calendar"></i> Date Time Posted: <span id="modalDateTimePosted"></span></p>  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x"></i> Close
                </button>
                <!-- Edit button -->
                <button type="button" class="btn btn-primary" onclick="editItem()">
                    <i class="bi bi-pencil-fill"></i> Edit
                </button>
            </div>
        </div>
    </div>
</div>
  <script>
  function editItem() {
        // Enable editing for all fields
        document.getElementById('modalItemName').contentEditable = true;
        document.getElementById('modalItemCategory').innerHTML = '<input type="text" id="modalItemCategoryInput" value="' + document.getElementById('modalItemCategory').textContent + '">';
        document.getElementById('modalItemDescription').innerHTML = '<input type="text" id="modalItemDescriptionInput" value="' + document.getElementById('modalItemDescription').textContent + '">';
        document.getElementById('modalItemCondition').innerHTML = '<input type="text" id="modalItemConditionInput" value="' + document.getElementById('modalItemCondition').textContent + '">';

        // Availability dropdown options
        var availability = document.getElementById('modalItemAvailability').textContent;
        var availabilitySelect = '<select class="form-select" id="modalItemAvailabilityInput">';
        availabilitySelect += '<option value="Available"' + (availability === 'Available' ? ' selected' : '') + '>Available</option>';
        availabilitySelect += '<option value="Unavailable"' + (availability === 'Unavailable' ? ' selected' : '') + '>Unavailable</option>';
        availabilitySelect += '</select>';
        document.getElementById('modalItemAvailability').innerHTML = availabilitySelect;

        // Show/hide buy and borrow fields based on request type
        var requestType = document.getElementById('modalItemRequestType').textContent;
        if (requestType.includes('Barter')) {
            document.getElementById('requestTypeBarter').checked = true;
        } else if (requestType.includes('Borrow')) {
            document.getElementById('requestTypeBorrow').checked = true;
            document.getElementById('borrowPriceField').style.display = 'block';
            document.getElementById('borrowDurationField').style.display = 'block';
        } else if (requestType.includes('Buy')) {
            document.getElementById('requestTypeBuy').checked = true;
            document.getElementById('buyPriceField').style.display = 'block';
        }
        
        // Display the request type radio buttons
        document.getElementById('requestTypeField').style.display = 'block';

        // Disable the contentEditable attribute for non-editable fields
        document.getElementById('modalDateTimePosted').contentEditable = false;
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
                  document.getElementById('modalItemName').textContent = response.itemName;
                  document.getElementById('modalItemCategory').textContent = response.category;
                  document.getElementById('modalItemDescription').textContent = response.ItemDescription;
                  document.getElementById('modalItemCondition').textContent = response.itemCondition;
                  document.getElementById('modalItemAvailability').textContent = itemAvailability;
                  document.getElementById('modalItemRequestType').textContent = requestType;

                  // Show/hide appropriate price fields based on the request type
                  if (requestType.includes('Buy')) {
                      document.getElementById('buyField').style.display = 'block';
                      document.getElementById('modalBuyPrice').textContent = response.buyPrice;
                  } else {
                      document.getElementById('buyField').style.display = 'none';
                  }

                  if (requestType.includes('Borrow')) {
                      document.getElementById('borrowFields').style.display = 'block';
                      document.getElementById('modalBorrowPrice').textContent = response.borrowPrice;
                      document.getElementById('modalBorrowDuration').textContent = response.borrowDuration;
                  } else {
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