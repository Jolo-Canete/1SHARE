


<style>
    .modal-footer {
        position: sticky;
        bottom: 0;
        background-color: #fff;
    }
</style>

<!-- Item Detail Modal -->
<div class="modal fade item-detail" id="itemDetailModal" tabindex="-1" aria-labelledby="itemDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title fs-5" id="itemDetailModalLabel">
                    <i class="bi bi-info-circle-fill"></i> Item Details
                </h5>
                <button type="button" class="btn-close btn-close-red" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div id="loadingIndicator" style="display: none; text-align: center; position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);">
                    <div class="spinner-border text-primary mb-5 mt-5" role="status">

                        <span class="visually-hidden ">Loading...</span>

                    </div>
                </div>
                <div id="modalContent" style="display: none;">
                    <div class="row">
                        <div class="image-container mb-3" style="width: 339px; height: 339px; overflow: hidden;">
                            <img id="modalItemImage" src="your_image_url.jpg" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%; border-radius: 0px;">
                        </div>





                        <div class="col-md-6 ">
                            <div class="price-banner  mb-3" id="borrowFields">
                                <div class="banner-content">
                                    <div class="price-border">

                                        <span class="price-label">Borrow Price</span>
                                    </div>
                                    <div class="price-value">
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
                            <h5 class="h5" id="modalItemName"></h5>

                            <p><span class="text-dark mb-3" id="modalItemDescription"></span></p>
                            <p><span class="text-dark mb-3" id="modalItemDescriptions"></span></p>
                            <!-- Other Item Details -->

                            <div class="owned-by-container d-flex align-items-center ">
                                <a href="#" id="modalOwnerLink" class="owned-by-link d-flex align-items-center me-3" target="_blank">
                                    <div class="image-container mb-3" style="width: 32px; height: 32px; overflow: hidden; border-radius: 50%;">
                                        <img id="modalUserImages" src="" alt="Owner's Profile Image" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;">
                                    </div>
                                    <div class="owned-by-info ms-3 ">

                                        <p class="text-start"><i class="bi bi-person-circle"></i> <b>Owned by:</b>
                                            <span class="owned-by-badge" id="modalOwnerName"></span>
                                        </p>
                                    </div>
                                </a>
                            </div>

                        </div>
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
                    </div>
                </div>




                <br>

            </div>

            <div class="modal-footer text-center">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-center">
                            <button id="cartButton" type="button" class="btn btn-primary" onclick="openCart()">
                                <i class="bi bi-cart-plus"></i> Add To Cart
                            </button>
                            <button id="editButton" type="button" class="btn btn-primary ms-2" onclick="openItem()">
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
                $(document).ready(function() {
                    $('.fixed-button-bar').fadeIn();
                });
            </script>

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
        const modalContentEl = document.getElementById('modalContent');
        const loadingIndicatorEl = document.getElementById('loadingIndicator');
        const cartButtonEl = document.getElementById('cartButton');
        const editButtonEl = document.getElementById('editButton');

        // Hide modal content and show loading indicator
        modalContentEl.style.display = 'none';
        loadingIndicatorEl.style.display = 'block';
        cartButtonEl.style.display = 'none';
        editButtonEl.style.display = 'none';

        // Set image source
        const modalItemImageEl = document.getElementById('modalItemImage');
        modalItemImageEl.src = `pictures/${itemImagePath}`;



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


                // Populate modal with item details
                document.getElementById('modalItemID').textContent = response.itemID;
                document.getElementById('modalItemQuantity').textContent = response.itemQuantity;
                document.getElementById('modalItemName').textContent = response.itemName;
                document.getElementById('modalItemCategory').textContent = response.category;
                document.getElementById('modalItemDescription').textContent = response.ItemDescription.substr(0, 50) + "...";
                document.getElementById('modalItemDescriptions').textContent = response.ItemDescription;

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

                // Format and display the date/time posted
                const datePosted = new Date(response.DateTimePosted);
                document.getElementById('modalDateTimePosted').textContent = formatDateTime(datePosted);

                // Show edit and cart buttons
                cartButtonEl.style.display = 'block';
                editButtonEl.style.display = 'block';

                // Populate user details
                document.getElementById('modalUserID').textContent = response.userID;
                document.getElementById('modalContactNumber').textContent = response.contactNumber;
                const modalOwnerLink = document.getElementById('modalOwnerLink');
                modalOwnerLink.href = `otherprofile.php?owner=${response.userID}`;
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