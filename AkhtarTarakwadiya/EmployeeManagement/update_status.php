<?php
include 'database/connection.php';

if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = intval($_POST['id']);
    $status = ($_POST['status'] === "true") ? 'Active' : 'Deactivated';

    $stmt = $conn->prepare("UPDATE employee_details SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "new_status" => $status]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }

    $stmt->close();
}
$conn->close();
?>
