<?php include "nav.php" ?>

<!doctype html>
<html lang="en">

<head>
    <title>Receive Buy Item</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
</head>

<body>
    <main>
        <div class="page-content" id="content">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-success text-white">
                                <h1 class="display-4 fw-bold text-center"><i class="bi bi-check-circle"></i> RECEIVED</h1>
                            </div>
                            <div class="card-body">
                                <p class="text-secondary mb-4">Please answer the following questions</p>
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label class="form-label"><b>Did the buyer received the item?</b> <span class="text-danger">*</span></label>
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
                                    <div class="mb-3" id="proofSection" style="display:none;">
                                        <label for="proof" class="form-label"><b>Please provide a proof that you have received your item (Optional)</b></label>
                                        <input class="form-control" type="file" id="proof">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" id="completeBtn" class="btn btn-success">Complete</button>
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
        });
    </script>
    <script>
    $(document).ready(function() {
    var completeBtn = $('#completeBtn');

    completeBtn.on('click', function() {
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
            url: 'reciever.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (typeof response === 'string' && response.trim() === 'success') {
                    alert('Request updated successfully.');
                    window.location.reload(); // Reload the page
                } else {
                    alert('Failed to update request. Please try again.');
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