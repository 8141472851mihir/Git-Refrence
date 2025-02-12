<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category_id'];
    $subcategory = $_POST['subcategory_id'];
    $brand_name = $_POST['brand_name'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $supplier_Name = $_POST['supplier_name'];
    $purchase_date = date('Y-m-d', strtotime($_POST['purchase_date']));
    $discount_percentage = $_POST['discount_percentage'];
    $final_price = $_POST['final_amount'];
    $payment_method = $_POST['payment_method'];
    $available_colors = isset($_POST['available_colors']) ? implode(',', $_POST['available_colors']) : '';

    // Fetch old image path
    $old_image_query = "SELECT product_image FROM products WHERE id = '$id'";
    $old_image_result = mysqli_query($conn, $old_image_query);
    $old_image_data = mysqli_fetch_assoc($old_image_result);
    $old_image_path = $old_image_data['product_image'];

    // Handle Image Upload
    if (!empty($_FILES['product_image']['name'])) {
        $image_name = $_FILES['product_image']['name'];
        $image_tmp = $_FILES['product_image']['tmp_name'];
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array(strtolower($image_ext), $allowed_extensions)) {
            $upload_dir = "uploads/"; // Directory to store images
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true); // Create directory if not exists
            }

            $new_image_name = uniqid("product_", true) . "." . $image_ext;
            $image_path = $upload_dir . $new_image_name;

            if (move_uploaded_file($image_tmp, $image_path)) {
                // Delete old image if exists
                if (!empty($old_image_path) && file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            } else {
                $_SESSION['error_msg'] = "Error uploading new image.";
                header("Location: index.php");
                exit();
            }
        } else {
            $_SESSION['error_msg'] = "Invalid image format. Allowed: JPG, JPEG, PNG, GIF.";
            header("Location: index.php");
            exit();
        }
    } else {
        // If no new image is uploaded, retain the old image path
        $image_path = $old_image_path;
    }

    // Update query
    $update_query = "UPDATE `products` SET 
        product_name = '$product_name',
        category_id = '$category',
        subcategory_id = '$subcategory',
        brand_name = '$brand_name',
        price = '$price',
        stock_quantity = '$stock_quantity',
        supplier_name = '$supplier_Name',
        purchase_date = '$purchase_date',
        discount_percentage = '$discount_percentage',
        final_amount = '$final_price',
        payment_method = '$payment_method',
        available_colors = '$available_colors',
        product_image = '$image_path'
        WHERE id = '$id'";

    if (mysqli_query($conn, $update_query)) {
        $_SESSION['success_msg'] = "Product updated successfully!";
    } else {
        $_SESSION['error_msg'] = "Error updating product: " . mysqli_error($conn);
    }

    header("Location: index.php");
    exit();
}

// Close connection
mysqli_close($conn);
