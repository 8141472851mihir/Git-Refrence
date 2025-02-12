<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "mysql_traning";

$conn = mysqli_connect("localhost", $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }else{
//   echo "Connected successfully";
}
?>
