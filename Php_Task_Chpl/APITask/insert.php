<?php
include 'conn.php'; 

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(isset($_POST['Insertdata']))
    {

    
    if(isset($_POST['name']) && isset($_POST['email'] ) && isset($_POST['phone']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_no = $_POST['phone'];

        if(empty($name) && empty($email) &&  empty($phone_no)){
            $response["message"] = "All fields are required...";
            $response["status"] = "201";
            echo json_encode($response);
            exit;
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $response["message"] = "Invalid email format...";
            $response["status"] = "201";
            echo json_encode($response);
            exit;
        }

        if (!preg_match("/^[0-9]{10}$/", $phone_no)) {
            $response["message"] = "Phone number must be exactly 10 digits and contain only numbers.";
            $response["status"] = "201";
            echo json_encode($response);
            exit;
        }

        $checkSql = "SELECT id FROM users WHERE email = '$email' OR phone = '$phone_no'";
        $checkResult = mysqli_query($conn, $checkSql);

        if (mysqli_num_rows($checkResult) > 0) {
            $response["message"] = "User already exists with this email or phone number.";
            $response["status"] = "201";
            echo json_encode($response);
            exit;
        }

        $sql = "INSERT INTO users(name, email, phone) VALUES ('$name','$email','$phone_no')";
        $result = mysqli_query($conn,$sql);

        if($result){
            $response["message"] = "Data Added Successfully...";
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
    $response["message"] = "Please Add Correct Token...";
    $response["status"] = "201";
}

}
else{
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}
echo json_encode($response);
?>