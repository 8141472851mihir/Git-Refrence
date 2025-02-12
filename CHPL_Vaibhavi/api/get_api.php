<?php include('dbcon.php');


if($_SERVER['REQUEST_METHOD']=='POST'){

   if (isset($_POST['getuser'])) {
   
    $users = array();
    
    $query= "SELECT * FROM usermaster";
    $result= mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){

        while($row=mysqli_fetch_assoc($result)){
            
            $user[]=$row;
        }

        $response['message']="Data get Successfully";
        $response['status']="200";
        $response['users']=$user;
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