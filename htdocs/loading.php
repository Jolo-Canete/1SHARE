<?php
include 'upper.php';

// Prepare and bind the parameter
$stmt = $conn->prepare("SELECT * FROM user WHERE userID = ?");
$stmt->bind_param("i", $user_id); // Assuming $user_id is the value of the userID

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();

    // Access the columns
    $username = $row['username'];
    // Access other columns as needed

    // Check status and redirect if necessary
    $status = $row['status']; // Assuming status column contains the user status
    if ($status == 'ban') {
        // JavaScript redirection to ban.php
        echo "<script>window.location.href = 'ban.php';</script>";
        exit(); // Make sure to exit after redirection
    } elseif ($status == 'Unverified') {
        // JavaScript redirection to wait.php
        echo "<script>window.location.href = 'wait.php';</script>";
        exit(); // Make sure to exit after redirection
    }

    // Proceed with other code if the user status is neither 'ban' nor 'Unverified'
} else {
    // Handle case where no user with the given userID is found
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ISHARE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #000;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      overflow: hidden;
    }

    .text {
      color: #fff;
      font-size: 6rem;
      font-weight: bold;
      font-family: 'Montserrat', sans-serif;
      margin-bottom: 2rem;
      display: flex;
      animation: jumpText 4s ease-in-out infinite, textGlow 2s ease-in-out infinite;
    }

    .text span {
      display: inline-block;
      margin-right: 0.5rem;
      font-size: 6rem;
      animation: jumpIn 0.5s ease-in-out forwards, textShadow 1s ease-in-out infinite;
    }

    .loader {
      width: 80px;
      height: 80px;
      border: 8px solid #fff;
      border-top-color: transparent;
      border-radius: 50%;
      animation: rotate 1s linear infinite, loaderGlow 2s ease-in-out infinite;
    }

    @keyframes rotate {
      from {
        transform: rotate(0deg);
      }

      to {
        transform: rotate(360deg);
      }
    }


    @keyframes loaderGlow {
      0% {
        box-shadow: 0 0 5px #fff, 0 0 5px #fff, 0 0 15px #fff;
      }

      50% {
        box-shadow: 0 0 10px #fff, 0 0 10px #fff, 0 0 10px #fff;
      }

      100% {
        box-shadow: 0 0 5px #fff, 0 0 5px #fff, 0 0 10px #fff;
      }
    }


    .outro {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(0, 0, 0, 0.8);
      color: white;
      padding: 20px;
      border-radius: 5px;
      font-size: 18px;
      text-align: center;
      z-index: 9999;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
  </style>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
</head>

<body>

  <div class="outro">
    <h1 class="mb-3">Welcome, <?php echo $username; ?>!</h1>
    <br>
    <div class="loader"></div>
  </div>

  <script>
    window.addEventListener('load', function() {
      setTimeout(function() {
        window.location.href = 'home.php';
      }, 1200);
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>