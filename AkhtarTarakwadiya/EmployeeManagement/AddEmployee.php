<?php
include 'database/connection.php';
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST['name']) || !preg_match("/^[a-zA-Z ]+$/", $_POST['name'])) {
        $errors['name'] = "Please enter a valid name.";
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address.";
    }
    if (empty($_POST['phone']) || !preg_match("/^[0-9]{10}$/", $_POST['phone'])) {
        $errors['phone'] = "Please enter a valid 10-digit phone number.";
    }
    if (empty($_POST['gender'])) {
        $errors['gender'] = "Please select a gender.";
    }
    if (empty($_POST['department'])) {
        $errors['department'] = "Please select a department.";
    }
    if (empty($_POST['designation'])) {
        $errors['designation'] = "Please select a designation.";
    }
    if (empty($_POST['skills'])) {
        $errors['skills'] = "Please select at least one skill.";
    }
    if (empty($_POST['salary']) || !is_numeric($_POST['salary'])) {
        $errors['salary'] = "Please enter a valid salary amount.";
    }
    if (empty($_POST['joining_date']) || !preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $_POST['joining_date'])) {
        $errors['joining_date'] = "Please enter a valid joining date (YYYY-MM-DD).";
    }


 

    if (!empty($errors)) {
        // echo "<script>
        //     $(document).ready(function() {
        //         let errorMessage = '" . implode("<br>", array_values($errors)) . "';
        //         $('#toastTitle2').text('ERROR');
        //         $('#toastMessage2').html(errorMessage);
        //         $('.toast').toast('show');
        //     });
        // </script>";
    } else {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $department_id = mysqli_real_escape_string($conn, $_POST['department']);
        $designation_id = mysqli_real_escape_string($conn, $_POST['designation']);
        $salary = mysqli_real_escape_string($conn, $_POST['salary']);
        $joiningdate = isset($_POST['joining_date']) ? mysqli_real_escape_string($conn, $_POST['joining_date']) : NULL;
        $skills = isset($_POST['skills']) ? implode(",", $_POST['skills']) : "";

   
        
        $check_email = "SELECT id FROM employee_details WHERE email = '$email'";
        $result = mysqli_query($conn, $check_email);

        if (mysqli_num_rows($result) > 0) {
            echo "warning|This email is already registered!";
        } else {
            $sql = "INSERT INTO employee_details (name, email, phone, gender, department_id, designation_id, skills, salary, joining_date) 
                    VALUES ('$name', '$email', '$phone', '$gender', '$department_id', '$designation_id', '$skills', '$salary', '$joiningdate')";

            if (mysqli_query($conn, $sql)) {
                echo "success|Employee registered successfully!";
                $to = "$email";
                $subject = "Registration Completed!!!";
                include 'index2.php';
                include 'mail.php';
            } else {
                echo "error|Error: " . mysqli_error($conn);
            }
        }
    }
}
mysqli_close($conn);
