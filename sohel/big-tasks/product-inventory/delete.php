<?php
include("connection.php"); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; // Get product ID

    // Delete query
    $delete_query = "DELETE FROM products WHERE id = $id";

    if (mysqli_query($conn, $delete_query)) {
        echo "Product deleted successfully!";
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
