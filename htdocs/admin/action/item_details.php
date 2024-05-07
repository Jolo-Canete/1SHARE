<?php  include '../1db.php';

// Get the userID from the link
$itemID = $_GET['item_id'];

// Run the mysql paramaters
$sql = "SELECT i.itemName, i.ItemDescription, i.category, i.itemImage_path, i.buyPrice, i.borrowPrice, i.userID, i.itemAvailability, i.borrowDuration, i.requestType, i.DateTimePosted, i.itemQuantity, u.firstName, u.middleName, u.lastName
FROM user u
LEFT JOIN item i ON u.userID = i.userID
WHERE i.itemID = $itemID";
$result = $conn-> query($sql);


// If the query returned false
if (!$result) {
    echo "<script>alert('Error updating Action, please try again')</script>";
    echo "<script>window.location.href='../ad_residents.php'</script>";
    exit;

// If the query returned empty
} elseif($result-> num_rows == 0) {
        echo "<script>alert('Item not found')</script>";
        echo "<script>window.location.href='../ad_residents.php'</script>";
        exit;
// array the user if true
    } else  {
     // Get the user Data
     $item = array();

     while ($itemRow = mysqli_fetch_assoc($result)) {
         $itemData = array(
             'itemName' => $itemRow['itemName'],
             'itemDescription' => $itemRow['ItemDescription'],
             'category' => $itemRow['category'],
             'itemImage_path' => $itemRow['itemImage_path'],
             'userID' => $itemRow['userID'],
             'buyPrice' => $itemRow['buyPrice'],
             'borrowPrice' => $itemRow['borrowPrice'],
             'borrowDuration' => $itemRow['borrowDuration'],
             'itemAvailability' => $itemRow['itemAvailability'],
             'requestType' => $itemRow['requestType'],
             'DateTimePosted' => $itemRow['DateTimePosted'],
             'itemQuantity' => $itemRow['itemQuantity'],
             'firstName' => $itemRow['firstName'],
             'middleName' => $itemRow['middleName'],
             'requestType' => $itemRow['requestType'],
             'lastName' => $itemRow['lastName'],
             
         );
     
         array_push($item, $itemData);
        }

        $date = date('Y-m-d', strtotime($itemData['DateTimePosted']));
        echo $date;
    
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Edit Item</title>
    <style>
/* Adjust the size of the container */
.container {
  max-width: 600px; 
  margin: 0 auto; 
}

/* Change the background color of the header */
.card-header {
background-color:#899499 !important; 
  color: #fff; 
  font-size: 1.50rem;
  padding: 0.75rem 1.25rem; 
}
/* Remove the number button */
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    
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
                <b>Edit Resident Item </b>
            </div>
    <div class="container my-5">
        <div class="page-content" id="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="card border-0">
                        <div class="card-body item-detail">
                            <form action="" method="post">
                                <input type="hidden" name="itemID" value="6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="item-image" onclick="document.getElementById('itemPicture').click();">
                                            <img id="previewImage"> <img src="../../pictures/<?php echo $itemData ['itemImage_path'] ?>" class="img-fluid" alt="" width="400px" height="500px">
                                        </div>
                                        <div class="mb-3 mt-2">
                                            <div class="mb-2">
                                                <label for="itemPicture"><b><? echo $itemData['itemName'] ?></b> <span class="text-danger"></span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <!--- Owner Name --->
                                        <div class="mb-3">
                                            <label for="itemName" class="form-label"><i class="bi bi-person"></i> <b>Owned By</b> <span class="text-danger"></span></label>
                                            <input type="text" class="form-control" id="itemName" name="ownerName" value="<?php echo ucfirst($itemData['firstName']) . ' ' . ucfirst($itemData['lastName']); ?>" readonly>
                                        </div>

                                        <!--- Item Name --->
                                        <div class="mb-3">
                                            <label for="itemName" class="form-label"><i class="bi bi-card-heading"></i> <b>Item Name</b> <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="itemName" name="itemName" value="<?php echo $itemData['itemName'] ?>">
                                        </div>

                                        <!--- Item Description --->
                                        <div class="mb-3">
                                            <label for="itemDescription" class="form-label"><i class="bi bi-card-text"></i> <b>Item Description</b></label>
                                            <textarea class="form-control" id="itemDescription" name="itemDescription"><?php echo $itemData['itemDescription'];?></textarea>
                                        </div>

                                        <!--- Item Category --->
                                        <label for="category" class="form-label"><i class="bi bi-tags"></i> <b>Category</b></label>

                                        <!--- Item Category Select --->
                                        <input type="text" class="form-control" id="itemName" name="itemCategory" value="<?php echo $itemData['category'];?>">
                                        <br>

                                        <!--- Item Availability --->
                                        <div class="mb-3">
                                            <label for="itemAvailability" class="form-label"><i class="bi bi-check2-circle"></i> <b>Availability </b></label>
                                            <input type="text" class="form-control" id="itemName" name="itemAvailability" value="<?php echo $itemData['itemAvailability'];?>">
                                        </div>

                                        <!--- Item Quantity --->
                                        <div class="mb-3">
                                            <label for="itemQuantity" class="form-label"><i class="bi bi-box"></i> <b>Item Quantity</b> <span class="text-danger">*</span></label>
                                            <input type="number" min="0" class="form-control" id="itemQuantity" name="itemQuantity" value="<?php echo $itemData ['itemQuantity'];?>">
                                        </div>
                                        
                                        <!--- Item Date --->
                                        <div class="mb-3">
                                            <label for="itemQuantity" class="form-label"><i class="bi bi-calendar2-range"></i> <b>Date Posted</b> <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="itemQuantity" name="itemDate" value="<?php echo $date?>">
                                        </div>

                                        <!--- Radio Button Open --->
                                        <?php
                                            // Iterate through each item
                                            foreach ($item as $itemData) {
                                                // Split the requestType string into an array
                                                $requestTypes = explode(',', $itemData['requestType']);

                                                // Start the HTML for the checkboxes
                                                echo '<div class="mb-3">';
                                                echo '<label class="form-label"><i class="bi bi-arrow-repeat"></i> <b>Request Type</b> <span class="text-danger">*</span></label>';

                                                // Check if 'Barter' is in the requestTypes array
                                                $checkedBarter = in_array('Barter', $requestTypes) ? 'checked' : '';
                                                echo '<div class="form-check">';
                                                echo '<input class="form-check-input" type="checkbox" value="Barter" name="requestType[]" id="requestTypeBarter" ' . $checkedBarter . '>';
                                                echo '<label class="form-check-label" for="requestTypeBarter">Barter</label>';
                                                echo '</div>';

                                                // Check if 'Borrow' is in the requestTypes array
                                                $checkedBorrow = in_array('Borrow', $requestTypes) ? 'checked' : '';
                                                echo '<div class="form-check">';
                                                echo '<input class="form-check-input" type="checkbox" value="Borrow" name="requestType[]" id="requestTypeBorrow" ' . $checkedBorrow . '>';
                                                echo '<label class="form-check-label" for="requestTypeBorrow">Borrow</label>';
                                                echo '</div>';

                                                // Check if 'Buy' is in the requestTypes array
                                                $checkedBuy = in_array('Buy', $requestTypes) ? 'checked' : '';
                                                echo '<div class="form-check">';
                                                echo '<input class="form-check-input" type="checkbox" value="Buy" name="requestType[]" id="requestTypeBuy" ' . $checkedBuy . '>';
                                                echo '<label class="form-check-label" for="requestTypeBuy">Buy</label>';
                                                echo '</div>';

                                                echo '</div>';
                                        }
                                        ?>
                                            <!-- If buy, input selling price -->
                                            <div class="mb-3" id="buyPriceField">
                                                <!-- Selling Price Label -->
                                                <label for="buyPrice" class="form-label"><i class="bi bi-cash"></i> <b>Selling Price (₱)</b></label>
                                                <!-- Selling Price Input -->
                                                <input type="number" step="0.01" class="form-control" id="buyPrice" name="buyPrice" value="<?php if (!empty($itemData['buyPrice'])) { echo number_format($itemData['buyPrice'], 2); } ?>">
                                            </div>

                                            <!-- If borrow, input borrowing price and duration -->
                                            <div class="mb-3" id="borrowPriceField">
                                                <!-- Borrowing Price Label -->
                                                <label for="borrowPrice" class="form-label"><i class="bi bi-cash"></i> <b>Maintenance Price (₱)</b></label>
                                                <!-- Borrowing Price Input -->
                                                <input type="number" step="0.01" class="form-control" id="borrowPrice" name="borrowPrice" value="<?php if (!empty($itemData['borrowPrice'])) { echo number_format($itemData['borrowPrice'], 2); } ?>">
                                            </div>
                                            <div class="mb-3" id="borrowDurationField">
                                                <!-- Borrowing Duration Label -->
                                                <label for="borrowDuration" class="form-label"><i class="bi bi-clock"></i> <b>Borrow Duration (Days)</b></label>
                                                <!-- Borrowing Duration Input -->
                                                <input type="number"  class="form-control" id="borrowDuration" name="borrowDuration" value="<?php if (!empty($itemData['borrowDuration'])) { echo $itemData['borrowDuration']; } ?>">
                                            </div>

                                    <!--- Button to save changes --->
                                    <!-- If the user wants to exit the document when clicked and transfered to ad_items.php -->
                                    <div class="d-flex justify-content-end mt-3">
                                    <input type="submit" class="btn btn-primary me-2" name="exitSave" value="Save">

                                    <!-- If the user wants to stay if clicked adn the page will refresh -->
                                    <input type="submit" class="btn btn-outline-primary me-2" name="save" value="Save but not exit">

                                    <!-- The user exited the document -->
                                    <a href="../ad_items.php" class="btn btn-outline-danger me-3"> Discard</a>
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
    <br>
    <br>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php 
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['exitSave'])) {
    // Retrieve form data
    $itemName = $_POST["itemName"];
    $itemDescription = $_POST["itemDescription"];
    $itemCategory = $_POST["itemCategory"];
    $itemAvailability = $_POST["itemAvailability"];
    $itemQuantity = $_POST["itemQuantity"];
    $itemDate = $_POST["itemDate"];
    $requestType = isset($_POST['requestType']) ? implode(',', $_POST['requestType']) : '';

    // Check if the buy price is set and not empty then turn it into a FLOAT as the database intended
    $buyPrice = isset($_POST['buyPrice']) && !empty($_POST['buyPrice']) ? number_format($_POST['buyPrice'], 2, '.', '') : 'NULL';
    
    // Check if the borrow price is set and not empty then turn it into a FLOAT as the database intended
    $borrowPrice = isset($_POST['borrowPrice']) && !empty($_POST['borrowPrice']) ? number_format($_POST['borrowPrice'], 2, '.', '') : 'NULL';
    
    // Check if the borrow duration is set and not empty 
    $borrowDuration = isset($_POST['borrowDuration']) && !empty($_POST['borrowDuration']) ? $_POST['borrowDuration'] : 'NULL';

    // Prepare the SQL query to update the item table
    $sql = "UPDATE item SET
            itemName = '$itemName',
            itemDescription = '$itemDescription',
            category = '$itemCategory',
            itemAvailability = '$itemAvailability',
            itemQuantity = $itemQuantity,
            DateTimePosted = '$itemDate',
            requestType = '$requestType',
            buyPrice = $buyPrice,
            borrowPrice = $borrowPrice,
            borrowDuration = $borrowDuration
            WHERE itemID = $itemID";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Item updated successfully')</script>";
        echo "<script>window.location.href='../ad_items.php'</script>";
        exit;
    } else {
        echo "Error updating form data: " . $conn->error;
        exit;
    }

    $conn->close();

    // Redirect to the ad_items.php page
    // Use script succes message

    }
}
?>
<script>
// Get the buy checkbox element
const buyCheckbox = document.getElementById('requestTypeBuy');
// Get the borrow checkbox element
const borrowCheckbox = document.getElementById('requestTypeBorrow');
// Get the buyPriceField element
const buyPriceField = document.getElementById('buyPriceField');
// Get the borrowPriceField element
const borrowPriceField = document.getElementById('borrowPriceField');
// Get the borrowDurationField element
const borrowDurationField = document.getElementById('borrowDurationField');
// Get the buyPrice input element
const buyPriceInput = document.getElementById('buyPrice');
// Get the borrowPrice input element
const borrowPriceInput = document.getElementById('borrowPrice');
// Get the borrowDuration input element
const borrowDurationInput = document.getElementById('borrowDuration');

