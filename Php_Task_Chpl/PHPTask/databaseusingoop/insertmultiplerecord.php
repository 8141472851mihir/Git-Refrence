<?php
    include("conf.php");

    $sql = "INSERT INTO USERS (username, password, email) VALUES ('John', 'Doe', 'hello@123');";
    $sql .= "INSERT INTO USERS (username, password, email) VALUES ('King', 'Khan', 'kk@123');";
    $sql .= "INSERT INTO USERS (username, password, email) VALUES ('Queen', 'Khan', 'qk@123');";

    if($conn -> multi_query($sql) === true){
        echo "Data inserted successfully";
    }
    else{
        echo "error to insert data: " . $conn->error;
    }
?>