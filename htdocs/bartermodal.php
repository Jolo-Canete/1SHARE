<?php // Check if the user is logged in and get the user ID from the session
include "1db.php";

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Query to fetch all items owned by the user
    $sql_owned_items = "SELECT * FROM item WHERE userID = $user_id";
    $result_owned_items = mysqli_query($conn, $sql_owned_items);
}
?>

<!-- Barter Modal -->
<div class="modal fade" id="barterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="barterForm">
                <div class="modal-header bg-dark">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Barter</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <!-- Date and Time Meet input -->
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="date_time_meet" class="form-label"><b>Date and Time Meet</b> <span class="text-danger">*</span></label>
                                <input type="datetime-local" id="date_time_meet" name="date_time_meet" class="form-control">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="location" class="form-label"><b>Pick up Location (Default)</b> <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="Barangay Hall/Gym" aria-label="Barangay Hall/Gym" readonly>
                            </div>
                        </div>
                        <!-- Row of Owned Items -->
                        <div class="row">
                            <div class="col">
                                <label for="ownedItems">Select at Most <b>3 Owned Item/s</b> You Want to Barter:</label>
                                <br>
                                <hr>
                                <div class="row row-cols-5">
                                    <?php
                                    // Query to fetch all items owned by the user
                                    $sql_owned_items = "SELECT * FROM item WHERE userID = $user_id";
                                    $result_owned_items = mysqli_query($conn, $sql_owned_items);
                                    if (mysqli_num_rows($result_owned_items) > 0) {
                                        while ($row_owned_item = mysqli_fetch_assoc($result_owned_items)) {
                                    ?>
                                            <!-- Display each owned item -->
                                            <div class="col mb-4">
                                                <div class="card shadow" onclick="toggleCheckbox(this)">
                                                    <img src="pictures/<?php echo $row_owned_item['itemImage_path']; ?>" alt="<?php echo $row_owned_item['itemName']; ?>" class="card-img-top">
                                                    <div class="card-body">
                                                        <p class="card-text"><?php echo $row_owned_item['itemName']; ?></p>
                                                        <input type="checkbox" name="selectedItems[]" value="<?php echo $row_owned_item['itemID']; ?>" class="form-check-input">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        // Display a styled message if the user doesn't own any items
                                        ?>
                                        <div class="card-body text-center">
                                            <div class="no-items-message">You don't own any items.</div>
                                            <!-- Button to redirect to additem.php -->
                                            <a href="additem.php" class="btn btn-primary mt-3">Upload Item/s Here</a>
                                        </div>

                                </div>
                            <?php
                                    }
                            ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="modal-buttons d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> &nbsp;
                        <button type="button" id="requestButton" class="btn btn-primary">Request</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    function toggleCheckbox(card) {
        var checkbox = card.querySelector('input[type="checkbox"]');
        checkbox.checked = !checkbox.checked;

        var checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        if (checkedCheckboxes.length > 3) {
            checkbox.checked = false;
            alert("You can select at most 3 items.");
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#requestButton').click(function() {
            if (!validateDateTime()) {
                alert("Please select a date and time between 7am to 5pm on weekdays.");
                return;
            }

            // Manually trigger form submission
            $('#barterForm').submit();
        });

        $('#barterForm').submit(function(e) {
            e.preventDefault(); // Prevent form submission

            // Gather selected item IDs
            var selectedItems = [];
            $('input[name="selectedItems[]"]:checked').each(function() {
                selectedItems.push($(this).val());
            });

            // Check if at least one item is selected
            if (selectedItems.length === 0) {
                alert("Please select at least 1 item to continue this request.");
                return; // Exit the function
            }

            // Get date and time of meet
            var dateTimeMeet = $('#date_time_meet').val();

            // Check if the selected time is in the future
            var selectedDateTime = new Date(dateTimeMeet).getTime();
            var currentDateTime = new Date().getTime();
            if (selectedDateTime <= currentDateTime) {
                alert("Please select a time in the future.");
                return; // Exit the function
            }

            var itemId = "<?php echo $itemID; ?>"; // Assuming $itemID is defined above
            $('#requestButton').prop('disabled', true);


            // AJAX POST request
            $.ajax({
                type: 'POST',
                url: 'processbarter.php', // PHP script to handle the data
                data: {
                    selectedItems: selectedItems,
                    dateTimeMeet: dateTimeMeet,
                    itemId: itemId
                },
                success: function(response) {
                    // Handle response from the server
                    console.log(response);
                    if (response === "Success") {
                        alert("Successful");
                        window.location.href = "pending.php";
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                    alert("An error occurred while processing your request. Please try again later.");
                    $('#requestButton').prop('disabled', false);

                }
            });
        });
    });

    function validateDateTime() {
        var selectedDateTime = new Date($('#date_time_meet').val());

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
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>