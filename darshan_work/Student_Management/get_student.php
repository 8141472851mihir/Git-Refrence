<?php
include 'connection.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "SELECT s.id, s.name, s.email, s.phone, s.dob, s.gender, s.address, 
              c.category_name AS category, ac.course_name AS courses, 
              s.mode_of_study, s.status 
              FROM students AS s 
              INNER JOIN categories AS c ON s.category_id = c.id 
              INNER JOIN avalible_courses AS ac ON s.course_id = ac.id
              WHERE s.id = ?";
    
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "Student not found"]);
    }
} else {
    echo json_encode(["error" => "Invalid request"]);
}
?>
