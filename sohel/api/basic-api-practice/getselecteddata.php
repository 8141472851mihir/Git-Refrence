<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method']) && $_POST['method'] == "getSelecteddata") {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];

            $stmt = $conn->prepare("SELECT * FROM `user_Table` WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $response["message"] = "Here's the data";
                $response["status"] = "200";
                $response["data"] = $row;
            } else {
                $response["message"] = "Data not found";
                $response["status"] = "201";
            }

            $stmt->close(); // Close statement
        } else {
            $response["message"] = "ID is required";
            $response["status"] = "202";
        }
    } else {
        $response["message"] = "Enter a valid method";
        $response["status"] = "203";
    }
} else {
    $response["message"] = "Only POST method is allowed";
    $response["status"] = "204";
}

echo json_encode($response);
?>
