<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_id = $_POST["edit_department_id"];
    $department_name = trim($_POST["edit_department_name"]);

    if (!empty($department_id) && !empty($department_name)) {
        $sql = "UPDATE departments SET name = '$department_name' WHERE department_id = '$department_id'";

        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "empty"; 
    }

    $conn->close();
} 
?>
