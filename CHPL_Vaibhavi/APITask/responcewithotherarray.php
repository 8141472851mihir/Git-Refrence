<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        if (isset($_POST['method']) == "get_data") {
            $sql = "SELECT * FROM `userregister`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {

                $user = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $abc["name"] = $row["name"];
                    $abc["email"] = $row["email"];
                    $abc["mo_no"] = $row["mo_no"];
                    $abc["gender"] = $row["gender"];
                    array_push($user, $abc);
                }
                $response["message"] = "All Data Retrived Successfully...";
                $response["status"] = "200";
                $response["data"] = $user;
            }
            else{
                $response["message"] = "Data Not Found in Table...";
                $response["status"] = "201";
            }

        } else {
            $response["message"] = "Please Pass The Correct Token Value...";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Please Pass The Correct Token...";
        $response["status"] = "201";
    }

} else {
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}
echo json_encode($response);
?>