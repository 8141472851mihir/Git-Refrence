<?php

include 'conn.php';

$stmt = $conn->prepare("INSERT INTO `user` (`name`, `email`, `phone`, `address`, `profession`, `city`, `state`, `price`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $firstname, $email, $phone, $address, $profession, $city, $state, $price);

// set parameters and execute
$firstname = "John";
$email = "john@example.com";
$phone = "7895424765";
$address = "UK";
$profession = "Software";
$city = "London";
$state = "England";
$price = 1000;
$stmt->execute();

echo "<br><br>New records created successfully";

$stmt->close();
$conn->close();
