<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        if (isset($_POST['method']) == "get_data") {

            $sql = "SELECT * FROM userregister";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $array = array();
                while ($row = mysqli_fetch_assoc($result)) {

    
                    $response["name"] = $row["name"];
                    $response["email"] = $row["email"];
                    $response["mo_no"] = $row["mo_no"];
                    $response["gender"] = $row["gender"];
                    $response["address"] = $row["address"];
                }
                $response["message"] = "All Data Retrived Successfully...";
                $response["status"] = "200";

            }
    

        } else {
            $response["message"] = "Invalid Tag..";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Please Pass The Correct Token...";
        $response["status"] = "201";
    }

} else {
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}
echo json_encode($response);
?>