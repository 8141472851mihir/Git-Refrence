<?php
    include("conf.php");

    extract($_POST);

    $sql ="INSERT INTO `brandmaster`(`brand_name`, `subcategory_id`) VALUES ('$brand_name','$subcategory')";

   // 
    $result = mysqli_query($conn, $sql);
    // var_dump($result);

    if(!$result){
        echo "Somthing went wrong!!";
    }
    else{
        header("Location:brand.php");
    }

    
?>