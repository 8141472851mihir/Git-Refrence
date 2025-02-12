<?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "odb";
    
        $conn = new mysqli($host, $username, $password , $dbname);
        if ($conn->connect_error)
        {
            // echo "Connected to the server";
            die("Connection failed: " . $conn->connect_error);
        }
?>