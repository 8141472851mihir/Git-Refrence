<?php

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST["InsertData"])) {
        if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["gender"]) && isset($_POST["age"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $gender = $_POST["gender"];
            $gender = $_POST["age"];

            $sql = "INSERT INTO `user_Table`(`name`, `email`, `phone`, `gender`, `age`) VALUES ('$name','$email','$phone','$gender','$gender')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $response["message"] = "Data Inserted Successfully";
                $response["status"] = 200;
            } else {
                $response["message"] = "Error!! Data Not Inserted";
                $response["status"] = 201;
            }
        } else {
            $response["message"] = "Please add the user details";
            $response["status"] = 202;
        }
    } else {
        $response["message"] = "Please add Correct Token";
        $response["status"] = 203;
    }
} else {
    $response["message"] = "Only POST Request is allowed";
    $response["status"] = 204;
}

echo json_encode($response);