<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connect.php");

$id = $_GET['UpdateID'];

$sql = "SELECT * FROM product WHERE id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "Product not found!";
    exit;
}

$product_name = $row['product_name'];
$category = $row['category'];
$subcategory = $row['subcategory'];
$brand_name = $row['brand_name'];
$price = $row['price'];
$discount = $row['discount'];
$final_price = $row['final_price'];
$stock_quantity = $row['stock_quantity'];
$supplier_name = $row['supplier_name'];
$purchase_date = $row['purchase_date'];
$payment_method = $row['payment_method'];
$color = $row['colors'];
$product_image = $row['product_image'];
$product_status = $row['product_status'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $brand_name = $_POST['brand_name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $final_price = $_POST['final_price'];
    $stock_quantity = $_POST['stock_quantity'];
    $supplier_name = $_POST['supplier_name'];
    $purchase_date = $_POST['purchase_date'];
    $payment_method = $_POST['payment_method'];

    $color = isset($_POST['color']) ? implode(',', $_POST['color']) : '';

    $new_product_image = $product_image;
    if (!empty($_FILES['product_image']['name'])) {
        $img_name = time() . "_" . basename($_FILES['product_image']['name']);
        $img_tmp = $_FILES['product_image']['tmp_name'];
        $img_folder = "./uploads/" . $img_name;

        if (move_uploaded_file($img_tmp, $img_folder)) {
            $new_product_image = $img_name;
        }
    }

    $product_status = isset($_POST['product_status']) ? 1 : 0;

    $update_sql = "UPDATE product 
                SET product_name = ?, category = ?, subcategory = ?, brand_name = ?, price = ?, discount = ?, 
                    final_price = ?, stock_quantity = ?, supplier_name = ?, purchase_date = ?, payment_method = ?, 
                    colors = ?, product_image = ?, product_status = ? 
                WHERE id = ?";

    $stmt = mysqli_prepare($con, $update_sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssdddisssssii",
        $product_name,
        $category,
        $subcategory,
        $brand_name,
        $price,
        $discount,
        $final_price,
        $stock_quantity,
        $supplier_name,
        $purchase_date,
        $payment_method,
        $color,
        $new_product_image,
        $product_status,
        $id
    );


    if (mysqli_stmt_execute($stmt)) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Product updated successfully!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        header("Location: data_add_display.php");
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Error updating product!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4>Update Product</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="product_name" class="form-control"
                                value="<?php echo $product_name; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <input type="text" name="category" class="form-control" value="<?php echo $category; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Subcategory</label>
                            <input type="text" name="subcategory" class="form-control"
                                value="<?php echo $subcategory; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Brand Name</label>
                            <input type="text" name="brand_name" class="form-control"
                                value="<?php echo $brand_name; ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Price (₹)</label>
                            <input type="number" name="price" class="form-control" value="<?php echo $price; ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Discount (%)</label>
                            <input type="number" name="discount" class="form-control" value="<?php echo $discount; ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Final Price (₹)</label>
                            <input type="text" name="final_price" class="form-control"
                                value="<?php echo $final_price; ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Stock Quantity</label>
                            <input type="number" name="stock_quantity" class="form-control"
                                value="<?php echo $stock_quantity; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Supplier Name</label>
                            <input type="text" name="supplier_name" class="form-control"
                                value="<?php echo $supplier_name; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Purchase Date</label>
                            <input type="date" name="purchase_date" class="form-control"
                                value="<?php echo $purchase_date; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Payment Method</label>
                            <input type="text" name="payment_method" class="form-control"
                                value="<?php echo $payment_method; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Available Colors</label>
                            <div>
                                <?php
                                $selected_colors = explode(',', $color);
                                ?>
                                <input type="checkbox" name="color[]" value="Red" <?php echo in_array("Red", $selected_colors) ? "checked" : ""; ?>> Red
                                <input type="checkbox" name="color[]" value="Blue" <?php echo in_array("Blue", $selected_colors) ? "checked" : ""; ?>> Blue
                                <input type="checkbox" name="color[]" value="Black" <?php echo in_array("Black", $selected_colors) ? "checked" : ""; ?>> Black
                                <input type="checkbox" name="color[]" value="White" <?php echo in_array("White", $selected_colors) ? "checked" : ""; ?>> White
                                <input type="checkbox" name="color[]" value="Green" <?php echo in_array("Green", $selected_colors) ? "checked" : ""; ?>> Green
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Product Image</label>
                            <input type="file" name="product_image" class="form-control">
                            <?php if ($product_image): ?>
                                <img src="./uploads/<?php echo $product_image; ?>" width="100" height="100"
                                    alt="Product Image">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Product Status</label>
                            <input type="checkbox" name="product_status" <?= ($product_status == 1) ? 'checked' : '' ?>>
                            <label>In Stock</label>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>