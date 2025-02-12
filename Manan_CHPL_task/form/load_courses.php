<?php
include 'db.php';

$category = $_POST['category'];
$sql = "SELECT id, name FROM courses WHERE category = '$category'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<select name="courses" class="form-control" required>';
    echo '<option value="">Select Course</option>';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
    }
    echo '</select>';
} else {
    echo 'No courses available for this category.';
}
?>