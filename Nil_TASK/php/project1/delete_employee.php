<?php
include("connection/connection.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM employee_details WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo json_encode(["status" => "success", "message" => "Employee deleted successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error deleting employee."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "ID not provided."]);
}
?>
