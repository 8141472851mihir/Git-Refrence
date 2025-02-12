<?php
include 'conn.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['data']) && $_POST['data'] === "delete") {
        if (isset($_POST['id'])) {
            $id = intval($_POST['id']); 

            $sql = "DELETE FROM `datatable1` WHERE id = $id";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                
                if (mysqli_affected_rows($conn) > 0) {
                    $response["message"] = "Data deleted successfully";
                    $response["status"] = "200";
                } else {
                    $response["message"] = "ID not found";
                    $response["status"] = "201";
                }
            } else {
                $response["message"] = "Error: Data not deleted.";
                $response["status"] = "201"; 
            }
        } else {
            $response["message"] = "ID not provided";
            $response["status"] = "201"; 
        }
    } else {
        $response["message"] = "Invalid token provided";
        $response["status"] = "201"; 
    }
} else {
    $response["message"] = "Only POST method is allowed";
    $response["status"] = "201"; 
}

echo json_encode($response);
?>
