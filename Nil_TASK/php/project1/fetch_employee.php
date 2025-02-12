<?php
include("connection/connection.php");



if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "SELECT * FROM employee_details WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data);
}


?>
