<?php session_start();   ?>

<!-- get the session variables -->
<?php 
$username = $_SESSION['username'] ;
$legitEmail = $_SESSION['email'] ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form action="" method="post">
  <a href="?logout=true">Log out</a> <br>
    <label for="email">Please enter your registered email</label> <br>
    <input type="email" name="email" placeholder="Email" >
    <input type="submit" name="submit" value="Submit">
  </form>
    <?php 
      // Display errors
        ini_set('display_errors', 1);

      // Post the form
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
          if(isset($_POST['submit'])) {
            // Get the variable amd the sessioned one's
              $email = $_POST['email'];
              echo $legitEmail;
            
            // Function to generate a verification code
              function generate_verification_code($length = 6) {
                $characters = '0123456789';
                $verificationCode = '';
                // Randomize the Verification code
                for ($i = 0; $i < $length; $i++) {
                  $verificationCode .= $characters[mt_rand(0, strlen($characters) - 1)];
                } return $verificationCode;
              }
            // Generate a verification code
              $verificationCode = generate_verification_code();
            // If the email is empty
              if(empty($email)){
                echo 'Please enter your email.';
              }
            // If the email is not the same as the sessioned one
              elseif($email != $legitEmail){
                echo 'The email you entered is not the same as the registered email, Please try again.';

              } else {
                  // setup the email parameters and send the mail
                    $to = $email;
                    $subject = "Password Change Verification Code";
                    $message = 'Your verification code is' . $verificationCode;
                    $headers = "From: apog.nipocyrus@ici.edu.ph\r\n";
                    $headers .= 'Reply-to:' . $email . '\r\n';
                    $headers .= 'X-Mailer: PHP/' . phpversion();
                  
                  // Send the mail
                    if(mail($to, $subject, $message, $headers)){
                      echo 'The verification code has been sent to your email.';
                    } else {
                      echo 'The verification code could not be sent to your email, due to some error.';
                    }
              }


          }
        }
        // If the user wants to log out
        if (isset($_GET['logout'])) {
          // Destroy the session and all its data
          session_destroy();
          // Redirect the user to the login page
          header("Location: login.php");
          exit;
        }
    ?> 
</body>
</html>