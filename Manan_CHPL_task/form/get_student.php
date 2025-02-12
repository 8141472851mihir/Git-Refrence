<?php
include 'db.php';

$id = $_POST['id'];
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);
?>