<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Product_Inventory_Management";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("connection failed " . mysqli_connect_error());
} else {
    echo "Connection Establish";
}


if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];


    $query = "SELECT * FROM subcategory WHERE category_id = $category_id";
    $result = mysqli_query($conn, $query);

    echo '<option value="">---SELECT---</option>';




    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['id'] . '">' . $row['subcategory_name'] . '</option>';
    }
}
