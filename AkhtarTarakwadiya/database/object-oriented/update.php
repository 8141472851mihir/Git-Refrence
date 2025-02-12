<?php
    include 'conn.php';

    $update = "UPDATE `user` SET `name` = 'AKHTAR' WHERE `user_id` = 1";

    if($conn->query($update) === TRUE){
        echo "<br><br>Record updated successfully";
    }else{
        echo "Error updating record: " . $conn->error;
    }
?>