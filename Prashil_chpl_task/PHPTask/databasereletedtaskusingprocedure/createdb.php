<?php
    // include_once("config.php");
    $host = "localhost";
    $username = "root";
    $password = "";
    // $dbname = "pdb";

    $conn = mysqli_connect($host, $username, $password,);
    if ($conn)
    {
        // echo "Connected to the server";
    }
    else
    {
        echo "Somthing went wrong";
    }

    $sql = "Create database pdb";

    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo "Database created successfully";
    }
    else {
        echo mysqli_error($conn);
    }
?>