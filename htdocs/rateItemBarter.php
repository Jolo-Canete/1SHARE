<?php
include "nav.php";

// Check if itemID is provided in the query parameter
if (isset($_GET['itemID'])) {
    // Sanitize the input
    $itemID = $_GET['itemID'];

    $sql = "SELECT item.*, user.username AS owner_name, user.contactNumber AS owner_contact, item.userID AS rater
    FROM item 
    JOIN user ON item.userID = user.userID 
    WHERE item.itemID = '$itemID'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the retrieved item details
        $item = mysqli_fetch_assoc($result);
        $rater = $item['rater'];
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

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if ($rater == $user_id) {
        // Redirect to success page if user has already rated the item
        echo "<script>window.location.href = 'tranSuccessful.php';</script>";
        exit;
    }
} else {
    // Redirect to login page if user is not logged in
    echo "<script>window.location.href = 'login.php';</script>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Detail</title>
    <style>
        /* CSS styles here */
    </style>
</head>

<body>

    <div class="page-content" id="content">

        <br>
        <div class="row" style="display: block;">
            <div class="col-12 col-md-10 offset-md-1">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <div class="text-center fw-bold">
                            Write your Review
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="reviewForm">
                            <div class="mb-3">
                                <label for="photoReview" class="form-label"><b>Add Photo (Optional)</b></label>
                                <input class="form-control" type="file" id="photoReview">
                            </div>
                            <div class="mb-3">
                                <label for="writeReview" class="form-label"><b>Write your review</b></label>
                                <textarea class="form-control" id="writeReview" name="review" rows="3" placeholder="Would you like to write anything about this item?"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><b>Rating (1-5)</b> <span class="text-danger">*</span></label>
                                <select class="form-control" id="rating" name="rating" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button id="submitReviewBtn" class="btn btn-primary">Submit Review</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3"></div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#submitReviewBtn').click(function() {
                // Retrieve review content, rating, and item ID
                var reviewContent = $('#writeReview').val();
                var rating = $('#rating').val();
                var itemID = '<?php echo $itemID; ?>';

                // Retrieve the image file and its name
                var photoReview = $('#photoReview')[0].files[0];
                var photoReviewName = photoReview ? photoReview.name : '';

                // Check if write review field is empty
                if (reviewContent.trim() === '') {
                    alert("Error: Write your review before submitting.");
                    return;
                }


                $(this).prop('disabled', true);


                // Create FormData object to send data including the image
                var formData = new FormData();
                formData.append('itemID', itemID);
                formData.append('review', reviewContent);
                formData.append('rating', rating);
                formData.append('photoReview', photoReview);
                formData.append('photoReviewName', photoReviewName); // Include the file name

                // Make an AJAX request to rateitem.php
                $.ajax({
                    url: 'rater.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // If the response indicates success, show "Successful" message
                        if (response.trim() === "Rating successfully added.") {
                            window.location.href = 'tranSuccessful.php';
                        } else {
                            alert("Rating successfully added.");
                            window.location.href = 'tranSuccessful.php';
                        }
                    },
                    error: function(xhr, status, error) {
                        // If the AJAX request itself fails, show error message
                        alert("Error: Unable to make the request.");
                    }
                });
            });
        });
    </script>



</body>

</html>