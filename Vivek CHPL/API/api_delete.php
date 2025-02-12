<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['method']) && $_POST['method'] == 'delete') {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $sql = "DELETE FROM test WHERE id = '$id'";
            $result = mysqli_query($con, $sql);

            if ($result) {
                $response["message"] = "Data Deleted Successfully...";
                $response["status"] = "200";
            } else {
                $response["message"] = "Data Not Deleted...";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Please Add User Id To Perform Delete Operation";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Invalid Token...";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Only Post Method Allowed";
    $response["status"] = "201";
}

echo json_encode($response);
mysqli_close($con);
?>