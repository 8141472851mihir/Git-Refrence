<?php
include 'database/connection.php';

if (isset($_POST['department_id'])) {
    $department_id = $_POST['department_id'];
    $result = mysqli_query($conn, "SELECT * FROM designations WHERE department_id = $department_id");
    echo '<option disabled selected>-- Select Designation --</option>';
    while ($designation = mysqli_fetch_assoc($result)) {
        echo "<option value='{$designation['id']}'>{$designation['name']}</option>";
    }
}
?>
