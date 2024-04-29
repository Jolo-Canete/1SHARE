<!-- Report User Modal -->
<div class="modal fade" id="reportUserModal" tabindex="-1" aria-labelledby="reportUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="reportUserModalLabel">Report User</h5>
                <h5 style="display: none;" class="modal-title" id="reportUserID"><?php echo $userID; ?></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- End of Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <label class="form-label"><b>Please specify your reason for reporting this user</b> <span class="text-danger">*</span></label>
                <textarea class="form-control" aria-label="Report reason" id="reportReason" required></textarea>
                <label class="form-label mt-3"><b>Upload a screenshot for evidence/proof</b> <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                </div>
                <div class="mt-3">
                    <img src="#" alt="Screenshot Preview" id="screenshotPreview" style="max-width: 100%; max-height: 200px; display: none;">
                </div>
            </div>
            <!-- End of Modal Body -->

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-target="#itemDetailModal" data-bs-toggle="modal">Go Back</button>
                <button id="reportbutton" type="button" class="btn btn-danger report-btn">Report</button>
            </div>
            <!-- End of Modal Footer -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Function to handle file input change and show image preview
        $('#inputGroupFile01').change(function () {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#screenshotPreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        });


        // Add event listener to the "Report" button
        $('#reportUserModal .report-btn').click(function () {
            // Get the form data
            var reportReason = $('#reportUserModal #reportReason').val();
            var screenshot = $('#reportUserModal #inputGroupFile01')[0].files[0];
            var userID = document.getElementById('reportUserID').textContent;
            console.log('userID:', userID);

            // Check if reportReason and screenshot are not null
            if (reportReason !== "" && screenshot !== undefined) {
                // Construct the data to send to the server
                var formData = new FormData();
                formData.append('reportReason', reportReason);
                formData.append('screenshot', screenshot);
                formData.append('userID', userID);

                $('#reportbutton').prop('disabled', true);

                // Send the AJAX request
                $.ajax({
                    url: 'report_user.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // Handle the successful response
                        console.log('User reported:', response);
                        if (response.trim() === "User reported successfully.") {
                            alert("User reported successfully.");
                            $('#reportUserModal').modal('hide'); // Close the modal
                            location.reload();
                        } else {
                            alert(response);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle the error response
                        console.error('Error reporting user:', error);
                        alert("An error occurred while reporting the user.");
                        $('#reportUserModal').modal('hide'); // Close the modal
                        $('#reportbutton').prop('disabled', false);

                    }
                });
            } else {
                alert("Please fill in the required fields.");
            }
        });
    });
</script>
