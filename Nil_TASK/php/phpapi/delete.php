<?php
include 'conn.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['method']) && $_POST['method'] === "delete_data") {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $stmt = $conn->prepare("DELETE FROM `userdetails` WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $response = [
                    "message" => "Data successfully deleted.",
                    "status" => "200"
                ];
            } else {
                $response = [
                    "message" => "Failed to delete data or ID not found.",
                    "status" => "400"
                ];
            }

            $stmt->close();
        } else {
            $response = [
                "message" => "Please provide an ID.",
                "status" => "400"
            ];
        }
    } else {
        $response = [
            "message" => "Invalid method value.",
            "status" => "400"
        ];
    }
} else {
    $response = [
        "message" => "Please use the POST method to make a request.",
        "status" => "405"
    ];
}

echo json_encode($response);
?>
