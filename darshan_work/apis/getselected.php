<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        if (isset($_POST['method']) == "getselected") {
            if (isset($_POST["id"])) {
                $id = $_POST["id"];

                $sql = "SELECT * FROM `userdetails` where id= $id";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {

                    $array = array();
                    $row = mysqli_fetch_assoc($result);
                    $array[] = $row;
                    $response["message"] = "Get Selected Data Successfully ";
                    $response["status"] = "200";
                    $response["data"] = $array;
                } else {
                    $response["message"] = "Data Not Found";
                    $response["status"] = "201";
                }
            } else {
                $response["message"] = "Invalid User id";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Token value is Incorrect";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = " Token Invalid";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Invalid Method";
    $response["status"] = "201";
}
echo json_encode($response);
