<?php
    include 'conn.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['users'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $sql = "INSERT INTO `users` (`name`, `email`, `phone`) VALUES ('$name', '$email', '$phone')";

            if(mysqli_query($con, $sql)){
                $response["message"] = "Data Inserted Successfully";
                $response["status"] = 200;
            }else{
                $response["message"] = "Data Not Inserted";
                $response["status"] = 201;
            }
        }else{
            $response["message"] = "Invalid Tag";
            $response["status"] = 201;
        }
    }else{
        $response["message"] = 'Only POST Method Allowed';
        $response["status"] = "201";
    }

    echo json_encode($response);
    mysqli_close($con);
?>