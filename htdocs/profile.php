<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

    body {
      background-color: #808080;
      font-size: 23px; /* Increased font size for body text */
    }

    .wrapper {
      position: relative;
      max-width: 100%;
      margin: 0 auto;
      padding: 20px;
    }

    .profile-container {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border: 1px solid #e0e0e0;
    }

    .left {
      width: 100%;
      background: linear-gradient(to right, #01a9ac, #01dbdf);
      padding: 30px 25px;
      border-radius: 5px;
      text-align: center;
      color: #fff;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .left img {
      border-radius: 5px;
      margin-bottom: 10px;
    }

    .left h4 {
      margin-bottom: 10px;
      font-size: 24px; /* Increased font size for heading */
    }

    .left p {
      font-size: 16px; /* Increased font size for paragraph */
    }

    .right {
      width: 100%;
    }

    .info {
      border: 2px solid black;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .info h3,
    .projects h3,
    .transactions h3 {
      margin-bottom: 15px;
      padding-bottom: 5px;
      border-bottom: 1px solid #e0e0e0;
      color: #353c4e;
      text-transform: uppercase;
      letter-spacing: 5px;
      font-size: 20px; /* Increased font size for headings */
    }

    .info_data,
    .projects_data,
    .transactions_data {
      display: flex;
      justify-content: space-between;
    }

    .data {
      width: 45%;
    }

    .data h4 {
      color: #353c4e;
      margin-bottom: 5px;
      font-size: 18px; /* Increased font size for heading */
    }

    .data p {
      font-size: 16px; /* Increased font size for paragraph */
      margin-bottom: 10px;
      color: #919aa3;
    }

    .social_media ul {
      display: flex;
    }

    .social_media ul li {
      width: 45px;
      height: 45px;
      background: linear-gradient(to right, #01a9ac, #01dbdf);
      margin-right: 10px;
      border-radius: 5px;
      text-align: center;
      line-height: 45px;
    }

    .social_media ul li a {
      color: #fff;
      display: block;
      font-size: 24px; /* Increased font size for social media icons */
    }

    .transaction-box {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border: 2px solid black;
    }
  </style>
</head>
<body>
<header>
  <?php include "nav.php"; ?>
</header>
<div class="wrapper">
  <div class="profile-container">
    <div class="left">
      <img src="https://github.com/mdo.png" alt="user" width="100">
      <h4>Jolo Cañete <br> <span style="font-size: 16px;">(Status: Verified)</span></h4>
      <p>Resident</p>
    </div>
    <div class="right">
      <div class="info">
        <h3>Information</h3>
        <div class="info_data">
          <div class="data">
            <h4>Email</h4>
            <p>canete.jolo@gmail.com</p>
          </div>
          <div class="data">
            <h4>Phone</h4>
            <p>09203513491</p>
          </div>
          <div class="data">
            <h4>Address</h4>
            <p>Zone 11, Purok 26-A, Curvada</p>
          </div>
          <div class="data">
            <h4>Nearest Landmark</h4>
            <p>Bilyaran</p>
          </div>
        </div>
      </div>
      <div class="transaction-box">
        <div class="transactions">
          <h3>Transaction History</h3>
          <div class="transactions_data">
            <!-- Transaction history content goes here -->
            <div class="data">
              <h4>Date</h4>
              <p>2024-02-15</p>
            </div>
            <div class="data">
              <h4>Type</h4>
              <p>Barter</p>
            </div>
          </div>
          <div class="transactions_data">
            <!-- Additional transactions -->
            <div class="data">
              <h4>Date</h4>
              <p>2024-02-10</p>
            </div>
            <div class="data">
              <h4>Type</h4>
              <p>Borrow</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
