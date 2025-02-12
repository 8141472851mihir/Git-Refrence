<?php
include_once("conf.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subcategory_id = $_POST['subcategory_id'];
    $subcategory_name = $_POST['subcategory_name'];
    $category_id = $_POST['category_id'];

    // Update query
    $sql = "UPDATE subcategorymaster SET subcategory_name = ?, category_id = ? WHERE subcategory_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $subcategory_name, $category_id, $subcategory_id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
