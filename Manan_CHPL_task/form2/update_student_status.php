<?php
include 'includes/db_connection.php';

if (isset($_POST['student_id']) && isset($_POST['status'])) {
    $student_id = $_POST['student_id'];
    $status = $_POST['status'];

    $query = "UPDATE students SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $status, $student_id);

    if ($stmt->execute()) {
        echo "Status updated successfully.";
    } else {
        echo "Failed to update status.";
    }
} else {
    echo "Invalid request.";
}
?>
