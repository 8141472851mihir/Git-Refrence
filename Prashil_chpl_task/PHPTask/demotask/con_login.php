<?php
    include "conf.php";

    // $username ="prashi";
    $phoneno = "8320162758";
    $email = "prashilparekh123@gmail.com";
    $password = "Hello@123";

    $sql = "select * from users_data where email ='$email' or phoneno = '$phoneno' and password = '$password'";
    $sql2 = "select * from users_data where passwrod = $password";
    $result2 = mysqli_query($conn,$sql2);
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if(mysqli_num_rows($result) > 0){
      
        echo "Login successfully";
    }
    else{
        echo "Invalid username or password";
    }
?>