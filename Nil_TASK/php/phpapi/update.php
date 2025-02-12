<?php
include 'conn.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        if ($_POST['method'] === "update_data") {
            if (isset($_POST['name'], $_POST['id'])) {
                
                $name = $_POST['name'];
               
                $id = $_POST['id'];

                $sql = "UPDATE `userdetails` SET `name` = '$name', `email` = '$email', `phone_no` = '$phone_no' WHERE id = $id";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $response["message"] = "Data has been successfully updated.";
                    $response["status"] = "200";
                } else {
                    $response["message"] = "An error occurred while updating the data.";
                    $response["status"] = "500";
                }
            } else {
                $response["message"] = "Please provide all required details.";
                $response["status"] = "400";
            }
        } else {
            $response["message"] = "Invalid method value.";
            $response["status"] = "400";
        }
    } else {
        $response["message"] = "Method parameter is missing.";
        $response["status"] = "400";
    }
} else {
    $response["message"] = "Please use the POST method to make a request.";
    $response["status"] = "405";
}

echo json_encode($response);
?>
