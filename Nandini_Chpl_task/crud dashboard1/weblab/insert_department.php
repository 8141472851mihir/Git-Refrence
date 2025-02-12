<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_name = trim($_POST["name"]); 

    if (!empty($department_name)) {
        $sql = "INSERT INTO departments (name) VALUES ('$department_name')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Department added successfully!'); window.location.href='departments.php';</script>";
        } else {
            echo "<script>alert('Error adding department: " . $conn->error . "'); window.history.back();</script>";
        }

        $conn->close();
    } else {
        echo "<script>alert('Department name cannot be empty'); window.history.back();</script>";
    }
}
?>
