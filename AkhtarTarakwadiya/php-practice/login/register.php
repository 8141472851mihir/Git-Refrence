<?php
include 'conn.php';

$firstname = "Test";
$email = "testing12@example.com";
$phone = "7895424765";
$address = "UK";
$profession = "Dev";
$city = "Surat";
$state = "Gujrate";
$price = 1000;

$check = "SELECT `email` FROM `user` WHERE `email` = '$email' ";
$result = mysqli_query($conn, $check);
if (mysqli_num_rows($result) > 0) {
    echo "<br><br>You Are already Registered!!!";
    $conn->close();
    exit();
} else {
    $stmt = $conn->prepare("INSERT INTO `user` (`name`, `email`, `phone`, `address`, `profession`, `city`, `state`, `price`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $firstname, $email, $phone, $address, $profession, $city, $state, $price);

    // set parameters and execute
    $stmt->execute();
    
    echo "<br><br>Registration Completed Successfully...";

    $stmt->close();
    $conn->close();
}
