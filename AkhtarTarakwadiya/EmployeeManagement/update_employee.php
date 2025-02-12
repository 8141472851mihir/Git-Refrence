<?php
session_start();    
include 'database/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $skills = implode(',', $_POST['skills']);
    $salary = $_POST['salary'];
    $date = $_POST['date'];

    $query = "UPDATE employee_details SET name='$name', email='$email', phone='$phone', gender='$gender', 
              department_id='$department', designation_id='$designation', skills='$skills', salary='$salary', 
              joining_date='$date' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success_msg'] = "Employee Details Updated Successfully!";
    } else {
        $_SESSION['error_msg'] = "Failed to update employee details.";
    }

    header("Location: AllEmployees.php");
    exit();
}