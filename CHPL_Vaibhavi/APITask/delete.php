<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['method']) && $_POST['method'] == 'delete_data') {
        
        if (!empty($_POST['id'])) { 
        
            $id = $_POST['id'];

            
            $sql = "SELECT * FROM userregister WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                
                $sql = "DELETE FROM userregister WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $response["message"] = "Data Deleted Successfully...";
                    $response["status"] = "200";
                } else {
                    $response["message"] = " Data Not Deleted...";
                    $response["status"] = "201";
                }
            } else {
                // If no record found with the provided id
                $response["message"] = "ID not found.";
                $response["status"] = "201";
            }
        } else {
            
            $response["message"] = "Id not found";
            $response["status"] = "201";
        }
    } else {
        $response["message"] = "Invalid Tag..";
        $response["status"] = "201";
    }
} else {
    $response["message"] = "Only Post Method Allowed...";
    $response["status"] = "201";
}

echo json_encode($response);
?>
