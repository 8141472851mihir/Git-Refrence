<?php
include("connection.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $product_name = trim($_POST['product_name']);
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

    // **VALIDATIONS**
    $errors = [];

    // ✅ 1. Product Name Validation (Only letters, numbers, spaces allowed)
    if (!preg_match("/^[a-zA-Z0-9 ]+$/", $product_name)) {
        $errors[] = "Product name can only contain letters, numbers, and spaces.";
    }

    // ✅ 2. Category, Subcategory, Brand Dropdowns Validation (Ensure they are selected)
    if (empty($category) || empty($subcategory) || empty($brand_name)) {
        $errors[] = "Please select category, subcategory, and brand name.";
    }

    // ✅ 3. Price Validation (Should be less than 10 Lakh)
    if (!is_numeric($price) || $price >= 1000000) {
        $errors[] = "Price should be a valid number and less than ₹10,00,000.";
    }

    // ✅ 4. Image Upload Validation
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['product_image']['name'];
        $image_tmp_name = $_FILES['product_image']['tmp_name'];
        $image_size = $_FILES['product_image']['size'];
        $image_error = $_FILES['product_image']['error'];

        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
        $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

        if (!in_array($image_ext, $allowed_ext)) {
            $errors[] = "Invalid image format. Allowed formats: jpg, jpeg, png, gif.";
        }

        if ($image_size > 5 * 1024 * 1024) { // 5MB limit
            $errors[] = "Image size should not exceed 5MB.";
        }

        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // Create directory if it doesn't exist
        }

        $new_image_name = uniqid("IMG_", true) . '.' . $image_ext;
        $upload_path = $upload_dir . $new_image_name;

        if (!move_uploaded_file($image_tmp_name, $upload_path)) {
            $errors[] = "Failed to upload image.";
        }
    } else {
        $errors[] = "Please upload a product image.";
    }

    // **IF VALIDATION FAILS, SHOW ERRORS**
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>alert('$error'); window.history.back();</script>";
        }
        exit();
    }

    // **INSERT INTO DATABASE**
    $insert = "INSERT INTO products (
        product_name, category_id, subcategory_id, brand_name, price, stock_quantity, 
        supplier_name, purchase_date, discount_percentage, final_amount, 
        payment_method, available_colors, product_image
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insert);
    $stmt->bind_param(
        "ssssdisssdsss",
        $product_name,
        $category,
        $subcategory,
        $brand_name,
        $price,
        $stock_quantity,
        $supplier_Name,
        $purchase_date,
        $discount_percentage,
        $final_price,
        $payment_method,
        $available_colors,
        $upload_path // Store image path in DB
    );

    session_start(); // Start session

    if ($stmt->execute()) {
        $_SESSION['success_msg'] = "Product added successfully!";
    } else {
        $_SESSION['error_msg'] = "Error adding product: " . mysqli_error($conn);
    }

    $stmt->close();
    $conn->close();

    // Redirect to index.php
    header("Location: index.php");
    exit();
}
?>
