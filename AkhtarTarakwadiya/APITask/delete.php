<?php
include 'conn.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['method']) && $_POST['method'] == 'delete_data') {
        if (!empty($_POST['id']) && $_POST['id']) {

            $id = $_POST['id'];

            $check = "SELECT * FROM `users` WHERE `id` = '$id'";
            $DResult = mysqli_query($conn, $check);

            if (mysqli_num_rows($DResult) > 0) {
                $sql = "DELETE FROM `users` WHERE `id` = '$id'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $response["message"] = "User deleted successfully.";
                    $response["status"] = "200";
                } else {
                    $response["message"] = "Error! Could not delete user.";
                }
            } else {
                $response["message"] = "Invalid ID! User Not found...";
            }
        } else {
            $response["message"] = "Please provide User ID.";
        }
    } else {
        $response["message"] = "Invalid request! Missing or incorrect method parameter.";
    }
} else {
    $response["message"] = "Only POST method is allowed.";
}

echo json_encode($response);
?>
