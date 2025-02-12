<?php
include 'connection.php';
$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        if (isset($_POST['method']) == "get_array") {
            $sql = "SELECT * FROM `userdetails`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                $get_array = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $a["name"] = $row["name"];
                    $a["email"] = $row["email"];
                    $a["phone"] = $row["phone"];
                    array_push($get_array, $a);
                }
                $response["message"] = "Another array message";
                $response["status"] = "200";
                $response["data"] = $get_array;
            } 
            else {
                $response["message"] = "Data Not Found";
                $response["status"] = "201";
            }
        } 
        else {
            $response["message"] = "Pass Correct Token ";
            $response["status"] = "201";
        }
    } 
    else {
        $response["message"] = "Pass The Correct Token";
        $response["status"] = "201";
    }
} 
else {
    $response["message"] = "Invalid Method";
    $response["status"] = "201";
}
echo json_encode($response);
