<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['data'])) {
        if (isset($_POST['data']) == "update") {
            if (isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['id'])) {
                $name = $_POST['fname'];
                $email = $_POST['email'];
                $phone_no = $_POST['number'];
                $id = $_POST['id'];

                $sql = "UPDATE `datatable` SET`fname`='$name',`email`='$email',`number`='$phone_no' WHERE id=$id";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $response["message"] = "update successfully";
                    $response["status"] = "200";
                } else {
                    $response["message"] = "data not updated";
                    $response["status"] = "201";
                }

            } else {
                $response["message"] = "add data";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "token not found";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "token not currect";
        $response["status"] = "201";
    }

} else {
    $response["message"] = "Method Post required";
    $response["status"] = "201";
}
echo json_encode($response);
?>