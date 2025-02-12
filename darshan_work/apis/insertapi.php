<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['insertdata'])) {

        if (isset($_POST['name'], $_POST['email'], $_POST['phone'])) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);

            if (empty($name) || empty($email) || empty($phone)) {
                $response['message'] = "All fields are required";
                $response['status'] = "400"; 
            }
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response['message'] = "Invalid email format";
                $response['status'] = "400"; 
            }
            elseif (!preg_match('/^[0-9]{10}$/', $phone) ) {
                $response['message'] = "Phone number must be digits only and the lenghth must be 10";
                $response['status'] = "400"; 
            } else {
                $name = mysqli_real_escape_string($conn, $name);
                $email = mysqli_real_escape_string($conn, $email);
                $phone = mysqli_real_escape_string($conn, $phone);

                $insert_sql = "INSERT INTO `userdetails`(`name`, `email`, `phone`) VALUES ('$name','$email','$phone')";

                $result = mysqli_query($conn, $insert_sql);
                if ($result) {
                    $response['message'] = "Successfully inserted";
                    $response['status'] = "200"; 
                } else {
                    $response['message'] = "Data not inserted";
                    $response['status'] = "500"; 
                }
            }
        } else {
            $response['message'] = "Please provide name, email, and phone";
            $response['status'] = "400"; 
        }
    } else {
        $response['message'] = "Invalid method";
        $response['status'] = "405"; 
    }
} else {
    $response['message'] = "Only POST method allowed";
    $response['status'] = "405"; 
}

echo json_encode($response);
?>
