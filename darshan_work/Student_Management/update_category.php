<?php
include 'connection.php';

if (isset($_POST['id']) && isset($_POST['category_name'])) {
    $categoryId = $_POST['id'];
    $categoryName = $_POST['category_name'];

    $query = "UPDATE categories SET category_name = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $categoryName, $categoryId);

    if ($stmt->execute()) {
        echo "Category updated successfully!";
    } else {
        echo "Failed to update category.";
    }

    $stmt->close();
}
?>
