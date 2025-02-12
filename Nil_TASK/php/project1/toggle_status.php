<?php
include("connection/connection.php");

if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $query = "UPDATE employee_details SET status='$status' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo $status == 1 ? "User Activated" : "User Deactivated";
    } else {
        echo "Error updating status.";
    }
}
?>
