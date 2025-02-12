<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$course_category = $_POST['course_category'];
$courses = isset($_POST['courses']) ;
$mode_of_study = $_POST['mode_of_study'];
$enrollment_status = isset($_POST['enrollment_status']) ? 1 : 0;

$photo = '';
if (isset($_FILES['photo']['name'])) {
    $photo = 'uploads/' . basename($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
}

$sql = "INSERT INTO students (name, email, phone, dob, gender, address, course_category, courses, mode_of_study, photo, enrollment_status) 
        VALUES ('$name', '$email', '$phone', '$dob', '$gender', '$address', '$course_category', '$courses', '$mode_of_study', '$photo', '$enrollment_status')";

if ($conn->query($sql)) {
    echo "Student registered successfully!";
} else {
    echo "Error: " . $conn->error;
}
?>