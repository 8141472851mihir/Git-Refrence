<?php

    $user = 'root';
    $host = 'localhost';
    $password = '';
    $db =  'student';

    $conn = mysqli_connect($host, $user, $password, $db);
    if (!$conn) {
        echo 'Error connecting to database';
    } else {
        // echo 'Connected to database';
    }

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description, X-Requested-With, Authorization');
?>