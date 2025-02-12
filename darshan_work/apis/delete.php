<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['method']) && $_POST['method'] == 'delete') {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $sql = "DELETE FROM `userdetails` WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_affected_rows($conn) > 0) {
                    $response["message"] = "Data Deleted Successfully...";
                    $response["status"] = "200";
                } 
                else {
                    $response["message"] = "ID Not Found...";
                    $response["status"] = "201";
                }
            } 
            else {
                $response["message"] = "Error!!! Data Not Deleted...";
                $response["status"] = "201";
            }
        } 
        else {
            $response["message"] = "Please Add a User ID To Perform Delete";
            $response["status"] = "201";
        }
    } 
    else {
        $response["message"] = "Please Add The Token...";
        $response["status"] = "201";
    }
} 
else {
    $response["message"] = "Only POST Method Allowed...";
    $response["status"] = "201";
}

echo json_encode($response);
