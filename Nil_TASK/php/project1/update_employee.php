<?php
include("connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $joining_date = $_POST['joining_date'];

    $query = "UPDATE employee_details 
              SET name='$name', email='$email', phone='$phone', gender='$gender', joining_date='$joining_date' 
              WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        echo "Employee Updated Successfully!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
