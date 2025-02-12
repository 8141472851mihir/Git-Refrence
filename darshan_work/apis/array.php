<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        if (isset($_POST['method']) == "array") {
            $sql = "SELECT * FROM `userdetails`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                
                $array = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $response["name"] = $row["name"];
                    $response["email"] = $row["email"];
                    $response["phone"] = $row["phone"];
                }
                $response["message"] = "Array Data Get Successfully";
                $response["status"] = "200";
            } 
            else {
                $response["message"] = "Data Not Found";
                $response["status"] = "201";
            }
        } 
        else {
            $response["message"] = "Token Value Incorrect";
            $response["status"] = "201";
        }
    } 
    else {
        $response["message"] = "Pass Correct Token";
        $response["status"] = "201";
    }
} 
else {
    $response["message"] = "Invalid Method";
    $response["status"] = "201";
}
echo json_encode($response);
