<?php
include 'db.php';

$id = $_POST['id'];
$sql = "DELETE FROM students WHERE id = $id";

if ($conn->query($sql)) {
    echo "Student deleted successfully!";
} else {
    echo "Error deleting record: " . $conn->error;
}
?>