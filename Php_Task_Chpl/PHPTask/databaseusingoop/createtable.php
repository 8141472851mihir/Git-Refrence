<?php
    include "conf.php";

    $sql = "CREATE TABLE USERS (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
    )";
    if($conn -> query($sql) === TRUE) {
        echo " Table created successfully";
    }
    else{
        echo "Error to creating table: " . $conn->error;    
    }
?>