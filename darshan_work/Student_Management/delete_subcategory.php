<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `avalible_courses` WHERE `id` = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);  
    
    if ($stmt->execute()) {
        header("Location: avalible_course.php");  
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
