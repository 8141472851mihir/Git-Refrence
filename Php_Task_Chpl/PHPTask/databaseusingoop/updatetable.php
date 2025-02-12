<?php
    include "conf.php";
    
    $id = 5;  
    $new_value = "premlata";  
    $sql1 = "SELECT * FROM users WHERE id = $id";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        $sql2 = "UPDATE users SET username = '$new_value' WHERE id = $id";

        if ($conn->query($sql2) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "No record found";
    }
?>
