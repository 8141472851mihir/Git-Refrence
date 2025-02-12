<?php 
   include("./db_connect.php"); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST["addData"]))
        {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            
            $sql="INSERT INTO test (firstName,lastName,email) values ('$firstName','$lastName','$email');";

            if(mysqli_query($con, $sql))
            {
                $response['message']='Data Inserted Successfully';
                $response['status']=200;
            }
            else 
            {
                $response['message']='Error Executing Query'.mysqli_error( $con);
                $respone['status']=201;
            }
        }
        else 
        {
            $response['message']= 'Invalid Tag';
            $response['status']= 201;
        }
    }
    else{
        $response['message'] = 'Only POST Method Allowed';
        $response['status'] = 201;
    }

    echo json_encode($response);
    mysqli_close($con);
?>