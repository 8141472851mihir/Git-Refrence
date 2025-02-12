<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connect.php");

if (isset($_POST['submit'])) {

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

    $product_image = "";
    if (!empty($_FILES['product_image']['name'])) {
        $img_name = time() . "_" . basename($_FILES['product_image']['name']);
        $img_tmp = $_FILES['product_image']['tmp_name'];
        $img_folder = "./uploads/" . $img_name;

        if (move_uploaded_file($img_tmp, $img_folder)) {
            $product_image = $img_name;
        }
    }

    $product_status = isset($_POST['product_status']) ? 1 : 0;

    $sql = "INSERT INTO product (product_name, category, subcategory, brand_name, price, discount, final_price, stock_quantity, supplier_name, purchase_date, payment_method, colors, product_image, product_status) 
        VALUES ('$product_name', '$category', '$subcategory', '$brand_name', '$price', '$discount', '$final_price', '$stock_quantity', '$supplier_name', '$purchase_date', '$payment_method', '$color', '$product_image', '$product_status')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    Product inserted successfully!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Error inserting product!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
    }


}
$query = "SELECT * FROM product";
$products = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Inventory</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
       $(document).ready(function(){
        $("#demo").DataTable();
       })
    </script>
</head>

<body class="container-fluid mt-4">

    <h2 class="text-center mb-4">Product Inventory</h2>

    <table class="table table-bordered table-striped" id='demo'>
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Sub Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Final Price</th>
                <th>Stock</th>
                <th>Supplier</th>
                <th>Purchase Date</th>
                <th>Payment</th>
                <th>Colors</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($products)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['subcategory']; ?></td>
                    <td><?php echo $row['brand_name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['discount']; ?>%</td>
                    <td><?php echo $row['final_price']; ?></td>
                    <td><?php echo $row['stock_quantity']; ?></td>
                    <td><?php echo $row['supplier_name']; ?></td>
                    <td><?php echo $row['purchase_date']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td><?php echo str_replace(',', ', ', $row['colors']); ?></td>
                    <td>
                        <?php if (!empty($row['product_image'])) { ?>
                            <img src="./uploads/<?php echo $row['product_image']; ?>" width="50" height="50"
                                alt="Product Image">
                        <?php } else {
                            echo "No Image";
                        } ?>
                    </td>
                    <td><?php echo $row['product_status'] ? 'In Stock' : 'Out of Stock'; ?></td>
                    <td>
                        <button class="btn btn-primary"><a href="update.php?UpdateID=<?php echo $row['id']; ?>"
                                class="text-light text-decoration-none">Update</a></button>
                        <button class="btn btn-danger"><a href="delete.php?DeleteID=<?php echo $row['id']; ?>"
                                class="text-light text-decoration-none">Delete</a></button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>