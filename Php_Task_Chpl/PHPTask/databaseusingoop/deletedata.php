<?php
    include "conf.php";
    $id = 4;
    $sql1 = "select * from users where id = $id";
    $result1 = $conn -> query($sql1);
    $row = $result1 -> fetch_assoc();
    if($result1 -> num_rows > 0) {
        $sql2 = "delete from users where id = $id";
        if($conn->query($sql2) === TRUE) {  
            echo "Record deleted successfully";
        }
        else {
            echo "Error to delete record: " . $conn->error;
        }
    }
    else{
        echo "No record found";
    }
?>
