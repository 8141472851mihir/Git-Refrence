<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['data'])) {
        if ($_POST['data'] == "get_data") {  
            $sql = "SELECT * FROM `datatable1`";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                $response["data"] = array(); 
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $response["data"][] = array(   
                        "fname"   => $row["fname"],
                        "lname"   => $row["lname"],
                        "email"   => $row["email"],
                        "age"     => $row["age"],
                        "number"  => $row["number"],
                        "address" => $row["address"],
                        "date"    => $row["date"]
                    );
                }
                $response["message"] = "All Data Retrieved Successfully...";
                $response["status"] = "200";
            } else {
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
    $response["message"] = "Only POST Method Allowed...";
    $response["status"] = "201";
}

echo json_encode($response);
?>
