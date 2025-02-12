<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product_Inventory";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Database not connected: " . mysqli_connect_error());
} else {
    // echo "Connected";
}
?>