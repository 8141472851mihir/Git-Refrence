<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        if (isset($_POST['method']) == "get_data") {
            $sql = "SELECT * FROM `userdetails`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $array = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $array[] = $row;
                }
                $response["message"] = "bhai ye le data jo table me tha";
            $response["status"] = "200";
            $response["data"] = $array;
            }
            else{
                $response["message"] = "bhai table me data nahi hai";
            $response["status"] = "201";
            }

        } else {
            $response["message"] = "bhai token value wrong hai";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Bhai token sahi se pass karle";
        $response["status"] = "201";
    }

} else {
    $response["message"] = "Method Post karle run kar ne ke liye";
    $response["status"] = "201";
}
echo json_encode($response);
?>