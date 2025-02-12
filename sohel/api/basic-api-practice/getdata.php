<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method']) && $_POST['method'] == "getData") {
        $sql = "SELECT * FROM `user_Table`";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $array = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $array[] = $row;
                }
                $response["message"] = "Here's the data";
                $response["status"] = "200";
                $response["data"] = $array;
            } else {
                $response["message"] = "No data found";
                $response["status"] = "201";
            }
        } else {
            $response["message"] = "Query failed";
            $response["status"] = "500";
        }
    } else {
        $response["message"] = "Enter a valid method";
        $response["status"] = "202";
    }
} else {
    $response["message"] = "Only POST method is allowed";
    $response["status"] = "204";
}

echo json_encode($response);
?>
