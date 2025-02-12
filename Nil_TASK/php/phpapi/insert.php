<?php
include 'conn.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Insertdata']) && isset($_POST['phone_no'])) {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone_no'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone_no = $_POST['phone_no'];

            $sql = "INSERT INTO userdetails (name, email, phone_no) VALUES ('$name', '$email', '$phone_no')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $response['message'] = 'Data added successfully';
                $response['status'] = '200';
            } else {
                $response['message'] = 'Error adding data';
                $response['status'] = '201';
            }
        } else {
            $response['message'] = 'Please provide all required details';
            $response['status'] = '201';
        }
    } else {
        $response['message'] = 'Invalid token';
        $response['status'] = '201';
    }
} else {
    $response['message'] = 'Invalid request method';
    $response['status'] = '201';
}

echo json_encode($response);
?>
