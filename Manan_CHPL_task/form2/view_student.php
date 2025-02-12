<?php
include 'includes/db_connection.php';

// Fetch student ID from the query parameter
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Fetch student details
    $student_query = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($student_query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $student_result = $stmt->get_result();
    $student = $student_result->fetch_assoc();

    // Fetch enrolled courses
    $courses_query = "SELECT c.course_name FROM student_courses sc
                      JOIN courses c ON sc.course_id = c.id
                      WHERE sc.student_id = ?";
    $stmt = $conn->prepare($courses_query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $courses_result = $stmt->get_result();
    $courses = [];
    while ($course = $courses_result->fetch_assoc()) {
        $courses[] = $course['course_name'];
    }
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Student Details</title>
    <link href="assets/css/style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Student Details</h2>
        <div class="card">
            <div class="card-header bg-primary text-white">Basic Information</div>
            <div class="card-body">
                <p><strong>Name:</strong> <?= htmlspecialchars($student['name']); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($student['email']); ?></p>
                <p><strong>Phone:</strong> <?= htmlspecialchars($student['phone']); ?></p>
                <p><strong>Date of Birth:</strong> <?= htmlspecialchars($student['dob']); ?></p>
                <p><strong>Gender:</strong> <?= htmlspecialchars($student['gender']); ?></p>
                <p><strong>Address:</strong> <?= htmlspecialchars($student['address']); ?></p>
                <p><strong>Mode of Study:</strong> <?= htmlspecialchars($student['mode_of_study']); ?></p>
                <p><strong>Status:</strong> <?= $student['status'] ? 'Active' : 'Inactive'; ?></p>
                <p><strong>Courses Enrolled:</strong> <?= implode(', ', $courses); ?></p>
                <p><strong>Photo:</strong><br>
                    <img src="assets/images/uploads/<?= htmlspecialchars($student['photo']); ?>" alt="Student Photo" width="150" class="border rounded">
                </p>
                <a href="index.php" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</body>
</html>
