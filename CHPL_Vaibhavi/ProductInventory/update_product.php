
<?php include('dbcon.php');
// Update Product
if (isset($_POST['product_name'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $brand_name = $_POST['brand-name'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $supplier_name = $_POST['supplier_name'];
    $purchase_date = $_POST['purchase_date'];
    $discount_percentage = $_POST['discount_percentage'];
    $final_price = $_POST['final_price'];
    $payment_method = $_POST['payment_method'];
    $available_colors = implode(',', $_POST['available_colors']);


    //  fetch old image
    $query = "SELECT product_image FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $old_image = $row['product_image'];

    // Check if new image is uploaded
    if ($_FILES['product_image']['name']) {
        $product_image = $_FILES['product_image']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($product_image);

        // If old image exists, delete it
        if ($old_image && file_exists($target_dir . $old_image)) {
            unlink($target_dir . $old_image);
        }

        // Move new image to target folder
        move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
    } else {
        
        $product_image = $old_image;
    }

    // Update product data 
    $query = "UPDATE products SET 
                product_name = '$product_name',
                category_id = '$category',
                subcategory_id = '$subcategory',
                brand_id = '$brand_name',
                price = '$price',
                stock_quantity = '$stock_quantity',
                supplier_name = '$supplier_name',
                purchase_date = '$purchase_date',
                discount_percentage = '$discount_percentage',
                final_price = '$final_price',
                payment_method = '$payment_method',
                available_colors = '$available_colors',
                product_image = '$product_image' 
                WHERE product_id = '$product_id'";

    if (mysqli_query($conn, $query)) {
        // Move the uploaded image to the target folder
        move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
        echo "<script>
        alert('Data updated Successfully!');
        window.location='data.php';
        </script>";
    
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>