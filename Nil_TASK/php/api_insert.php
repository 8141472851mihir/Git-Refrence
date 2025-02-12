<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "api_tester";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error($conn));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['addUser']) && $_POST['addUser'] === 'addUser') {
        $fname = $_POST['First_Name'];
        $lname = $_POST['Last_Name'];
        $email = $_POST['email'];

        $sql = "INSERT INTO `Students`(`First_Name`, `Last_Name`, `email`) VALUES ('$fname','$lname','$email')";

        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            $response['status'] = 200;
            $response['message'] = 'User Added Successfully';
            $response['last_inserted_id'] = $last_id;
        } else {
            $response['status'] = 201;
            $response['message'] = 'Failed to Add User: ' . mysqli_error($conn);
        }

    } else {
        $response['message'] = "Invalid tag";
        $response['status'] = 201;
    }
} else {
    $response['message'] = "Only POST method allowed";
    $response['status'] = 201;
}

echo json_encode($response);
mysqli_close($conn);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description, X-Requested-With, Authorization');
?>
