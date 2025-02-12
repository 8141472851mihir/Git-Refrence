<?php
include 'connection.php';

if (isset($_POST['delete_student'])) {
    $student_id = $_POST['delete_student'];

    $query = "DELETE FROM students WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $student_id);
        if ($stmt->execute()) {
            header('Location: index.php');
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
