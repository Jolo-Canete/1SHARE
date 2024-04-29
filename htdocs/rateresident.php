<?php
include "nav.php";

// Check if requestID is provided in the query parameter
if (isset($_GET['requestID'])) {
    // Sanitize the input
    $requestID = $_GET['requestID'];

    $sql = "SELECT r.*, item.itemID, item.itemName, user.username AS owner_name, user.contactNumber AS owner_contact, r.userID AS rate, item.userID AS rater
    FROM Request r
    JOIN item ON r.itemID = item.itemID
    JOIN user ON item.userID = user.userID 
    WHERE r.requestID = '$requestID'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the retrieved request details
        $request = mysqli_fetch_assoc($result);
        $itemID = $request['itemID'];
        $rater = $request['rater'];
        $rate = $request['rate'];
    } else {
        // Handle error if requestID is not found
        echo 'Request not found';
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle error if requestID is not provided
    echo 'Request ID is required';
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if ($rater !== $user_id) {
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rate Residents</title>
</head>

<body>
    <main>
        <div class="page-content" id="container">
            <div class="container my-3">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <div class="text-center fw-bold">
                                    Write your Review
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="ratingForm" method="post">
                                    <div class="mb-3">
                                        <label for="review" class="form-label"><b>Write your review</b></label>
                                        <textarea class="form-control" id="review" name="review" rows="3" placeholder="Would you like to write anything about the resident?"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="rate" class="form-label"><b>Rating 1-5</b> <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" id="rate" name="rate" placeholder="Enter your rating" aria-label="rate" min="1" max="5" required>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <button id="submitBtn" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $("#submitBtn").click(function() {
                                        // Get rating and review values
                                        var rating = $("#rate").val();
                                        var review = $("#review").val();

                                        // Validate rating
                                        if (rating === "" || isNaN(rating) || rating < 1 || rating > 5) {
                                            alert("Please enter a valid rating (1-5).");
                                            return;
                                        }
                                        
                                        $(this).prop('disabled', true);

                                        // Get form data
                                        var formData = new FormData($("#ratingForm")[0]);

                                        // Add additional data
                                        formData.append("reportedID", "<?php echo $rate; ?>");
                                        formData.append("userID", "<?php echo $user_id; ?>");
                                        formData.append("review", review);
                                        formData.append("rate", rating);

                                        // AJAX request
                                        $.ajax({
                                            url: "insert_rating.php",
                                            type: "POST",
                                            data: formData,
                                            processData: false,
                                            contentType: false,
                                            success: function(response) {
                                                // Handle the AJAX response
                                                alert("Rating successfully submitted.");
                                                window.location.href = 'tranSuccessful.php';

                                            },
                                            error: function(xhr, status, error) {
                                                // Handle errors
                                                alert("Error occurred while submitting rating. Please try again.");
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>