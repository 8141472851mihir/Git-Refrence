<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method']) && $_POST['method'] == "updateData") {
        if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['gender'], $_POST['age'], $_POST['id'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $id = $_POST['id'];

            $checkIdQuery = "SELECT id FROM `user_Table` WHERE id='$id'";
            $checkIdResult = mysqli_query($conn, $checkIdQuery);

            if (mysqli_num_rows($checkIdResult) == 0) {
                $response["message"] = "Invalid ID";
                $response["status"] = "201";
                echo json_encode($response);
                exit;
            }

            $checkDuplicateQuery = "SELECT id FROM `user_Table` WHERE (email='$email' OR phone='$phone') AND id != '$id'";
            $checkDuplicateResult = mysqli_query($conn, $checkDuplicateQuery);
            
            if (mysqli_num_rows($checkDuplicateResult) > 0) {
                $response["message"] = "Email or Phone already exists";
                $response["status"] = "207";
                echo json_encode($response);
                exit;
            }

            $sql = "UPDATE `user_Table` SET `name`='$name', `email`='$email', `phone`='$phone', `gender`='$gender', `age`='$age' WHERE `id`='$id'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_affected_rows($conn) > 0) {
                $response["message"] = "Data updated successfully";
                $response["status"] = "200";
            } else {
                $response["message"] = "No changes made";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Details not found";
            $response["status"] = "202";
        }
    } else {
        $response["message"] = "Enter valid method or token";
        $response["status"] = "203";
    }
} else {
    $response["message"] = "Only POST method allowed";
    $response["status"] = "205";
}

echo json_encode($response);
