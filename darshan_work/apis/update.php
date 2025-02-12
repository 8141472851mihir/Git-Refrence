<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        if ($_POST['method'] == "update") {

            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['id'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone_no = $_POST['phone'];
                $id = $_POST['id'];

                $check_id_sql = "SELECT * FROM `userdetails` WHERE id = $id";
                $check_id_result = mysqli_query($conn, $check_id_sql);

                if (mysqli_num_rows($check_id_result) > 0) {
                    $update_sql = "UPDATE `userdetails` SET `name` = '$name', `email` = '$email', `phone` = '$phone_no' WHERE id = $id";
                    $update_result = mysqli_query($conn, $update_sql);

                    if ($update_result) {
                        $response["message"] = "Data Updated Successfully";
                        $response["status"] = "200";
                    } else {
                        $response["message"] = "Data Not Updated";
                        $response["status"] = "201";
                    }
                } else {
                    $response["message"] = "ID not found";
                    $response["status"] = "404";
                }
            } else {
                $response["message"] = "Please provide all required details (name, email, phone, id)";
                $response["status"] = "400";
            }
        } else {
            $response["message"] = "Enter the correct method token";
            $response["status"] = "400";
        }
    } else {
        $response["message"] = "Method token is missing";
        $response["status"] = "400";
    }
} else {
    $response["message"] = "Only POST method is allowed";
    $response["status"] = "405";
}

echo json_encode($response);
