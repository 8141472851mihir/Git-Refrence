<?php

include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["method"]) && $_POST["method"] == "delete") {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];

            $checkIdQuery = "SELECT id FROM user_Table WHERE id = '$id'";
            $checkIdResult = mysqli_query($conn, $checkIdQuery);

            if (mysqli_num_rows($checkIdResult) == 0) {
                $response["message"] = "Invalid ID";
                $response["status"] = 201;
                echo json_encode($response);
                exit;
            }

            $sql = "DELETE FROM user_Table WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_affected_rows($conn) > 0) {
                $response["message"] = "Data deleted successfully";
                $response["status"] = 200;
            } else {
                $response["message"] = "Error!! Data not deleted";
                $response["status"] = 201;
            }
        } else {
            $response["message"] = "Please add User ID to perform delete operation";
            $response["status"] = 202;
        }
    } else {
        $response["message"] = "Please Add the Token";
        $response["status"] = 203;
    }
} else {
    $response["message"] = "Only POST method allowed";
    $response["status"] = 204;
}

echo json_encode($response);
