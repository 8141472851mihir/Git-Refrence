<?php
include "config.php";
$stmt = $conn->prepare("insert into student(name,age,address) values(?,?,?)");
$stmt->bind_param("sss", $name, $email, $password);
$name = "Prashil";
$email = "Prashilparekh@gmail.com";
$password = "morbi";
$stmt ->execute();

echo "Data inserted successfully";
?>