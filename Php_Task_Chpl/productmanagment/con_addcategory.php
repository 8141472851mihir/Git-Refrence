<?php
    include("conf.php");

    extract($_POST);

    $sql ="INSERT INTO `categorymaster`(`category_name`) VALUES ('$category_name')";

   // 
    $result = mysqli_query($conn, $sql);
    // var_dump($result);

    if(!$result){
        echo "Somthing went wrong!!";
    }
    else{
        header("Location:category.php");
    }

    
?>
