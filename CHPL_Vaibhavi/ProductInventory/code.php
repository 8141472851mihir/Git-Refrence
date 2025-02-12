<?php
include_once('dbcon.php'); 

// Insert Product
if (isset($_POST['save'])) {
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

    $product_image = $_FILES['product_image']['name'];
    $path = "uploads/".$product_image;
    $tmp_file=$_FILES['product_image']['tmp_name'];
    move_uploaded_file($tmp_file,$path);

    // insert new product
    $query = "INSERT INTO products 
                (product_name, category_id, subcategory_id, brand_id, price, stock_quantity, supplier_name, 
                purchase_date, discount_percentage, final_price, payment_method, available_colors, product_image)
                VALUES ('$product_name', '$category', '$subcategory', '$brand_name', '$price', '$stock_quantity', 
                '$supplier_name', '$purchase_date', '$discount_percentage', '$final_price', '$payment_method', 
                '$available_colors', '$product_image')";
    
    if (mysqli_query($conn, $query)) {
        
        echo "<script>
        alert('Data Added Successfully!');
        window.location='data.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


// delete product

if (isset($_GET['delete_product'])) {
    $product_id = $_GET['delete_product'];

    // image to unlink

    $query = "SELECT product_image FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $product_image = $row['product_image'];

    // Delete product image file 

    if ($product_image && file_exists("uploads/" . $product_image)) {
        unlink("uploads/" . $product_image);
    }

    // Delete the product 
    $query = "DELETE FROM products WHERE product_id = '$product_id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>
        alert('Data Deleted Successfully!');
        window.location='data.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