// Function to show the buy price field
function showBuyPriceField() {
    buyPriceField.style.display = 'block';
}

// Function to show the borrow price and duration fields
function showBorrowFields() {
    borrowPriceField.style.display = 'block';
    borrowDurationField.style.display = 'block';
}

// Function to hide the buy price field
function hideBuyPriceField() {
    buyPriceField.style.display = 'none';
}

// Function to hide the borrow price and duration fields
function hideBorrowFields() {
    borrowPriceField.style.display = 'none';
    borrowDurationField.style.display = 'none';
}

// Add event listener to the buy checkbox
buyCheckbox.addEventListener('change', function() {
    // If buy checkbox is checked, show the buy price field
    if (this.checked) {
        showBuyPriceField();
    } else {
        // If buy checkbox is unchecked, hide the buy price field
        hideBuyPriceField();
    }

    // If borrow checkbox is checked, show the borrow fields
    if (borrowCheckbox.checked) {
        showBorrowFields();
    } else {
        // If borrow checkbox is unchecked, hide the borrow fields
        hideBorrowFields();
    }

    // Set the values of the input fields
    const buyPrice = <?php echo !empty($itemData['buyPrice']) ? number_format($itemData['buyPrice'], 2, '.', '') : 0; ?>;
    const borrowPrice = <?php echo !empty($itemData['borrowPrice']) ? number_format($itemData['borrowPrice'], 2, '.', '') : 0; ?>;
    const borrowDuration = <?php echo !empty($itemData['borrowDuration']) ? $itemData['borrowDuration'] : 0; ?>;

    buyPriceInput.value = buyPrice;
    borrowPriceInput.value = borrowPrice;
    borrowDurationInput.value = borrowDuration;
});

