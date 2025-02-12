<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Insertdata'])) {


        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone_no = $_POST['phone'];
            $address = $_POST['address'];
            $state = $_POST['state'];

            $sql = "INSERT INTO `users`(`name`, `email`, `phone`, `address`, `state`) VALUES ('$name','$email','$phone_no', '$address', '$state')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $response["message"] = "Data Added Successfully...";
                $response["status"] = "200";
            } else {
                $response["message"] = "Error!!! Data Not Added To Database...";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Please Add The Details...";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Please Add Correct Token...";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}
echo json_encode($response);
