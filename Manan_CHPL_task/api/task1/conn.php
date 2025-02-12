<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ApiDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "connection  successfully";
}

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description, X-Requested-With, Authorization');

?>