<?php

// include("connection.php");

$mysqli = new mysqli("localhost", "root", "", "Product_Inventory_Management");

if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];

    $subcategory_query = "SELECT * FROM subcategory WHERE category_id = ?";
    $stmt = $mysqli->prepare($subcategory_query);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($subcategory = $result->fetch_assoc()) {
            echo "<option value='" . $subcategory['subcategory_id'] . "'>" . $subcategory['subcategory_name'] . "</option>";
        }
    } else {
        echo "<option value=''>No subcategories found</option>";
    }
    $stmt->close();
}
