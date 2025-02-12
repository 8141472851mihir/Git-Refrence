<?php
    include "conf.php";
    $sql = "INSERT INTO USERS (username, password, email) VALUES ('John', 'Doe', 'hello@123');";

    if($conn ->query($sql) === true){
        $last_id = $conn -> insert_id;
        echo "Data inserted successfully and id is " . $last_id;
    }
    else{
        echo "Error to insert data: " . $conn->error;
    }
?>