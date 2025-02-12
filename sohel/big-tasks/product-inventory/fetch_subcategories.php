<?php

include("connection.php");

if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id']; // Get category_id from AJAX request

    // Fetch subcategories based on selected category_id
    $query = "SELECT * FROM product_subcategories WHERE category_id = $category_id";
    $result = mysqli_query($conn, $query);

    echo '<option value="">---Select Subcategory---</option>'; // Default option

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row['id'].'">'.$row['subcategory_name'].'</option>';
    }
}
?>
