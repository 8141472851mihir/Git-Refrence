<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['data'])) {
        $id = $_POST['id'];
        if (isset($_POST['data']) == "getdata") {
            $sql = "SELECT * FROM `datatable` where id = '$id'";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_assoc($result)) {
                $response["data"] = $row;

            } else {
                $response["message"] = "Data not found";
                $response["status"] = "201";
            }

        } else {
            $response["message"] = "token not matched";
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