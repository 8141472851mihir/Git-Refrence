<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        if (isset($_POST['method']) == "update_data") {
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['id'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone_no = $_POST['phone'];
                $id = $_POST['id'];

                $sql = "UPDATE `users` SET`name`='$name',`email`='$email',`phone`='$phone_no' WHERE id=$id";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    $response["message"] = "Data Updated Successfully";
                    $response["status"] = "200";
                } else {
                    $response["message"] = "Data Not Updated";
                    $response["status"] = "201";
                }
            } else {
                $response["message"] = "Data Not Found";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Token Invalide";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Token Invalide";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Only Post Method Allowed";
    $response["status"] = "201";
}
echo json_encode($response);
