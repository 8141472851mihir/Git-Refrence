<?php
include('dbcon.php');

// Get product ID and status from AJAX request
$productId = $_POST['product_id'];
$status = $_POST['status'];

// Update product status in database
$sql = "UPDATE products SET product_status = '$status' WHERE product_id = '$productId'";
if (mysqli_query($conn, $sql)) {
    echo "Product status updated successfully!";
} else {
    echo "Error updating product status: " . mysqli_error($conn);
}

mysqli_close($conn);
?>