<?php
include 'conn.php';
$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['data']) && $_POST['data'] === "update") {
        if (
            isset(
            $_POST['fname'],
            $_POST['lname'],
            $_POST['email'],
            $_POST['age'],
            $_POST['number'],
            $_POST['address'],
            $_POST['date'],
            $_POST['id']
        ) &&
            $_POST['fname'] != "" &&
            $_POST['lname'] != "" &&
            $_POST['email'] != "" &&
            $_POST['age'] != "" &&
            $_POST['number'] != "" &&
            $_POST['address'] != "" &&
            $_POST['date'] != "" &&
            $_POST['id'] != ""
        ) {

            $id = $_POST['id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $number = $_POST['number'];
            $address = $_POST['address'];
            $date = $_POST['date'];


            $sql = "UPDATE `datatable1` 
                    SET `fname`='$fname', `lname`='$lname', `email`='$email', 
                        `age`='$age', `number`='$number', `address`='$address', `date`='$date' 
                    WHERE id=$id AND number=$number";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_affected_rows($conn) > 0) {
                $response["message"] = "Update successful";
                $response["status"] = "200";
            } else {
                $response["message"] = "ID and Number do not match or no changes made";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Missing required fields";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Invalid token provided";
        $response["status"] = "201";
    }

} else {
    $response["message"] = "Only POST method allowed";
    $response["status"] = "201";
}

echo json_encode($response);
?>