<?php
include 'conn.php';
$response = array();  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['data']) && $_POST['data'] == "get_data") {
        $sql = "SELECT * FROM `datatable1`";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $array2 = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $array1 = array(); 
                $array1["fname"] = $row["fname"];
                $array1["lname"] = $row["lname"];
                $array1["email"] = $row["email"];
                $array1["age"] = $row["age"];
                $array1["number"] = $row["number"];
                $array1["address"] = $row["address"];
                $array1["date"] = $row["date"];
                array_push($array2, $array1);
            }
            $response["data"] = $array2;
            $response["message"] = "Data Retrieved Successfully";
            $response["status"] = "200";
        } else {
            $response["message"] = "No Data Found in Table";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Invalid Token Passed";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Only POST Method Allowed";
    $response["status"] = "201";
}

echo json_encode($response);
?>
