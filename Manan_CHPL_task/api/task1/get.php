<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['data'])) {
        if (isset($_POST['data']) == "getdata") {
            $sql = "SELECT * FROM `datatable1`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $array = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $array[] = $row;
                }
                $response["message"] = "Data fatched";
                $response["status"] = "200";
                $response["data"] = $array;
            } else {
                $response["message"] = "Data not found";
                $response["status"] = "201";
            }

        } else {
            $response["message"] = "token value required";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "error token";
        $response["status"] = "201";
    }

} else {
    $response["message"] = "Method Post Required";
    $response["status"] = "201";
}
echo json_encode($response);
?>