<div class="modal fade" id="borrowModal" tabindex="-1" aria-labelledby="borrowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h1 class="modal-title fs-5" id="borrowModalLabel">Borrow</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Borrow Form -->
                <form id="borrowForm">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="date_time_meets" class="form-label"><b>Date and Time Meet</b> <span class="text-danger">*</span></label>
                            <input type="datetime-local" id="date_time_meets" name="date_time_meets" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="location" class="form-label"><b>Pick up Location (Default)</b> <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" value="Barangay Hall/Gym" aria-label="Barangay Hall/Gym" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="quantity" class="form-label"><b>Quantity(<span id="maxQuantity"><?php echo isset($item['itemQuantity']) ? $item['itemQuantity'] : '0'; ?></span> Max)</b> <span class="text-danger">*</span></label>
                            <input type="number" id="quantity" name="quantity" class="form-control" min="1" max="0" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary ms-2" data-bs-target="#itemDetailModal" data-bs-toggle="modal">Go Back</button>
                    <button type="button" id="requestedButton" class="btn btn-primary">Request</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#requestedButton').click(function() {
            if (!validateDateTime()) {
                alert("Please select a date and time between 7am to 5pm on weekdays.");
                return;
            }

            if (!validateQuantity()) {
                return;
            }

            $('#borrowForm').submit();
        });

        $('#borrowForm').submit(function(e) {
            e.preventDefault(); // Prevent form submission

            // Get date and time of meet
            var dateTimeMeet = $('#date_time_meets').val();

            // Check if the date and time field is empty
            if (!dateTimeMeet) {
                alert("Please select a date and time.");
                return;
            }

            // Check if the selected time is in the future
            var selectedDateTime = new Date(dateTimeMeet).getTime();
            var currentDateTime = new Date().getTime();
            if (selectedDateTime <= currentDateTime) {
                alert("Please select a time in the future.");
                return; // Exit the function
            }

            var itemId = "<?php echo isset($itemID) ? $itemID : ''; ?>";

            $('#requestedButton').prop('disabled', true);

            // AJAX POST request
            $.ajax({
                type: 'POST',
                url: 'processborrow.php', // PHP script to handle the data
                data: {
                    dateTimeMeet: dateTimeMeet,
                    itemId: itemId,
                    quantity: $('#quantity').val() // Include quantity in the data
                },
                success: function(response) {
                    // Handle response from the server
                    console.log(response);
                    if (response === "Success") {
                        // Check if the selected time is within the valid range
                        if (validateDateTime()) {
                            alert("Successful");
                            window.location.href = "pending.php";
                        } else {
                            alert("The request was made outside of the valid time range (7am to 5pm on weekdays).");
                            $('#requestedButton').prop('disabled', false);
                        }
                    } else {
                        alert("Error: " + response);
                        $('#requestedButton').prop('disabled', false);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                    alert("An error occurred while processing your request. Please try again later.");
                    $('#requestedButton').prop('disabled', false);
                }
            });
        });
    });

    function validateDateTime() {
        var selectedDateTime = new Date($('#date_time_meets').val());

        // Check if selected day is a weekday (Monday to Friday)
        var dayOfWeek = selectedDateTime.getDay();
        if (dayOfWeek === 0 || dayOfWeek === 6) { // 0 is Sunday, 6 is Saturday
            return false;
        }

        // Check if selected time is between 7am to 5pm
        var selectedTime = selectedDateTime.getHours();
        if (selectedTime < 7 || selectedTime >= 17) {
            return false;
        }

        return true;
    }

    function validateQuantity() {
        var quantity = $('#quantity').val();
        var maxQuantity = parseInt($('#maxQuantity').text());

        if (quantity <= 1 && quantity >= maxQuantity) {
            alert("The quantity must be between 1 and " + maxQuantity + ".");
            return false;
        }

        return true;
    }
</script>