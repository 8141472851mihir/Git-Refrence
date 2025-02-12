<?php
    include 'connection.php';

if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];
    $query = "SELECT * FROM `avalible_courses` WHERE category_id = $category_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
            
       
        while ($course = $result->fetch_assoc()) {
            echo "<label style='margin-right: 10px;'><input type='checkbox' name='courses[]' value='" . $course['id'] . "'> " . $course['course_name'] . "</label>";
        }
    } else {
        echo "No courses available.";
    }
}
?>  