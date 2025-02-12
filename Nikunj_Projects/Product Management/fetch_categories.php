<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Product_Inventory_Management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch categories
$query = "SELECT * FROM category";
$result = mysqli_query($conn, $query);

$options = "<option value=''>---SELECT CATEGORY---</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='" . $row['id'] . "'>" . $row['category_name'] . "</option>";
}

echo $options;
