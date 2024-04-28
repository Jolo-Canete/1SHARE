<?php
include "nav.php";
include "1db.php";

// Start session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['requestId'])) {
    // Sanitize the input
    $requestID = mysqli_real_escape_string($conn, $_GET['requestId']);

    // Your SQL query to fetch data based on requestID and join with buy and item1 tables
    $sql = "SELECT Request.*, item.userID AS ownerID
            FROM Request
            JOIN borrow ON Request.requestID = borrow.requestID
            JOIN item ON borrow.item1 = item.itemID
            WHERE Request.requestID = '$requestID'";

    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if (!$result) {
        // Handle query error
        echo "Error: " . mysqli_error($conn);
    } else {
        $row = mysqli_fetch_assoc($result);
        $request_user_id = $row['userID']; // Use 'userID' from the Request table
        $owner_id = $row['ownerID']; // Use 'ownerID' from the item table
        
        if ($user_id != $request_user_id && $user_id != $owner_id) {
            // Perform some action, such as displaying an error message or redirecting to an error page
            echo "Access denied <br>";
            echo "<script>window.location.href = 'tranOngoing.php';</script>";

            exit; 
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Receive Buy Item</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #proofPreview {
            max-width: 150px;
            max-height: 150px;
        }
    </style>
</head>

<body>
    <main>
        <div class="page-content" id="content">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-success text-white">
                                <h1 class="display-4 fw-bold text-center"><i class="bi bi-check-circle"></i>HANDED</h1>
                            </div>
                            <div class="card-body">
                                <p class="text-secondary mb-4">Please answer the following questions</p>
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label class="form-label"><b>Handed Successful?</b> <span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Yes" name="received" id="recYes">
                                            <label class="form-check-label" for="recYes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="No" name="received" id="recNo">
                                            <label class="form-check-label" for="recNo">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <input type="hidden" id="requestId" value="<?php echo isset($_GET['requestId']) ? htmlspecialchars($_GET['requestId']) : ''; ?> " Required>
                                    <div class="mb-3" id="proofSection" style="display:none;">
                                        <label for="proof" class="form-label"><b>Please provide a proof that you have received or handed the item (Required)</b></label>
                                        <input class="form-control" type="file" id="proof">
                                        <img src="#" alt="Preview" id="proofPreview" style="display: none;">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" id="completeBtn" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var recYesCheckbox = document.getElementById('recYes');
            var recNoCheckbox = document.getElementById('recNo');
            var proofSection = document.getElementById('proofSection');
            var proofInput = document.getElementById('proof');
            var proofPreview = document.getElementById('proofPreview');

            recYesCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    recNoCheckbox.checked = false;
                    proofSection.style.display = 'block';
                } else {
                    proofSection.style.display = 'none';
                }
            });

            recNoCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    recYesCheckbox.checked = false;
                    proofSection.style.display = 'none';
                }
            });

            // Image preview
            proofInput.addEventListener('change', function() {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        proofPreview.src = event.target.result;
                        proofPreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    proofPreview.src = '#';
                    proofPreview.style.display = 'none';
                }
            });
        });

        $(document).ready(function() {
            var completeBtn = $('#completeBtn');

            completeBtn.on('click', function(event) {
                event.preventDefault(); // Prevent default form submission behavior

                var receivedValue = $('input[name="received"]:checked').val();
                var proofFile = $('#proof')[0].files[0];
                var requestId = $('#requestId').val();

                if (!receivedValue) {
                    alert('Please select an option for "Received".');
                    return;
                }

                var formData = new FormData();
                formData.append('received', receivedValue);
                formData.append('proof', proofFile);
                formData.append('requestId', requestId);

                $.ajax({
                    url: 'handed.php?requestId=' + encodeURIComponent(requestId),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.trim() === 'success') {
                            alert('Request confirm successfully.');
                            window.location.href = 'tranOngoing.php';
                        } else {
                            alert('Please insert proof and try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred while updating the request. Please try again later.');
                        console.error(xhr.responseText, status, error);
                    }
                });
            });
        });
    </script>
</body>

</html>