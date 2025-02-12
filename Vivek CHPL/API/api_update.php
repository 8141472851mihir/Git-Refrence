<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        if (isset($_POST['method']) == "update") {
            if (isset($_POST['firstName']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['id'])) {
                $id = $_POST['id'];
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];

                $sql = "UPDATE test SET firstName='$firstName', lastName='$lastName',email='$email' WHERE id= $id";
                $result = mysqli_query($con, $sql);


                if ($result) {
                    $response["message"] = "Data Updated Successfully";
                    $response["status"] = "200";
                } else {
                    $response["message"] = "Data Update error";
                    $response["status"] = "201";
                }

            } else {
                $response["message"] = "User not found";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Enter The Correct Token";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Add The Correct Token";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Only Post Method Allowed";
    $response["status"] = "201";
}
echo json_encode($response);
mysqli_close($con);

?>