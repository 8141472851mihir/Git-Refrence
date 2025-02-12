<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $designation_id = intval($_POST['designation_id']);
    $department_id = intval($_POST['department_id']);
    $designation_name = trim($_POST['designation_name']);

    if (empty($designation_id) || empty($department_id) || empty($designation_name)) {
        echo "All fields are required!";
        exit();
    }

    $query = "UPDATE designations SET department_id = $department_id, name = '$designation_name' WHERE designation_id = $designation_id";

    if ($conn->query($query) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
