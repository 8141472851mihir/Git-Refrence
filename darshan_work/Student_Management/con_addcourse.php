<?php
    include 'connection.php';

    $name=$_POST['course_name'];

    $sql = "INSERT INTO `categories`(category_name) VALUES ('$name');";

    $result = mysqli_query($conn, $sql);
    if($result){
        header("location:courses.php");
        }
        else{
            echo "Data Not Inserted";
            }

?>