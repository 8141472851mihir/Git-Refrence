<?php
require 'connection.php';

$sql = "INSERT INTO testdata(customer_name, product_name, product_price, product_sell, product_date) 
VALUES ('dharmi','light','500','1000','2024-12-10'),
('ganesh','ring','40000','600000','2024-05-20'),
('rudra','ac','45000','550000','2024-08-22'),
('rudri','ac','45000','550000','2024-02-02'),
('gagan','ac','45000','550000','2024-04-30'),
('abhishek','ac','45000','550000','2024-06-29')";

if ($conn->query($sql) === TRUE) {
    echo "data insert successfully";
  } else {
    echo "Error data not insert: " . $conn->error;
  }
  $conn->close();
?>