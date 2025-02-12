<?php
session_start(); 
include 'database/connection.php';

if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];

    $sql = "DELETE FROM employee_details WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $employee_id);

    if ($stmt->execute()) {
        $_SESSION['success_msg'] = "Employee Deleted Successfully!";
    } else {
        $_SESSION['error_msg'] = "Failed to delete employee. Try again.";
    }

    $stmt->close();
}

$conn->close();
header("Location: AllEmployees.php");
exit();
?>