// Add event listener to the borrow checkbox
borrowCheckbox.addEventListener('change', function() {
    // If borrow checkbox is checked, show the borrow fields
    if (this.checked) {
        showBorrowFields();
    } else {
        // If borrow checkbox is unchecked, hide the borrow fields
        hideBorrowFields();
    }

    // If buy checkbox is checked, show the buy price field
    if (buyCheckbox.checked) {
        showBuyPriceField();
    } else {
        // If buy checkbox is unchecked, hide the buy price field
        hideBuyPriceField();
    }

    // Set the values of the input fields
    const buyPrice = <?php echo !empty($itemData['buyPrice']) ? number_format($itemData['buyPrice'], 2, '.', '') : 0; ?>;
    const borrowPrice = <?php echo !empty($itemData['borrowPrice']) ? number_format($itemData['borrowPrice'], 2, '.', '') : 0; ?>;
    const borrowDuration = <?php echo !empty($itemData['borrowDuration']) ? $itemData['borrowDuration'] : 0; ?>;

    buyPriceInput.value = buyPrice;
    borrowPriceInput.value = borrowPrice;
    borrowDurationInput.value = borrowDuration;
});

// Initial check to see which checkboxes are checked by default
if (buyCheckbox.checked) {
    showBuyPriceField();
} else {
    hideBuyPriceField();
}

if (borrowCheckbox.checked) {
    showBorrowFields();
} else {
    hideBorrowFields();
}

// Set the initial values of the input fields
const initialBuyPrice = <?php echo !empty($itemData['buyPrice']) ? number_format($itemData['buyPrice'], 2, '.', '') : 0; ?>;
const initialBorrowPrice = <?php echo !empty($itemData['borrowPrice']) ? number_format($itemData['borrowPrice'], 2, '.', '') : 0; ?>;
const initialBorrowDuration = <?php echo !empty($itemData['borrowDuration']) ? $itemData['borrowDuration'] : 0; ?>;

buyPriceInput.value = initialBuyPrice;
borrowPriceInput.value = initialBorrowPrice;
borrowDurationInput.value = initialBorrowDuration;
</script>
</body>
</html>