<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (isset($_POST['adduser'])) {

        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $number = $_POST['number'];

        $sql = "INSERT INTO datatable (fname,email,number) values ('$fname','$email','$number')";

        if (mysqli_query($conn, $sql)) {
            $id = mysqli_insert_id($conn);
            $response["message"] = "Data inserted successfully";
            $response["status"] = 200;
            $response["last_inserted_id"] = $id;
        } else {
            $response["message"] = "error excution query:" . mysqli_error($conn);
            $response["status"] = 201;
        }
        
    }
    else {
        $response["message"] = "Invalid teg";
        $response["status"] = 201;
    }
}
else { 
    $response["message"] = "Only POST METHOD Allowed";
    $response["status"] = 201;
}
echo json_encode($response);
mysqli_close($conn);
?>