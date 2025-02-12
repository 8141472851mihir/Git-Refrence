<?php
include 'conn.php'; 

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM employee_details WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
