<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['method'])) {
        if (isset($_POST['method']) == "get_data") {
            $sql = "SELECT * FROM `userdetails`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $arr = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $arr[] = $row;
                }
                $response["message"] = "All Data Get uccessfully";
            $response["status"] = "200";
            $response["data"] = $arr;
            }
            else{
                $response["message"] = "Data Not Found";
            $response["status"] = "201";
            }

        } 
        else {
            $response["message"] = "Incorrect TOken value";
            $response["status"] = "201";
        }
    } 
    else {
        $response["message"] = "Enter Token";
        $response["status"] = "201";
    }

} 
else {
    $response["message"] = "Invalid Method";
    $response["status"] = "201";
}
echo json_encode($response);
?>