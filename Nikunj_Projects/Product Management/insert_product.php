<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Product_Inventory_Management";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_name = $_POST['product_name'];
$category = $_POST['category_id'];
$subcategory = $_POST['subcategory_id'];
$brand_name = $_POST['brand_name'];
$price = $_POST['price'];
$stock_quantity = $_POST['stock_quantity'];
$supplier_name = $_POST['supplier_name'];
$purchase_date = $_POST['purchase_date'];
$discount_percentage = $_POST['discount_percentage'];
$final_price = $_POST['final_price'];
$payment_method = $_POST['payment_method'];


$available_colors = isset($_POST['available_colors']) ? implode(',', $_POST['available_colors']) : '';
$product_image = $_POST['product_image'];
$product_status = isset($_POST['product_status']) ? 'in_stock' : 'out_of_stock';



$sql = "INSERT INTO products (product_name, category_id, subcategory_id, brand_name, price, stock_quantity, supplier_name, purchase_date, discount_percentage, final_price, payment_method, available_colors, product_image, product_status) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing the SQL statement: " . $conn->error);
}


$stmt->bind_param("ssssiissdissss", $product_name, $category, $subcategory, $brand_name, $price, $stock_quantity, $supplier_name, $purchase_date, $discount_percentage, $final_price, $payment_method, $available_colors, $product_image, $product_status);


if ($stmt->execute()) {
    echo "New product added successfully!";
} else {
    echo "Error executing query: " . $stmt->error;
}

$stmt->close();
$conn->close();
