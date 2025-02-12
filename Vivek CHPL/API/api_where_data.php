<?php 
    include("./db_connect.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['addData'])) {
            $id=$_POST['id'];
            $sql="SELECT * FROM test where id=$id;";
            $result=mysqli_query($con,$sql);

            if(mysqli_num_rows($result)> 0) {
                $array=array();
                $row=mysqli_fetch_assoc($result);
                    $array[]=$row;
                
                $response['message']="data fetched successfully";
                $response["status"]=200;
                $response["data"]=$array;
            }
            else {
                $response['message']="no data found";
                $response["status"]=201;
            }
        }
        else {
            $response['message']="invalid tag";
            $response['status']=201;
        }
    }
    else {
        $response['message']="only post method allowed";
        $response['status']=201;
    }
    

    echo json_encode($response);
    mysqli_close($con);
?>