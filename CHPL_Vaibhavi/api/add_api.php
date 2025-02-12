<?php include('dbcon.php');


if($_SERVER['REQUEST_METHOD']=='POST'){

   if (isset($_POST['adduser'])) {
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mo_no=$_POST['mo_no'];

    $query= "INSERT INTO usermaster(name, email, mo_no) VALUES ('$name','$email','$mo_no')";
    $result= mysqli_query($conn,$query);

    if($result){
        $response['message']="Data Inserted Successfully";
        $response['status']="200";
    }else{
        $response['message']="Error executing query : ". mysqli_error($conn);
        $response['status']="201";
    }



   }else{
    $response['message']="Invalid tag";
    $response['status']="201";
   }




}else{
    $response['message']="use only post method";
    $response['status']="201";
}

echo json_encode($response);

mysqli_close($conn);

?>