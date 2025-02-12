<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        if (isset($_POST['method']) == "get_data") {
            $sql = "SELECT * FROM `users`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $array = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $response["name"] = $row["name"];
                    $response["email"] = $row["email"];
                    $response["phone"] = $row["phone"];
                }
                $response["message"] = "All Data Retrived Successfully...";
            $response["status"] = "200";
            // $response["data"] = $array;
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