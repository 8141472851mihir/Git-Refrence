<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method'])) {
        if (isset($_POST['method']) == "get_data") {
            $sql = "SELECT * FROM `users`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {

                $abcd = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $arr["name"] = $row["name"];
                    $arr["email"] = $row["email"];
                    $arr["phone"] = $row["phone"];
                    array_push($abcd, $arr);
                }
                $response["message"] = "All Data Retrived Successfully...";
            $response["status"] = "200";
            $response["data"] = $abcd;
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