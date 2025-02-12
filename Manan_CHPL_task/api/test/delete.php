<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['data'])) {
        if (isset($_POST['data']) == "delete ") {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                $sql = "DELETE FROM `datatable` WHERE id=$id";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $response["message"] = "Data deleted successfully";
                    $response["status"] = "200";
                } else {
                    $response["message"] = "error data not deleted";
                    $response["status"] = "201";
                }

            } else {
                $response["message"] = "id not found";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "token not found";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "token error";
        $response["status"] = "201";
    }

} else {
    $response["message"] = "Method Post required";
    $response["status"] = "201";
}
echo json_encode($response);
?>