<?php
include 'connection.php';

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $courses = mysqli_real_escape_string($conn, $_POST['courses']);
    $mode_of_study = mysqli_real_escape_string($conn, $_POST['mode_of_study']);

    $query = "UPDATE students 
              SET name='$name', email='$email', phone='$phone', dob='$dob', gender='$gender', 
                  address='$address', category_id=(SELECT id FROM categories WHERE category_name='$category'),
                  course_id=(SELECT id FROM avalible_courses WHERE course_name='$courses'), 
                  mode_of_study='$mode_of_study' 
              WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Student updated successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update student.']);
    }
}
?>
