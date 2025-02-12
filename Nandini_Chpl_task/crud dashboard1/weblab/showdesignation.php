<?php
include('conn.php');

if (isset($_POST['department_id'])) {
    $department_id = $_POST['department_id'];

    $query = "SELECT * FROM designations WHERE department_id = '$department_id'";
    $result = mysqli_query($conn, $query);

    echo "<option value='' disabled selected>-- Select --</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='{$row['designation_id']}'>{$row['name']}</option>";
    }
} else {
    echo "<option value='' disabled selected>Error loading designations</option>";
}
?>
