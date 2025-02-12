<?php

// include("connection.php");

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'Product_Inventory_Management';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = $_GET['id'];

    $sql = "DELETE FROM products WHERE product_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $userId);

        if ($stmt->execute()) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing query: " . $conn->error;
    }
} else {
    die("Invalid ID");
}

$conn->close();
