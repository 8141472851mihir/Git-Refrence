<?php
include('conn.php');
include('image_upload.php'); // Ensure this file handles image uploads correctly

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data safely
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $department = $_POST['department'] ?? null;
    $designation = $_POST['designation'] ?? null;
    $skills = !empty($_POST['skills']) ? implode(',', $_POST['skills']) : ''; 
    $salary = $_POST['salary'] ?? null;
    $joining_date = !empty($_POST['joining_date']) ? date('Y-m-d', strtotime($_POST['joining_date'])) : null;
    $status = $_POST['status'] ?? 'Active';

    // Upload profile image if provided
    $profile_pic = 'default.jpg'; // Default image
    if (!empty($_FILES['profile_picture']['name'])) {
        if ($_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            $profile_pic = image_upload($_FILES['profile_picture']); 
        } else {
            die("File upload error: " . $_FILES['profile_picture']['error']);
        }
    }

    // Insert data into database
    $sql = "INSERT INTO employee_details 
    (name, email, phone, gender, department_id, designation_id, skills, salary, joining_date, status, profile_pic) 
    VALUES ('$name', '$email', '$phone', '$gender', '$department', '$designation', '$skills', '$salary', '$joining_date', '$status', '$profile_pic')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?msg=success");
        exit();
    } else {
        die("SQL Error: " . mysqli_error($conn));
    }
}
?>
