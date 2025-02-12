<?php
include 'connection.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Print received data
    error_log("Received Data: " . print_r($_POST, true)); 

    // Fetch and validate data
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $new_status = isset($_POST['status']) ? trim($_POST['status']) : '';

    if ($product_id == 0 || empty($new_status)) {
        echo "Invalid input data: Product ID = $product_id, Status = $new_status";
        exit();
    }

    // Use prepared statements
    $sql = "UPDATE products SET product_status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $new_status, $product_id);
        $execute = mysqli_stmt_execute($stmt);

        if ($execute) {
            echo "Success";
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "SQL Prepare failed: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method";
}

?>
