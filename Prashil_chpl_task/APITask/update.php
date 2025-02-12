<?php
include 'conn.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method']) && $_POST['method'] == "update_data") {  
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['id'])) {
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone_no = $_POST['phone'];
            if(empty($name) && empty($email)&& empty($phone_no)){
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

        
            $checkSql = "SELECT id FROM `users` WHERE id = '$id'";
            $checkResult = mysqli_query($conn, $checkSql);

            if (mysqli_num_rows($checkResult) > 0) {
          
                $sql = "UPDATE `users` SET `name`='$name', `email`='$email', `phone`='$phone_no' WHERE id='$id'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $response["message"] = "Data Updated Successfully.";
                    $response["status"] = "200";
                } else {
                    $response["message"] = "Error! Data Not Updated.";
                    $response["status"] = "500";
                }
            } else {
            
                $response["message"] = "User does not exist.";
                $response["status"] = "404";
            }
        } else {
            $response["message"] = "Please provide all required details.";
            $response["status"] = "400";
        }
    } else {
        $response["message"] = "Invalid request: incorrect method value.";
        $response["status"] = "400";
    }
} else {
    $response["message"] = "Only POST method is allowed.";
    $response["status"] = "405";
}

echo json_encode($response);
?>
