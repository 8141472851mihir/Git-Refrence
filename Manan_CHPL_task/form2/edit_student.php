<?php
include 'includes/db_connection.php'; // Include the database connection file

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Fetch student data
    $student_query = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($student_query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $student_result = $stmt->get_result();
    $student = $student_result->fetch_assoc();
   
    // Fetch enrolled courses
    $courses_query = "SELECT course_id FROM student_courses WHERE student_id = ?";
    $stmt = $conn->prepare($courses_query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $courses_result = $stmt->get_result();
    $enrolled_courses = [];
    while ($course = $courses_result->fetch_assoc()) {
        $enrolled_courses[] = $course['course_id'];
    }

    // Fetch categories
    $categories = $conn->query("SELECT * FROM categories");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $mode_of_study = $_POST['mode_of_study'];
    $status = isset($_POST['status']) ? 1 : 0;

    $update_query = "UPDATE students SET name=?, email=?, phone=?, dob=?, gender=?, address=?, mode_of_study=?, status=? WHERE id=?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sssssssii", $name, $email, $phone, $dob, $gender, $address, $mode_of_study, $status, $student_id);

    if ($stmt->execute()) {
        // Update enrolled courses
        $conn->query("DELETE FROM student_courses WHERE student_id = $student_id");
        if (isset($_POST['courses'])) {
            foreach ($_POST['courses'] as $course_id) {
                $conn->query("INSERT INTO student_courses (student_id, course_id) VALUES ('$student_id', '$course_id')");
            }
        }
        echo "<script>alert('Student updated successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "Error updating student: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>

</head>

<body>
    <div class="container mt-5">
        <h2>Edit Student</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $student['id'] ?>">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="<?= $student['name'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $student['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="<?= $student['phone'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" value="<?= $student['dob'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select" required>
                    <option value="Male" <?= $student['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $student['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                    <option value="Female" <?= $student['gender'] == 'other' ? 'selected' : '' ?>>Other</option>

                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" required><?= $student['address'] ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Mode of Study</label>
                <select name="mode_of_study" class="form-select" required>
                    <option value="Online" <?= $student['mode_of_study'] == 'Online' ? 'selected' : '' ?>>Online</option>
                    <option value="Offline" <?= $student['mode_of_study'] == 'Offline' ? 'selected' : '' ?>>Offline
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select id="category" class="form-select">
                    <option value="" selected disabled>Select Category</option>
                    <?php while ($cat = $categories->fetch_assoc()): ?>
                        <option value="<?= $cat['id'] ?>"><?= $cat['category_name'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3" id="courses-container">
                <!-- Courses will be loaded  -->
            </div>
            <div class="mb-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" id="status" name="status" checked>
                <label class="form-check-label" for="status">Active Status</label>
            </div>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>

    



    <script src="assets/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>

    </script>
</body>

</html>