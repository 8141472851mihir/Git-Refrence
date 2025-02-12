<?php
include 'database/connection.php';

if (isset($_POST['department_id'])) {
    $department_id = $_POST['department_id'];

    $sql = "SELECT * FROM designations WHERE department_id = '$department_id'";
    $result = mysqli_query($conn, $sql);
    $designations = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo '<option selected disabled>-- Select Designation --</option>';
    foreach ($designations as $des) {
        echo "<option value='" . $des['id'] . "'>" . $des['name'] . "</option>";
    }
}
?>



