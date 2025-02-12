<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['method']) && $_POST['method'] == "update_data") {
        
        $sql = "SELECT * FROM `userdetails`";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = array();

            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }

            $response = [
                "message" => "Data retrieved successfully.",
                "status" => "200",
                "data" => $data
            ];
        } else {
            $response = [
                "message" => "No data found in the table.",
                "status" => "201"
            ];
        }
    } else {
        $response = [
            "message" => "Invalid method value.",
            "status" => "201"
        ];
    }
} else {
    $response = [
        "message" => "Please use the POST method to make a request.",
        "status" => "201"
    ];
}

echo json_encode($response);
?>
