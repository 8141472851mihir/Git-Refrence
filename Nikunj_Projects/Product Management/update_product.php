<?php

// include("connection.php"); 

$mysqli = new mysqli("localhost", "root", "", "Product_Inventory_Management");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['product_id']) && is_numeric($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $subcategory_id = $_POST['subcategory_id'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $supplier_name = $_POST['supplier_name'];
    $discount_percentage = $_POST['discount_percentage'];
    $final_price = $_POST['final_price'];

    if (isset($_POST['available_colors']) && is_array($_POST['available_colors'])) {
        $available_colors = implode(',', $_POST['available_colors']); // Convert array to comma-separated string
    } else {
        $available_colors = '';
    }

    $product_status = isset($_POST['product_status']) ? $_POST['product_status'] : 'out_of_stock'; // Default to 'out_of_stock' if not set

    $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
    $purchase_date = isset($_POST['purchase_date']) ? $_POST['purchase_date'] : '';

    $query = "UPDATE products 
              SET product_name = ?, category_id = ?, subcategory_id = ?, price = ?, stock_quantity = ?, supplier_name = ?, discount_percentage = ?, final_price = ?, available_colors = ?, product_status = ?, payment_method = ?, purchase_date = ?
              WHERE product_id = ?";

    // Prepare statement
    $stmt = $mysqli->prepare($query);

    // Bind parameters
    $stmt->bind_param("siisdsdsssssi", $product_name, $category_id, $subcategory_id, $price, $stock_quantity, $supplier_name, $discount_percentage, $final_price, $available_colors, $product_status, $payment_method, $purchase_date, $product_id);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: index.php?msg=Product updated successfully");
    } else {
        echo "Error updating product: " . $mysqli->error;
    }

    $stmt->close();
} else {
    die("Invalid Product ID");
}

$mysqli->close();
