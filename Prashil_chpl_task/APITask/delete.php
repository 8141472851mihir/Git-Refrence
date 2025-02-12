<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['method']) && $_POST['method'] == 'delete_data') {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $checkSql = "SELECT id FROM `users` WHERE id = '$id'";
            $checkResult = mysqli_query($conn, $checkSql);

            if (mysqli_num_rows($checkResult) > 0) {
                $sql = "DELETE FROM `users` WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $response["message"] = "User deleted successfully.";
                    $response["status"] = "200";
                } else {
                    $response["message"] = "Error! Data not deleted.";
                    $response["status"] = "201";
                }
            } else {
                $response["message"] = "User does not exist.";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Please provide a User ID to perform delete operation.";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Invalid request: missing method token.";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Only POST method is allowed.";
    $response["status"] = "201";
}

echo json_encode($response);
?>
