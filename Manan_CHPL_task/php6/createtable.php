<?php
require 'connection.php';

$sql = "CREATE TABLE testdata (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
customer_name VARCHAR(30) NOT NULL,
product_name VARCHAR(30) NOT NULL,
product_price int(30),
product_sell int(30),
product_date date,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table tastdata created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
  $conn->close();
?>