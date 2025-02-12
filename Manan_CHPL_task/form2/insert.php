<?php
include 'includes/db_connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate form data
    $errors = [];

    if (empty($_POST['name']))
        $errors[] = "Name is required.";
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        $errors[] = "Valid email is required.";
    if (empty($_POST['phone']) || !preg_match('/^[0-9]{10}$/', $_POST['phone']))
        $errors[] = "Valid 10-digit phone number is required.";
    if (empty($_POST['dob']))
        $errors[] = "Date of birth is required.";
    if (empty($_POST['gender']))
        $errors[] = "Gender is required.";
    if (empty($_POST['address']))
        $errors[] = "Address is required.";
    if (empty($_POST['mode_of_study']))
        $errors[] = "Mode of study is required.";

    // Handle file upload for student photo
    $photo_uploaded = false;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = basename($_FILES['photo']['name']);
        $target_dir = "assets/images/uploads/";
        $target_file = $target_dir . $photo;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            $photo_uploaded = true;
        } else {
            $errors[] = "Failed to upload photo.";
        }
    } else {
        $errors[] = "Photo is required.";
    }

    if (empty($errors)) {
        $student_name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $mode_of_study = $_POST['mode_of_study'];
        $status = isset($_POST['status']) ? 1 : 0;

        $sql = "INSERT INTO students (name, email, phone, dob, gender, address, mode_of_study, photo, status)
                VALUES ('$student_name', '$email', '$phone', '$dob', '$gender', '$address', '$mode_of_study', '$photo', '$status')";

        if ($conn->query($sql) === TRUE) {
            $student_id = $conn->insert_id;

            if (isset($_POST['courses']) && !empty($_POST['courses'])) {
                foreach ($_POST['courses'] as $course_id) {
                    $course_sql = "INSERT INTO student_courses (student_id, course_id) VALUES ('$student_id', '$course_id')";
                    if (!$conn->query($course_sql)) {
                        echo "<script>alert('Error adding course: {$conn->error}');</script>";
                        exit;
                    }
                }
            }
            echo "<script>alert('Student enrolled successfully!'); window.location.href='index.php';</script>";
            $to = $email;
            $subject = "Team Registration";
            include "mail/mail/sample2.php";
            include "mail/mail.php";
        } else {
            echo "<script>alert('Error: {$conn->error}');</script>";
        }
    } else {
        $error_message = implode("\\n", $errors);
        echo "<script>alert('Validation Errors:\\n$error_message'); window.history.back();</script>";
    }

} else {
    echo "<script>alert('Invalid request.'); window.history.back();</script>";
}
?>