<?php
    include("conf.php");

    extract($_POST);

    $sql ="INSERT INTO `subcategorymaster`(`subcategory_name`, `category_id`) VALUES ('$subcategory_name','$category_name')";

   // 
    $result = mysqli_query($conn, $sql);
    // var_dump($result);

    if(!$result){
        header("Location: subcategory.php?error=1");
        exit();
    }
    else{
        header("Location: subcategory.php?success=1");
        exit();
    }

?>