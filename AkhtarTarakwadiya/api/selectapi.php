<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['getusers'])) {

        $user = array();

        $sql = "SELECT * FROM users";

        $result = $con->query($sql);

        if($result->num_rows> 0){
            while ($row = $result->fetch_assoc()) {
                $user[] = $row;
                $response["message"] = "All Data Retrived Successfully";
                $response["status"] = "200";
                echo json_encode($user);
            }
        }else{
            $response["message"] = 'No Data Found';
            $response["status"] = "201";
        }
    } else {
        $response["message"] = 'Invalide Tag';
        $response["status"] = "201";
    }
} else {
    $response["message"] = 'Only POST Method Allowed';
    $response["status"] = "201";
}

    echo json_encode($response);
    mysqli_close($con);

?>