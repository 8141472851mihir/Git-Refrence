<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method']) && $_POST['method'] === "update_data") {
        
        $sql = "SELECT * FROM `userdetails`";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $data = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $user["name"] = $row["name"];
                $user["email"] = $row["email"];
                $user["phone_no"] = $row["phone_no"];
                array_push($data, $user);
            }

            $response["message"] = "Data retrieved successfully.";
            $response["status"] = "200";
            $response["data"] = $data;
        } else {
            $response["message"] = "No data found in the table.";
            $response["status"] = "404";
        }

    } else {
        $response["message"] = "Invalid method value.";
        $response["status"] = "400";
    }
} else {
    $response["message"] = "Please use the POST method to make a request.";
    $response["status"] = "405";
}

echo json_encode($response);
?>
