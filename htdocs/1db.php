<?php 
    // Prepare database connection
        $servername = "127.0.0.1";
        $username = "mariadb"; 
        $password = "mariadb"; 
        $dbname = "mariadb"; 

    
    // Create connection 
        $connection = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
        if ($connection ->connect_error) {
            die("Connection Failed nigga" . $connection->connect_error);
        }
    


?>