<?php
$servername = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($servername,$username,$password);

if($conn->connect_error)
{
    die("connection failed". $conn->connect_error);
}

$sql = "CREATE DATABASE chpl";
if($conn->query($sql) === TRUE)
{
    echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$conn->close();
?>