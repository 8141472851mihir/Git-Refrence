<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method']) && $_POST['method'] === "update_data") {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            
            $stmt = $conn->prepare("SELECT * FROM `userdetails` WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                $response["message"] = "Data retrieved successfully.";
                $response["status"] = "200";
                $response["data"] = $row;
            } else {
                $response["message"] = "No data found for the given ID.";
                $response["status"] = "404";
            }

            $stmt->close();
        } else {
            $response["message"] = "Please provide an ID.";
            $response["status"] = "400";
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
