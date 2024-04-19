<!-- Item Detail Modal -->
<div class="modal fade item-detail" id="itemDetailModal" tabindex="-1" aria-labelledby="itemDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title fs-6" id="itemDetailModalLabel">
          <i class="bi bi-info-circle-fill"></i> Item Details
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-3">
        <div id="loadingIndicator" style="display: none; text-align: center;">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
        <div id="modalContent" style="display: none;">
          <div class="row">
            <div class="col-12" style="max-height: 200px; overflow: hidden;">
              <img id="modalItemImage" src="your_image_url.jpg" alt="" class="img-fluid" style="object-fit: cover; width: 100%; border-radius: 0px;">
            </div>
            <div class="col-12 mt-3">
              <!-- Item Name -->
              <h5 class="h6" id="modalItemName"></h5>
              <p><span class="text-dark fs-7" id="modalItemDescription"></span></p>
              <!-- Other Item Details -->
              <table class="table table-borderless fs-7">
                <tr>
                  <td><i class="bi bi-tags text-dark"></i> <b>Category</b> </td>
                  <td><span class="text-dark" id="modalItemCategory"></span></td>
                </tr>
                <tr>
                  <td><i class="bi bi-hammer text-dark"></i> <b>Condition</b></td>
                  <td><span class="text-dark" id="modalItemCondition"></span></td>
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
                  <td><i class="bi bi-arrow-repeat text-dark"></i> <b>Open For</b></td>
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
                  <td><span class="text-dark" id="modalItemQuantity"></span> Item/s Left</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer mt-2">
          <button type="button" class="btn btn-secondary fs-7" data-bs-dismiss="modal">
            <i class="bi bi-x"></i> Close
          </button>
          <button id="cartButton" type="button" class="btn btn-primary btn-sm fs-7" onclick="openCart()">
            <i class="bi bi-cart-plus"></i> Add To Cart
          </button>
          <button id="editButton" type="button" class="btn btn-primary btn-sm fs-7" onclick="openItem()">
            <i class="bi bi-pencil-fill"></i> Open
          </button>
          <div id="cart-popup" class="cart-popup hidden fs-7">
            Added to Cart <i class="fa fa-shopping-cart"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function openItem() {
    var itemID = document.getElementById('modalItemID').textContent;
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
    $.ajax({
      type: 'POST',
      url: 'cartfunc.php',
      data: {
        itemID: itemID
      },
      success: function(response) {
        console.log(response);
        showCartPopup();
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  }
</script>

<script>
  function populateModal(itemName, itemImagePath, itemAvailability, requestType) {
    const modalContentEl = document.getElementById('modalContent');
    const loadingIndicatorEl = document.getElementById('loadingIndicator');
    const cartButtonEl = document.getElementById('cartButton');
    const editButtonEl = document.getElementById('editButton');

    modalContentEl.style.display = 'none';
    loadingIndicatorEl.style.display = 'block';
    cartButtonEl.style.display = 'none';
    editButtonEl.style.display = 'none';

    const modalItemImageEl = document.getElementById('modalItemImage');
    modalItemImageEl.src = `pictures/${itemImagePath}`;

    $.ajax({
      type: 'POST',
      url: 'get_item_details.php',
      data: {
        itemImagePath
      },
      dataType: 'json',
      success: (response) => {
        loadingIndicatorEl.style.display = 'none';
        modalContentEl.style.display = 'block';

        document.getElementById('modalItemID').textContent = response.itemID;
        document.getElementById('modalItemQuantity').textContent = response.itemQuantity;
        document.getElementById('modalItemName').textContent = response.itemName;
        document.getElementById('modalItemCategory').textContent = response.category;
        document.getElementById('modalItemDescription').textContent = response.ItemDescription;
        document.getElementById('modalItemCondition').textContent = response.itemCondition;
        document.getElementById('modalItemAvailability').textContent = itemAvailability;
        document.getElementById('modalItemRequestType').textContent = requestType;

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

        const datePosted = new Date(response.DateTimePosted);
        document.getElementById('modalDateTimePosted').textContent = formatDateTime(datePosted);

        cartButtonEl.style.display = 'block';
        editButtonEl.style.display = 'block';
      },
      error: (xhr, status, error) => {
        console.error(xhr.responseText);
        showErrorMessage('An error occurred while fetching item details. Please try again later.');
      }
    });
  }

  function formatPrice(price) {
    return `₱ ${price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',')}`;
  }

  function formatDateTime(date) {
    return date.toLocaleString('en-US', {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric',
      hour: '2-digit',
      minute: '2-digit',
      second: '2-digit'
    });
  }

  function showErrorMessage(message) {
    alert(message);
  }
</script>
