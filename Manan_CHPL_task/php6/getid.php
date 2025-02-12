<?php
require 'connection.php';

$sql = "INSERT INTO testdata (customer_name,product_name,product_date)
VALUES('bhavya', 'washing machine','2025-01-21');";

if($conn->query($sql) === TRUE)
{
    $last_id = $conn->insert_id; 
    echo "New record created successfully. Last inserted ID is: " . $last_id;
}
else
{
    echo "error:".$sql."<br>".$conn->$error; 
}
$conn->close();
?>