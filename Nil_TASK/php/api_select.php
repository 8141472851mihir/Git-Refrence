<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "api_tester";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error($conn));
}

$response = array();  // Initialize the response array

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        // Correct comparison
        if ($_POST['method'] === "update_data") { 
            if (isset($_POST['First_Name']) && isset($_POST['Last_Name']) && isset($_POST['email']) && isset($_POST['id'])) {
                $fname = $_POST['First_Name'];
                $lname = $_POST['Last_Name'];
                $email = $_POST['email'];
                $Sr_no = $_POST['Sr_no'];

                $sql = "UPDATE `Students` SET `First_Name`='$fname',`Last_Name`='$lname', `email`='$email' WHERE `Sr_no`='$Sr_no'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $response["message"] = "Data successfully updated.";
                    $response["status"] = "200";
                } else {
                    $response["message"] = "There was an issue updating the data.";
                    $response["status"] = "201";
                }
            } else {
                $response["message"] = "Please provide all the required details.";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Invalid token value.";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Token not passed correctly.";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Please use POST method to run this operation.";
    $response["status"] = "201";
}

// Set headers before echoing the response
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description, X-Requested-With, Authorization');

echo json_encode($response);

mysqli_close($conn);
?>
