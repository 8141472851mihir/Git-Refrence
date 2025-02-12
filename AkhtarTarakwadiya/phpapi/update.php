<?php
include 'conn.php'; 

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['method']))
    {
        if(isset($_POST['method'])== "update_data "){
            if(isset($_POST['name']) && isset($_POST['email'] )&& isset($_POST['phone_no'])&& isset($_POST['id']))
            {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone_no = $_POST['phone_no'];
                $id = $_POST['id'];
        
                $sql = "UPDATE `userdetails` SET`name`='$name',`email`='$email',`phone_no`='$phone_no' WHERE id=$id";
                $result = mysqli_query($conn,$sql);
        
                if($result){
                    $response["message"] = "Bhai data update ho gaya";
                $response["status"] = "200";
                }
                else{
                    $response["message"] = "Data add kar ne me dikat aa rahi hai";
                    $response["status"] = "201";
                }
        
            }
            else{
                $response["message"] = "Bhai details add karle";
                $response["status"] = "201";
            }
        }
        else{
            $response["message"] = "bhai token value wrong hai";
            $response["status"] = "201";
        }
}
else{
    $response["message"] = "Bhai token sahi se pass karle";
    $response["status"] = "201";
}

}
else{
    $response["message"] = "Method Post karle run kar ne ke liye";
    $response["status"] = "201";
}
echo json_encode($response);
?>