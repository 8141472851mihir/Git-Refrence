<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['adduser'])) {
        if (
            $_POST['fname'] != "" &&
            $_POST['lname'] != "" &&
            $_POST['email'] != "" &&
            $_POST['age'] != "" &&
            $_POST['number'] != "" &&
            $_POST['address'] != "" &&
            $_POST['date'] != ""
        ) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $number = $_POST['number'];
            $address = $_POST['address'];
            $date = $_POST['date'];


            $sql = "INSERT INTO datatable1 ( `fname`, `lname`, `email`, `age`, `number`, `address`, `date`) values ('$fname','$lname','$email','$age','$number','$address','$date')";

            if (mysqli_query($conn, $sql)) {
                $id = mysqli_insert_id($conn);
                $response["message"] = "Data inserted successfully";
                $response["status"] = 200;
                $response["last_inserted_id"] = $id;
            } else {
                $response["message"] = "error excution query:" . mysqli_error($conn);
                $response["status"] = 201;
            }
        } else {
            $response["message"] = "required all fields";
            $response["status"] = 201;
        }

    } else {
        $response["message"] = "Invalid teg";
        $response["status"] = 201;
    }
} else {
    $response["message"] = "Only POST METHOD Allowed";
    $response["status"] = 201;
}
echo json_encode($response);
mysqli_close($conn);
?>