<?php
require 'connection.php';

$stmt = $conn->prepare("INSERT INTO testdata (customer_name, product_name, product_price, product_sell, product_date) VALUES (?,?,?,?,?)");
$stmt->bind_param("ssiis",$customer_name,$product_name,$product_price,$product_sell,$product_date);

$customer_name = "mohan";
$product_name = "tv";
$product_price = 25000;
$product_sell = 30000;
$product_date = "2024-12-12";
$stmt->execute();

echo "New records created successfully";
$stmt->close();
$conn->close();
?>