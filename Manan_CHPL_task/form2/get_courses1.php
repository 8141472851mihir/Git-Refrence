<?php
include 'includes/db_connection.php';

if (isset($_POST['category_id'], $_POST['student_id'])) {
    $category_id = $_POST['category_id'];
    $student_id = $_POST['student_id'];

    // Fetch courses based on the selected category
    $courses_query = "SELECT * FROM courses WHERE category_id = ?";
    $stmt = $conn->prepare($courses_query);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch enrolled courses for the student
    $enrolled_courses_query = "SELECT course_id FROM student_courses WHERE student_id = ?";
    $stmt = $conn->prepare($enrolled_courses_query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $enrolled_result = $stmt->get_result();
    $enrolled_courses = [];
    while ($row = $enrolled_result->fetch_assoc()) {
        $enrolled_courses[] = $row['course_id'];
    }

    // Display courses with checkboxes
    while ($course = $result->fetch_assoc()) {
        $checked = in_array($course['id'], $enrolled_courses) ? 'checked' : '';
        echo '<div class="form-check">
                <input class="form-check-input" type="checkbox" name="courses[]" value="' . $course['id'] . '" ' . $checked . '>
                <label class="form-check-label">' . $course['course_name'] . '</label>
              </div>';
    }
}
?>
