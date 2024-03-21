<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4">Upload Image</h2>
        <form id="uploadForm" action="testupload.php" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" accept="image/*">
                <button class="btn btn-primary" type="submit" name="submit">Upload Image</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                // Check if a file is uploaded
                if (!empty($_FILES['fileToUpload']['tmp_name']) && is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
                    // Create the target directory if it doesn't exist
                    $targetDirectory = "htdocs/pictures/";
                    if (!file_exists($targetDirectory)) {
                        mkdir($targetDirectory, 0777, true);
                    }

                    // Get the uploaded image information
                    $uploadedImagePath = $_FILES['fileToUpload']['tmp_name'];
                    $uploadedImageName = $_FILES['fileToUpload']['name'];

                    // Move the uploaded file to the target directory
                    $targetFile = $targetDirectory . basename($uploadedImageName);
                    if (move_uploaded_file($uploadedImagePath, $targetFile)) {
                        echo "<div class='alert alert-success mt-3'>The file " . basename($uploadedImageName) . " has been uploaded.</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>There was an error uploading your file.</div>";
                    }
                } else {
                    echo "<div class='alert alert-warning mt-3'>No file uploaded or the uploaded file is empty.</div>";
                }
            } catch (Exception $e) {
                echo "<div class='alert alert-danger mt-3'>" . $e->getMessage() . "</div>";
            }
        } else {
            echo "<div class='alert alert-info mt-3'>Invalid request method.</div>";
        }
        ?>
    </div>

    <!-- Include Bootstrap 5.3 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>