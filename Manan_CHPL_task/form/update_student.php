<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$courses = $_POST['courses'];
$mode_of_study = $_POST['mode_of_study'];

// Update student details in the database
$sql = "UPDATE students SET 
        name = '$name',
        email = '$email',
        phone = '$phone',
        dob = '$dob',
        gender = '$gender',
        address = '$address',
        courses = '$courses',
        mode_of_study = '$mode_of_study'
        WHERE id = $id";

if ($conn->query($sql)) {
    echo "Student details updated successfully!";
} else {
    echo "Error: " . $conn->error;
}
?>