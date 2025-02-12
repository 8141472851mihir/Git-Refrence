<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";
    
    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection failed" . $conn->$_SESSION);
    }

    // $CREATEDB = "CREATE DATABASE myDB";

    // if($conn->query($CREATEDB)=== TRUE){
    //     echo "DB created successfully";
    // }else{
    //     echo "Error creating DB: " . $conn->error;
    // }

    // $CREATETB = "CREATE TABLE MyGuests (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,firstname VARCHAR(30) NOT NULL,
    //              lastname VARCHAR(30) NOT NULL, email VARCHAR(50), reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

    // if($conn->query($CREATETB)=== TRUE){
    //     echo "Table created successfully";
    // }else{
    //     echo "Error creating table: " . $conn->error;
    // }



    $INSERT = "INSERT INTO MyGuests(firstname,Lastname,email) VALUES ('John','Doe','John@gmail.com')";
    $INSERT .= "INSERT INTO MyGuests(firstname,Lastname,email) VALUES ('Hello','world','John@gmail.com')";

    if ($conn->query($INSERT) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }



    $conn -> close();
?>