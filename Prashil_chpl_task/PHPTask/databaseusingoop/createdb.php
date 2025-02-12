

<?php
    // include_once("config.php");
    $host = "localhost";
    $username = "root";
    $password = "";
    // $dbname = "pdb";

    $conn = new mysqli($host, $username, $password);
    if ($conn->connect_error)
    {
        // echo "Connected to the server";
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE DATABASE ODB";
    if ($conn->query($sql) === TRUE) {
      echo "Database created successfully";
    } else {
      echo "Error creating database: " . $conn->error;
    }
    
    $conn->close();
?>