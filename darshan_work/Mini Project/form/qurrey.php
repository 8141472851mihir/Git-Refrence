<?php

include 'database.php';

$name = $_POST['name'];
$email = $_POST['email'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

$phone = $_POST['phone'];
$date = $_POST['date'];
$password = $_POST['password'];

$sql = "INSERT INTO `form`(`name`, `Email`, `phone`, `date`,`password`) VALUES ('$name', '$email', '$phone', '$date' ,$password)";

if(mysqli_query($conn, $sql)){  
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
