<style>
  .modal-footer {
    position: sticky;
    bottom: 0;
    background-color: #fff;
  }

  .modal-header {
    position: sticky;
    top: 0;
    z-index: 1000;
    background-color: #fff;
  }

  .owned-by-table {
    width: 100%;
  }

  .owned-by-badge {
    display: inline-block;
  }

  .scrollable-textarea {
    width: 350px;
    height: 100px;
    overflow: auto;
    border: 0px;
    background-color: #f8f9fa;
    padding: 10px 12px;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
</style>

<!-- Item Detail Modal -->
<div class="modal fade item-detail" id="itemDetailModal" tabindex="-1" aria-labelledby="itemDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!--- Modal Header --->
      <div class="modal-header bg-dark text-white" style="border-radius: 0;">
        <h5 class="modal-title fs-5" id="itemDetailModalLabel">
          <i class="bi bi-info-circle-fill"></i> Item Details
        </h5>

        <!--- Report Item Button --->
        <button id="report" type="button" class="btn btn-link text-danger" data-bs-toggle="modal" data-bs-target="#reportItemModal">
          <i class="bi bi-flag-fill fs-5"></i>
        </button>

        <!--- Close Button --->
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!--- End of Modal Header --->

      <!--- Modal Body --->
      <div class="modal-body p-4">
        <div id="loadingIndicator" style="display: none; text-align: center; position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);">
          <div class="spinner-border text-primary mb-5 mt-5" role="status">
            <span class="visually-hidden ">Loading...</span>
          </div>
        </div>
        <div id="modalContent" style="display: none;">
          <div class="row">
            <div class="d-none d-md-block image-container mb-3" style="width: 339px; height: 339px;">
              <img id="modalItemImage" src="your_image_url.jpg" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%; border-radius: 0px;">
            </div>

            <div id="mobile" class="d-md-none image-container mb-3" style="max-width: 100%; width: 339px; height: 100%; overflow: hidden;">
              <img id="modalItemImages" src="your_image_url.jpg" alt="" class="img-fluid" style="width: 100%; height: 100%; border-radius: 0px;">
            </div>


            <div class="col-md-6 ">
              <div class="price-banner  mb-3" id="borrowFields">
                <div class="banner-content">
                  <div class="price-border">

                    <span class="price-label">Maintenance Fee(Borrow)</span>
                  </div>
                  <div class="price-value" style="font-size: smaller;">
                    ₱<span id="modalBorrowPrice"></span>
                    (<span id="modalBorrowDuration"></span> Day/s)
                  </div>

                </div>
              </div>
              <div class="price-banner  mb-3" id="buyField">
                <div class="banner-content">
                  <div class="price-border">
                    <span class="price-label" style="color: #ff0000;">Sell Price</span>
                  </div>
                  <div class="price-value">
                    ₱<span id="modalBuyPrice"></span>
                  </div>
                </div>
              </div>

              <!-- Item Name -->
              <h6 class="display-6 fw-bold" id="modalItemName"></h6>
              <textarea class="scrollable-textarea" id="modalItemDescription" readonly></textarea>

              <!-- Other Item Details -->
              <div class="owned-by-container">
                <table class="owned-by-table">
                  <tr>
                    <td>
                      <a href="#" id="modalOwnerLink" class="owned-by-link" target="_blank">
                        <img id="modalUserImages" src="" alt="Owner's Profile Image" class="img-fluid" style="width: 32px; height: 32px; right: 0;">
                      </a>
                    </td>
                    <td>
                      <div class="owned-by-info">
                        <span class="owned-by-badge" id="modalOwnerName"></span>
                      </div>
                    </td>
                    <td class="text-end">
                      <a href="#" id="modalOwnerLinks" class="link-offset-2 link-underline link-underline-opacity-0">View Profile</a>
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            <!--- Product Specifications --->
            <table class="table table-borderless table-bg:transparent">
              <tr>
                <th class="specs-header" id="specs-header"><b>PRODUCT SPECIFICATIONS</b> <i class="bi bi-chevron-down" id="specifications-icon"></i></th>
              </tr>
              <table class="table table-borderless table-bg:transparent">
                <tbody id="specifications-table">
                  <tr>
                    <td><i class="bi bi-tags text-dark"></i> <b>Category</b></td>
                    <td><span class="text-dark" id="modalItemCategory"></span></td>
                  </tr>
                  <tr style="display: none;">
                    <td><i class="bi bi-check-circle-fill text-dark"></i> <b>Item ID</b></td>
                    <td><span class="text-dark" id="modalItemID"></span></td>
                  </tr>
                  <tr>
                    <td><i class="bi bi-arrow-repeat text-dark"></i> <b>Request Type</b></td>
                    <td><span class="text-dark" id="modalItemRequestType"></span></td>
                  </tr>
                  <tr>
                    <td><i class="bi bi-calendar text-dark"></i> <b>Date Time Posted</b></td>
                    <td><span class="text-dark" id="modalDateTimePosted"></span></td>
                  </tr>
                  <tr>
                    <td><i class="bi bi-box"></i> <b>Quantity</b></td>
                    <td><span class="text-dark" id="modalItemQuantity"></span> Item/s Left</td>
                  </tr>
                  <tr>
                    <td><i class="bi bi-telephone"></i> <b>Contact Number:</b></td>
                    <td><span class="text-dark" id="modalContactNumber"></span></td>
                  </tr>
                  <tr style="display: none;">
                    <td><i class="bi bi-telephone"></i> <b>Contact Number:</b></td>
                    <td><span class="text-dark" id="modalUserID"></span></td>
                  </tr>
                  <tr>
                    <td><i class="bi bi-pin-map"></i> <b>Pick up Location:</b></td>
                    <td><span class="text-dark">Barangay Hall/Gym</span></td>
                  </tr>

                </tbody>
              </table>
              <script>
                $(document).ready(function() {
                  $('#specifications-icon').click(function() {
                    $('#specifications-table').toggle();
                    $(this).toggleClass('bi-chevron-down bi-chevron-up');
                  });
                });
              </script>

              <script>
                $(document).ready(function() {
                  $('#review-icon').click(function() {
                    $('#review-table').toggle();
                    $(this).toggleClass('bi-chevron-down bi-chevron-up');
                  });
                });
              </script>

          </div>

        </div>
      </div>

      <!-- End of Modal Body --->

      <!--- Modal Footer --->
      <div class="modal-footer text-center">
        <div class="row">
          <div class="col">
            <div class="d-flex justify-content-center">
              <button id="barter" type="button" class="btn btn-outline-dark ms-2 mb-2" data-bs-target="#barterModal" data-bs-toggle="modal">Barter</button>
              <button id="borrow" type="button" class="btn btn-outline-success ms-2 mb-2" data-bs-target="#borrowModal" data-bs-toggle="modal">Borrow</button>
              <button id="buy" type="button" class="btn btn-outline-danger ms-2 mb-2" data-bs-target="#buyRequestModal" data-bs-toggle="modal">Buy</button>
              <button id="cartButton" type="button" class="btn btn-primary ms-2 mb-2" onclick="openItem()">
                More Details
              </button>
              <button id="porp" type="button" class="btn btn-primary ms-2 mb-2" onclick="openCart()">
                <i class="bi bi-cart-plus"></i> Add To Cart
              </button>
              <div id="cart-popup" class="cart-popup hidden">
                Added to Cart <i class="fa fa-shopping-cart"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--- End of Modal Footer --->


      <script>
        $(document).ready(function() {
          $('.fixed-button-bar').fadeIn();
        });
      </script>
    </div>
  </div>
</div>
<!--- End of Item Detail Modal --->

<div>
  <?php include "reportItem.php"; ?>
</div>

<!--- End of Report Item Modal --->

<!--- Barter Modal --->
<div>
  <?php include "bartermodal.php"; ?>
</div>

<!--- Borrow Modal --->
<div>
  <?php include "borrowmodal.php"; ?>
</div>

<!--- Buy Modal --->
<div>
  <?php include "buymodal.php"; ?>
</div>

<script>
  function showCartPopup() {
    var popup = document.getElementById('cart-popup');
    popup.classList.remove('hidden');
    setTimeout(function() {
      popup.classList.add('hidden');
    }, 2000); // Show for 2 seconds
  }

  function openItem() {
    // Get the item ID from the modal
    var itemID = document.getElementById('modalItemID').textContent;

    window.open('itemdetail.php?itemID=' + encodeURIComponent(itemID), '_blank');
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
  function populateModal(itemName, itemImagePath, itemQuantity, requestType) {
    const modalContentEl = document.getElementById('modalContent');
    const loadingIndicatorEl = document.getElementById('loadingIndicator');
    const cartButtonEl = document.getElementById('cartButton');
    const barterButtonEl = document.getElementById('barter');
    const borrowButtonEl = document.getElementById('borrow');
    const buyButtonEl = document.getElementById('buy');
    const porp1 = document.getElementById('porp');




    // Hide modal content and show loading indicator
    modalContentEl.style.display = 'none';
    loadingIndicatorEl.style.display = 'block';
    cartButtonEl.style.display = 'none';
    barterButtonEl.style.display = 'none';
    borrowButtonEl.style.display = 'none';
    buyButtonEl.style.display = 'none';
    porp1.style.display = 'none';





    // Set image source
    const modalItemImageEl = document.getElementById('modalItemImage');
    modalItemImageEl.src = `pictures/${itemImagePath}`;

    const modalItemImageE2 = document.getElementById('modalItemImages');
    modalItemImageE2.src = `pictures/${itemImagePath}`;

    let itemDetails = null;


    // Fetch item details using AJAX
    $.ajax({
      type: 'POST',
      url: 'get_item_details.php',
      data: {
        itemImagePath
      },
      dataType: 'json',
      success: (response) => {
        // Hide loading indicator and show modal content
        loadingIndicatorEl.style.display = 'none';
        modalContentEl.style.display = 'block';

        itemDetails = response;

        // Populate modal with item details
        document.getElementById('modalItemID').textContent = response.itemID;
        document.getElementById('modalItemQuantity').textContent = response.itemQuantity;
        document.getElementById('modalItemName').textContent = response.itemName;
        document.getElementById('modalItemCategory').textContent = response.category;
        document.getElementById('modalItemDescription').textContent = response.ItemDescription;

        // Create and append the badges
        const $requestTypeContainer = document.getElementById('modalItemRequestType');
        $requestTypeContainer.innerHTML = ''; // Clear the container

        const requestTypes = response.requestType.split(','); // Split the requestType string
        requestTypes.forEach(($type) => {
          let $badgeColor;
          switch ($type.trim()) {
            case 'Barter':
              $badgeColor = 'bg-dark';
              break;
            case 'Borrow':
              $badgeColor = 'bg-success';
              break;
            case 'Buy':
              $badgeColor = 'bg-danger';
              break;
            default:
              $badgeColor = 'bg-secondary';
              break;
          }

          // Create the badge element and append it to the container
          const $badge = document.createElement('span');
          $badge.classList.add('badge', 'rounded-pill', $badgeColor, 'me-1');
          $badge.textContent = $type.trim();
          $requestTypeContainer.appendChild($badge);
        });



        // Show/hide appropriate price fields based on the request type

        if (requestType.includes('Barter')) {
          barterButtonEl.style.display = 'block';
        } else {
          barterButtonEl.style.display = 'none';
        }

        if (requestType.includes('Buy')) {
          $("#buyField").show();
          $("#modalBuyPrice").text(parseFloat(response.buyPrice).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
          buyButtonEl.style.display = 'block';

        } else {
          $("#buyField").hide();
          buyButtonEl.style.display = 'none';

        }

        if (requestType.includes('Borrow')) {
          $("#borrowFields").show();
          $("#modalBorrowPrice").text(parseFloat(response.borrowPrice).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
          $("#modalBorrowDuration").text(parseFloat(response.borrowDuration));
          borrowButtonEl.style.display = 'block';


        } else {
          $("#borrowFields").hide();
          borrowButtonEl.style.display = 'none';

        }

        // Format and display the date/time posted
        const datePosted = new Date(response.DateTimePosted);
        document.getElementById('modalDateTimePosted').textContent = formatDateTime(datePosted);

        // Show edit and cart buttons
        cartButtonEl.style.display = 'block';
        porp1.style.display = 'block';


        // Get the button elements
        const barterButton = document.getElementById('barter');
        const borrowButton = document.getElementById('borrow');
        const buyButton = document.getElementById('buy');
        const reportButton = document.getElementById('report');


        barterButton.addEventListener('click', () => {
          // Open the barter modal and pass the item details and itemID
          openBarterModal(itemDetails, itemDetails.itemID);
        });

        reportButton.addEventListener('click', () => {
          // Open the barter modal and pass the item details and itemID
          openReportModal(itemDetails, itemDetails.itemID);
        });

        borrowButton.addEventListener('click', () => {
          // Open the borrow modal and pass the item details
          openBorrowModal(itemDetails, itemDetails.itemID, itemDetails.itemQuantity);
        });

        buyButton.addEventListener('click', () => {
          // Open the buy modal and pass the item details
          openBuyModal(itemDetails, itemDetails.itemID, itemDetails.itemQuantity);
        });

        // Populate user details
        document.getElementById('modalUserID').textContent = response.userID;
        document.getElementById('modalContactNumber').textContent = response.contactNumber;

        const modalOwnerLink = document.getElementById('modalOwnerLink');
        modalOwnerLink.href = `otherprofile.php?userID=${response.userID}`;

        const modalOwnerLinks = document.getElementById('modalOwnerLinks');
        modalOwnerLinks.href = `otherprofile.php?userID=${response.userID}`;

        document.getElementById('modalOwnerName').textContent = response.username;
        document.getElementById('modalUserImages').textContent = response.userImage_path;;
        modalUserImages.src = `picture/${response.userImage_path}`;


      },
      error: (xhr, status, error) => {
        console.error(xhr.responseText);
        console.error(error);
        showErrorMessage('An error occurred while fetching item details. Please try again later.');
      }
    });
  }

  function formatPrice(price) {
    return `₱ ${price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
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