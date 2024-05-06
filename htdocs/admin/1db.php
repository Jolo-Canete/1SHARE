<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['Lgn_Username'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: ../adlogin.php");
    exit;
}
?>
<?php 

    // Prepare database connection
        $servername = "127.0.0.1";
        $username = "mariadb"; 
        $password = "mariadb"; 
        $dbname = "mariadb"; 

    
    // Create connection 
        $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
        if ($conn ->connect_error) {
            die("Connection Failed broskie" . $conn->connect_error);
        }


?>