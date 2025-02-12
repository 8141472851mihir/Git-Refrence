<?php include('dbcon.php');


if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['method']))
    {
        if(isset($_POST['method'])== "update_data "){
            if(isset($_POST['name']) && isset($_POST['email'] )&& isset($_POST['mo_no'])&& isset($_POST['id']))
            {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $mo_no = $_POST['mo_no'];
                $id = $_POST['id'];
        
                $sql = "UPDATE usermaster SET`name`='$name',`email`='$email',`mo_no`='$mo_no' WHERE id=$id";
                $result = mysqli_query($conn,$sql);
        
                if($result){
                    $response["message"] = "Data Updated.";
                $response["status"] = "200";
                }
                else{
                    $response["message"] = "Data not updated.";
                    $response["status"] = "201";
                }
        
            }
            else{
                $response["message"] = "Data not found";
                $response["status"] = "201";
            }
        }
        else{
            $response["message"] = "Invalid tag";
            $response["status"] = "201";
        }
}
else{
    $response["message"] = "Invalid method";
    $response["status"] = "201";
}

}
else{
    $response["message"] = " valid Method Post";
    $response["status"] = "201";
}
echo json_encode($response);
?>