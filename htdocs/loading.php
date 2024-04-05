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

    .text span:nth-child(1) { animation-delay: 0s; }
    .text span:nth-child(2) { animation-delay: 0.5s; }
    .text span:nth-child(3) { animation-delay: 1s; }
    .text span:nth-child(4) { animation-delay: 1.5s; }
    .text span:nth-child(5) { animation-delay: 2s; }
    .text span:nth-child(6) { animation-delay: 2.5s; }

    .loader {
      width: 80px;
      height: 80px;
      border: 8px solid #fff;
      border-top-color: transparent;
      border-radius: 50%;
      animation: rotate 1s linear infinite, loaderGlow 2s ease-in-out infinite;
    }

    @keyframes rotate {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }

    @keyframes jumpText {
      0% { transform: translateY(0); }
      50% { transform: translateY(-20px); }
      100% { transform: translateY(0); }
    }

    @keyframes jumpIn {
      0% {
        font-size: 6rem;
      }
      50% {
        font-size: 7rem;
      }
      100% {
        font-size: 6rem;
      }
    }


    @keyframes textShadow {
      0% { text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 5px #fff; }
      50% { text-shadow: 0 0 10px #fff, 0 0 5px #fff, 0 0 5px #fff; }
      100% { text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 5px #fff; }
    }

    @keyframes loaderGlow {
      0% { box-shadow: 0 0 5px #fff, 0 0 5px #fff, 0 0 15px #fff; }
      50% { box-shadow: 0 0 10px #fff, 0 0 10px #fff, 0 0 10px #fff; }
      100% { box-shadow: 0 0 5px #fff, 0 0 5px #fff, 0 0 10px #fff; }
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
}
  </style>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="text">
    <span>I</span>
    <span>S</span>
    <span>H</span>
    <span>A</span>
    <span>R</span>
    <span>E</span>
  </div>
  <div class="loader"></div>
  <script>
    // Wait for the page to load
window.addEventListener('load', function() {

  // After 2 seconds, redirect to home.php
  setTimeout(function() {
    window.location.href = 'home.php';
  }, 2700);
});
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>