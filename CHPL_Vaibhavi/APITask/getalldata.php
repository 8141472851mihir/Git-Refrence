<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['method'])) {
        if (isset($_POST['method']) == "get_data") {

            
            $sql = "SELECT * FROM userregister";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $user = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $user[] = $row;
                }
                $response["message"] = "All Data Retrived Successfully!";
                $response["status"] = "200";
                $response["data"] = $user;
            }
            else{
                $response["message"] = "Data Not Found... Empty Table..";
                $response["status"] = "201";
            }

        } else {
            $response["message"] = "Invalid Tag..";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "PLease Enter The Correct Token...";
        $response["status"] = "201";
    }

} else {
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}
echo json_encode($response);
?>