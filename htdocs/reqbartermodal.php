<!-- Modal for Barter Request Details -->
<div class="modal fade" id="reqbartermodal" tabindex="-1" aria-labelledby="reqbartermodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Content for Barter Requests -->
            <div class="modal-header">
                <h5 class="modal-title" id="reqbartermodalLabel">Barter Request Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content will be dynamically populated using AJAX -->
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tableRows = document.querySelectorAll('.table-row');

        tableRows.forEach(function(row) {
            row.addEventListener('click', function() {
                // Extract the request ID from the hidden paragraph
                const requestID = this.querySelector('p').textContent;

                // Call a function to populate modal content with request details
                populateModal(requestID);
            });
        });
    });

    // Function to populate modal content with request details
    function populateModal(requestID) {
        // AJAX request to fetch request details based on the ID
        $.ajax({
            url: 'reqbarterjax.php',
            type: 'GET',
            data: {
                id: requestID
            },
            success: function(data) {
                // Update modal body with fetched data
                $('#reqbartermodal .modal-body').html(data);

                // Show the modal
                $('#reqbartermodal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }
</script>
