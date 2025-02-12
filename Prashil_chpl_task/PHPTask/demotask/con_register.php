<?php
    include("conf.php");

    $username ="prashi";
    $phoneno = "8320162758";
    $email = "prashilparekh123@gmail.com";
    $password = "Hello@123";

    $sql = "select * from users_data where email = '$email' or phoneno = '$phoneno'";
    $result1 = mysqli_query($conn,$sql);
    $row1 = mysqli_fetch_array($result1);
    if(mysqli_num_rows($result1) > 0){
        echo "User already exists";
    }
    else{
        $sql = "insert into users_data (username,phoneno,email,password) values ('$username','$phoneno','$email','$password')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "User registered successfully";
        }
        else{
            echo "Somthing went wrong".mysqli_error($conn)." ";
        }
    }
?>