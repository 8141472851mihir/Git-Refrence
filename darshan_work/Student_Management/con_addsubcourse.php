<?php
    include 'connection.php';

    $avalible_name=$_POST['subcourse_name'];
    $avalible_id = $_POST['category_name'];

    $sql = "INSERT INTO `avalible_courses`(`category_id`, `course_name`) VALUES ('$avalible_name','$avalible_id');";

    $result = mysqli_query($conn, $sql);
    if($result){
        header("location:avalible_course.php");
        }
        else{
            echo "Data Not Inserted";
            }

?>