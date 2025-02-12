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
if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];

    $query = "SELECT * FROM product_subcategories WHERE category_id = $category_id";
    $result = mysqli_query($conn, $query);

    echo '<option value="">---SELECT---</option>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['id'] . '">' . $row['subcategory_name'] . '</option>';
    }
}
