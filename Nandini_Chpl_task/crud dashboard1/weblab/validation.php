<?php

$nameErr = $emailErr = $phoneErr = $genderErr = $deptErr = $designationErr = $salaryErr = $joiningDateErr = $fileErr = "";
$name = $email = $phone = $gender = $department = $designation = $salary = $joining_date = "";

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name Validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
        }
    }

    // Email Validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Phone Validation
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{10,15}$/", $phone)) {
            $phoneErr = "Invalid phone number (10-15 digits)";
        }
    }

    // Gender Validation
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    // Department Validation
    if (empty($_POST["department"])) {
        $deptErr = "Please select a department";
    } else {
        $department = test_input($_POST["department"]);
    }

    // Designation Validation
    if (empty($_POST["designation"])) {
        $designationErr = "Please select a designation.";
    } else {
        $designation = test_input($_POST["designation"]);
    }

    // Salary Validation
    if (empty($_POST["salary"])) {
        $salaryErr = "Salary is required";
    } else {
        $salary = test_input($_POST["salary"]);
        if (!is_numeric($salary) || $salary <= 0) {
            $salaryErr = "Enter a valid salary";
        }
    }

    // Joining Date Validation
    if (empty($_POST["joining_date"])) {
        $joiningDateErr = "Joining date is required";
    } else {
        $joining_date = test_input($_POST["joining_date"]);
    }

    // File Upload Validation
    if (!isset($_FILES["profile_picture"]) || $_FILES["profile_picture"]["error"] != 0) {
        $fileErr = "Profile picture is required";
    } else {
        $allowedTypes = ["image/jpeg", "image/png", "image/gif"];
        if (!in_array($_FILES["profile_picture"]["type"], $allowedTypes)) {
            $fileErr = "Only JPG, PNG, and GIF files allowed";
        }
    }
}
    ?>