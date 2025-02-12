<?php
include 'conn.php'; 

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['method']))
    {
        if(isset($_POST['method'])== "delete_data "){
            if(isset($_POST['id']))
            {
                $id = $_POST['id'];
        
                $sql = "DELETE FROM `userdetails` WHERE id=$id";
                $result = mysqli_query($conn,$sql);
        
                if($result){
                    $response["message"] = "Bhai data delete ho gaya";
                $response["status"] = "200";
                }
                else{
                    $response["message"] = "Data delete kar ne me dikat aa rahi hai";
                    $response["status"] = "201";
                }
        
            }
            else{
                $response["message"] = "Bhai id add karle";
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