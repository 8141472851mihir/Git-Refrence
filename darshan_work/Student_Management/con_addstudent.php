<?php

include 'connection.php';

$student_name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$category_id = $_POST['category'];
$courses = $_POST['courses'];
$study_mode = $_POST['mode_of_study'];

// Convert the courses array into a comma-separated string
$course_ids = implode(",", $courses);

// Handle image upload (optional)
// $image_path = '';  
// if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] == 0) {
//     $image_path = 'uploads/' . $_FILES['productImage']['name'];
//     move_uploaded_file($_FILES['productImage']['tmp_name'], $image_path);
// }

$sql = "INSERT INTO `students` (`name`, `email`, `phone`, `dob`, `gender`, `address`, `category_id`, `course_id`, `mode_of_study`) 
        VALUES ('$student_name', '$email', '$phone_number', '$dob', '$gender', '$address', '$category_id', '$course_ids', '$study_mode')";

if (mysqli_query($conn, $sql)) {
    $to = $email;
    $subject = "test";
    include "mail/sampleamail.php";
    include "mail/mail.php";
    header("location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);
