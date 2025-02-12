<?php
include('conn.php');

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if (!isset($_POST['delete_department_id']) || empty($_POST['delete_department_id'])) {
    echo "no_id"; 
    exit();
}

$departmentId = intval($_POST['delete_department_id']); 
$query = "DELETE FROM departments WHERE department_id = $departmentId";

if ($conn->query($query) === TRUE) {
    echo "success";
} else {
    echo "error: " . $conn->error;
}

$conn->close();
exit();
?>
