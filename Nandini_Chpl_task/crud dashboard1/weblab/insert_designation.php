<?php
include('conn.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_id = intval($_POST['department_id']);
    $designation_name = trim($_POST['designation_name']);

    if (empty($department_id) || empty($designation_name)) {
        echo "All fields are required!";
        exit();
    }

    $query = "INSERT INTO designations (department_id, name) VALUES ($department_id, '$designation_name')";

    if ($conn->query($query) === TRUE) {
        header("Location: designation.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
