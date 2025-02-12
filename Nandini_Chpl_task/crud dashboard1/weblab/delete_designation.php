<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_designation'])) {
    $designation_id = intval($_POST['delete_designation_id']);

    if ($designation_id > 0) {
        $query = "DELETE FROM designations WHERE designation_id = $designation_id";
        
        if ($conn->query($query) === TRUE) {
            header("Location: designation.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Invalid designation ID!";
    }

    $conn->close();
}
?>
