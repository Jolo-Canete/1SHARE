<?php
session_start(); // Start the session to access the current user's information

// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "mariadb";

// Create a new PDO connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Check if the user is logged in
if (isset($_SESSION['userID'])) {
    // Prepare and execute the query to fetch the user's items
    $stmt = $conn->prepare("SELECT * FROM item WHERE userID = :userID");
    $stmt->bindParam(':userID', $_SESSION['userID']);
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Redirect to the login page or display an error message
    header("Location: login.php");
    exit;
}
?>

<div class="container">
    <div class="container-box">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($items as $item) { ?>
                <!-- Item Card -->
                <div class="col">
                    <div class="card" data-bs-toggle="modal" data-bs-target="#itemDetailModal" onclick="populateModal('<?php echo $item['itemName']; ?>', '<?php echo $item['imagePath']; ?>', '<?php echo $item['itemDescription']; ?>', '<?php echo date('F j, Y', strtotime($item['dateCreated'])); ?>', '<?php echo $item['condition']; ?>', '<?php echo $item['availability']; ?>', '<?php echo $item['requestType']; ?>')">
                        <img src="<?php echo $item['imagePath']; ?>" class="card-img-top" alt="<?php echo $item['itemName']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item['itemName']; ?></h5>
                            <p class="card-text"><i class="bi bi-tags-fill"></i> Category: <?php echo $item['category']; ?></p>
                            <p class="card-text"><i class="bi bi-card-text"></i> Item Description: <?php echo $item['itemDescription']; ?></p>
                            <p class="card-text"><i class="bi bi-calendar"></i> Date and Time Posted: <?php echo date('F j, Y', strtotime($item['dateCreated'])); ?></p>
                            <p class="card-text"><i class="bi bi-star-fill"></i> Condition: <?php echo $item['condition']; ?></p>
                            <p class="card-text"><i class="bi bi-check-circle-fill"></i> Availability: &nbsp;<span class="badge bg-<?php echo $item['availability'] == 'Available' ? 'success' : 'danger'; ?>-subtle text-<?php echo $item['availability'] == 'Available' ? 'success' : 'danger'; ?>-emphasis rounded-pill"><?php echo $item['availability']; ?></span></p>
                            <p class="card-text"><i class="bi bi-arrow-repeat"></i> Request Type: &nbsp;<span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill"><?php echo $item['requestType']; ?></span></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Item Detail Modal -->
<div class="modal fade" id="itemDetailModal" tabindex="-1" aria-labelledby="itemDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemDetailModalLabel">Item Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" id="modalItemImage" class="img-fluid mb-3" alt="Item Image">
                <h5 id="modalItemName"></h5>
                <p id="modalItemDescription"></p>
                <p><i class="bi bi-calendar"></i> Date and Time Posted: <span id="modalItemDatePosted"></span></p>
                <p><i class="bi bi-star-fill"></i> Condition: <span id="modalItemCondition"></span></p>
                <p><i class="bi bi-check-circle-fill"></i> Availability: <span id="modalItemAvailability"></span></p>
                <p><i class="bi bi-arrow-repeat"></i> Request Type: <span id="modalItemRequestType"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function populateModal(itemName, imagePath, itemDescription, datePosted, condition, availability, requestType) {
        document.getElementById('modalItemName').textContent = itemName;
        document.getElementById('modalItemImage').src = imagePath;
        document.getElementById('modalItemDescription').textContent = itemDescription;
        document.getElementById('modalItemDatePosted').textContent = datePosted;
        document.getElementById('modalItemCondition').textContent = condition;
        document.getElementById('modalItemAvailability').textContent = availability;
        document.getElementById('modalItemRequestType').textContent = requestType;
    }
</script>