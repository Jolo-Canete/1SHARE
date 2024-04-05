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
            die("Connection Failed nigga" . $conn->connect_error);
        }


?>