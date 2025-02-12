<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pdb";

    $conn = mysqli_connect($host, $username, $password,$dbname);
    if ($conn)
    {
        // echo "Connected to the server";
    }
    else
    {
        echo "Somthing went wrong";
    }
?>