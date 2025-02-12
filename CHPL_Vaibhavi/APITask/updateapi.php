<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['method']) && $_POST['method'] == "update_data") {

        $id = $_POST['id'];

        
        $sql = "SELECT * FROM userregister WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {

            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['mo_no']) && isset($_POST['gender']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['id'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $mo_no = $_POST['mo_no'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];

                $sql = "UPDATE userregister SET name='$name',email='$email',password='$password',gender='$gender',city='$city',state='$state' WHERE id=$id";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $response["message"] = "Data Updated Successfully!";
                    $response["status"] = "200";
                } else {
                    $response["message"] = "Data Not Updated.";
                    $response["status"] = "201";
                }

            } else {
                $response["message"] = "User not found.";
                $response["status"] = "201";
            }

        } else {
            $response["message"] = "ID not found.";
            $response["status"] = "201";
        }

    } else {
        $response["message"] = "Inavlid Tag.";
        $response["status"] = "201";
    }

} else {
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}
echo json_encode($response);
?>