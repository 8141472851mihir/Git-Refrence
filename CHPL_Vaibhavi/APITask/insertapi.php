<?php
include 'conn.php'; 

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['Insertdata']))
    {

    
    if(isset($_POST['name']) && isset($_POST['email'] )&& isset($_POST['password'])&& isset($_POST['mo_no'])&& isset($_POST['gender'])&& isset($_POST['address'])&& isset($_POST['city'])&& isset($_POST['state']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mo_no = $_POST['mo_no'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];

        $sql = "INSERT INTO userregister(name,email,password,mo_no,gender,address,city,state) VALUES ('$name','$email','$password','$mo_no','$gender','$address','$city','$state')";
        $result = mysqli_query($conn,$sql);

        if($result){
            $response["message"] = "Data Added Successfully!";
            $response["status"] = "200";
        }
        else{
            $response["message"] = "Error!!! Data Not Added To Database...";
            $response["status"] = "201";
        }

    }
    else{
        $response["message"] = "Please Add The Details...";
        $response["status"] = "201";
    }
}
else{
    $response["message"] = "Invalid Tag...";
    $response["status"] = "201";
}

}
else{
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}
echo json_encode($response);
?>