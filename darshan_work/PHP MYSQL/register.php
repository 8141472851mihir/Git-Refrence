<?php
include('conn.php');

$email = 'ja@gmail.com';

$for_check = "SELECT `emp_email` FROM `employee_details` WHERE `emp_email` = '$email' ";

$result = mysqli_query($conn, $for_check);
if (mysqli_num_rows($result) > 0) {
    echo "Your Email address is already exists!! Please Login your Self";
} else {
    $insert_query = "INSERT INTO employee_details(`emp_name`, `emp_surname`, `emp_contact`, `emp_email`, `emp_password`, `emp_joiningdate`, `emp_salary`, `emp_supervisor`, `emp_department`, `emp_address`) VALUES ('Jatin','Changecha','9913315504','$email','99133355','2024-05-25','20000','satyajeetkumar','IT','Ahmedabad')";
    $result = mysqli_query($conn, $insert_query);
    if ($result) {
        echo "Data Inserted Successfully!!";
    } else {
        echo "Data Not Inserted!!";
    }
}
