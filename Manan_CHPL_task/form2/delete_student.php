<?php
// Include the database connection file
include 'includes/db_connection.php';

// Check if the student ID is provided via GET
if (isset($_GET['id'])) {
    $student_id = intval($_GET['id']);

    // Start a transaction to ensure data integrity
    $conn->begin_transaction();

    try {
        // Step 1: Delete related records from student_courses
        $sql_courses = "DELETE FROM student_courses WHERE student_id = ?";
        $stmt_courses = $conn->prepare($sql_courses);
        $stmt_courses->bind_param("i", $student_id);
        $stmt_courses->execute();
        $stmt_courses->close();

        // Step 2: Delete the student record from students
        $sql_student = "DELETE FROM students WHERE id = ?";
        $stmt_student = $conn->prepare($sql_student);
        $stmt_student->bind_param("i", $student_id);

        if ($stmt_student->execute()) {
            $conn->commit(); // Commit the transaction if both deletions succeed
            header("Location: index.php");
            exit();
        } else {
            throw new Exception("Failed to delete the student record.");
        }

    } catch (Exception $e) {
        $conn->rollback(); // Roll back the transaction on error
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No student ID provided."]);
}

// Close the database connection
$conn->close();
?>



