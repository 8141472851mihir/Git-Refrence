<?php
include("connection/connection.php");

if (isset($_POST['department_id'])) {
    $dept_id = $_POST['department_id'];
    $query = "SELECT id, name FROM designations WHERE department_id = '$dept_id'";
    $result = mysqli_query($conn, $query);

    $designations = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $designations[] = $row;
    }

    echo json_encode($designations);
}
?>
