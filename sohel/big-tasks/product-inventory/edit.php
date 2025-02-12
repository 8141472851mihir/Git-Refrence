<?php

include("connection.php");

session_start();

$product = [];
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $get = "SELECT p.`product_name`,c.`category_name`,s.`subcategory_name`,p.`brand_name`,p.`price`,p.`stock_quantity`,p.`supplier_name`,p.`purchase_date`,p.`discount_percentage`,p.`final_amount`,p.`payment_method`,p.`available_colors`,p.`product_image`,p.`product_status` FROM `products` AS p LEFT JOIN `product_categories` AS c ON p.`category_id` = c. `id`
LEFT JOIN `product_subcategories` AS s ON p.`subcategory_id` = s.`id` WHERE p.`id` = '$id';";
    $result = mysqli_query($conn, $get);
    $product = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php

    // echo "<pre>";
    // print_r($product);
    // echo "</pre>";

    ?>
    <div id="edit" class="container w-75">
        <div class="card mt-5 mb-2 shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h3 class="text-center">Edit Product Details</h3>
                    <button class="btn btn-close" id="close-btn"><a href="index.php" class="text-decoration-none text-black text-xl">&nbsp;</a></button>
                </div>
                <form id="update-form" action="update.php" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name <span class="fw-bold text-danger">*</span></label>
                        <input type="text" value="<?= $product['product_name'] ?? '' ?>" class="form-control" name="product_name" id="productName" required>
                    </div>

                    <div class="row bg-opacity-25 bg-secondary">
                        <div class="col-6 mb-3">
                            <label for="cat" class="form-label">Category <span class="fw-bold text-danger">*</span></label>
                            <select class="form-select" name="category_id" id="cat" required>
                                <option value="">---Select Category---</option>
                                <?php
                                $category = "SELECT * FROM product_categories";
                                $result = mysqli_query($conn, $category);
                                while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <option value="<?= $row['id']; ?>" <?= ($product['category_name'] == $row['category_name']) ? 'selected' : ''; ?>>
                                        <?= $row['category_name']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>

                        </div>

                        <div class="col-6 mb-3">
                            <label for="subcat" class="form-label">Sub Category <span class="fw-bold text-danger">*</span></label>
                            <select class="form-select" name="subcategory_id" id="subcat" required>
                                <option value="">---Select Subcategory---</option>
                                <?php
                                if (!empty($product['category_name'])) {
                                    $category_id_query = "SELECT id FROM product_categories WHERE category_name = '{$product['category_name']}'";
                                    $category_result = mysqli_query($conn, $category_id_query);
                                    $category_data = mysqli_fetch_assoc($category_result);
                                    $category_id = $category_data['id'];

                                    $subcategory_query = "SELECT * FROM product_subcategories WHERE category_id = '$category_id'";
                                    $subcategory_result = mysqli_query($conn, $subcategory_query);

                                    while ($row = mysqli_fetch_assoc($subcategory_result)) {
                                        $selected = ($product['subcategory_name'] == $row['subcategory_name']) ? 'selected' : '';
                                        echo "<option value='{$row['id']}' $selected>{$row['subcategory_name']}</option>";
                                    }
                                }
                                ?>
                            </select>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mb-3">
                            <label for="brand" class="form-label">Brand Name <span class="fw-bold text-danger">*</span></label>
                            <select class="form-select" name="brand_name" id="brand" required>
                                <option>---Select Brand Name---</option>
                                <?php
                                $brands = ["Apple", "Samsung", "Nike", "Adidas", "Nestle", "Amul", "Navneet", "Oxford", "Reebok", "Panasonic", "Whirlpool", "HotWheels", "Nilkamal", "Lakme", "Nivea", "Castrol", "Bajaj"];
                                foreach ($brands as $brand) {
                                    $selected = ($product['brand_name'] == $brand) ? 'selected' : '';
                                    echo "<option value='$brand' $selected>$brand</option>";
                                }
                                ?>
                            </select>

                        </div>

                        <div class="col-4 mb-3">
                            <label for="price" class="form-label">Price <span class="fw-bold text-danger">*</span></label>
                            <input type="number" name="price" value="<?= $product['price'] ?? '' ?>" class="form-control" id="price" required>
                        </div>

                        <div class="col-4 mb-3">
                            <label for="stock" class="form-label">Stock Quantity</label>
                            <input type="number" name="stock_quantity" value="<?= $product['stock_quantity'] ?? '' ?>" class="form-control" id="stock">
                        </div>
                    </div>

                    <div class="row bg-secondary bg-opacity-25">
                        <div class="col-6 mb-3">
                            <label for="supplierName" class="form-label">Supplier Name</label>
                            <input type="text" name="supplier_name" value="<?= $product['supplier_name'] ?? '' ?>" class="form-control" id="supplierName">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="datepicker" class="form-label">Purchase Date <span class="fw-bold text-danger">*</span></label>
                            <input type="text" name="purchase_date" value="<?= $product['purchase_date'] ?? '' ?>" class="form-control" id="datepicker" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="discount" class="form-label">Discount Percentage</label>
                            <input type="text" name="discount_percentage" value="<?= $product['discount_percentage'] ?? '' ?>" class="form-control" id="discount">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="fprice" class="form-label">Final Price</label>
                            <input type="text" name="final_amount" value="<?= $product['final_amount'] ?? '' ?>" class="form-control" id="fprice">
                        </div>
                    </div>

                    <div class="row bg-secondary bg-opacity-25">
                        <?php $selected_payment = $product['payment_method'] ?? ''; ?>

                        <div class="col-2 mb-3">
                            <label for="pmethod" class="form-label">Payment Method <span class="fw-bold text-danger">*</span></label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="payment_method" value="Cash" <?= ($selected_payment == 'Cash') ? 'checked' : ''; ?>>
                                <label class="form-check-label">Cash</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="payment_method" value="Credit Card" <?= ($selected_payment == 'Credit Card') ? 'checked' : ''; ?>>
                                <label class="form-check-label">Credit Card</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="payment_method" value="UPI" <?= ($selected_payment == 'UPI') ? 'checked' : ''; ?>>
                                <label class="form-check-label">UPI</label>
                            </div>
                        </div>


                        <?php
                        $selected_colors = explode(',', $product['available_colors'] ?? ''); // Convert stored string to an array
                        $color_options = ['Red', 'Blue', 'Black', 'White', 'Green']; // Define all available colors
                        ?>

                        <div class="col-4 mb-3">
                            <label for="colors" class="form-label">Available Colors</label>
                            <?php foreach ($color_options as $color) : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="available_colors[]" value="<?= $color ?>"
                                        <?= in_array($color, $selected_colors) ? 'checked' : ''; ?>>
                                    <label class="form-check-label"><?= $color ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>


                        <div class="col-6 mb-2">
                            <label class="form-label" for="customFile">Product Image Upload <span class="fw-bold text-danger">*</span></label>

                            <!-- Display Existing Product Image -->
                            <div id="imagePreview">
                                <img src="<?= $product['product_image']; ?>" id="previewImage" width="100" height="auto" alt="Product Image">
                            </div>

                            <!-- File Input for New Image -->
                            <input type="file" class="form-control" name="product_image" id="customFile" onchange="previewSelectedImage(event)">
                        </div>
                    </div>

                    <!-- <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="product_status" value="In Stock" checked>
                            <label class="form-check-label" for="mySwitch">Product Status</label>
                        </div>
                    </div> -->

                    <button id="add-btn" type="submit" class="btn btn-success mt-4">Update Data</button>
                    <?php
                    if (isset($_SESSION['success_msg'])) {
                        echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: '{$_SESSION['success_msg']}',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            </script>";
                        unset($_SESSION['success_msg']); // Remove message after showing
                    }

                    if (isset($_SESSION['error_msg'])) {
                        echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: '{$_SESSION['error_msg']}'
                                });
                            </script>";
                        unset($_SESSION['error_msg']); // Remove error after showing
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <script>
        // function updateFileName(input) {
        //     if (input.files.length > 0) {
        //         document.getElementById('fileNameDisplay').value = input.files[0].name;
        //     }
        // }
        function previewSelectedImage(event) {
            const file = event.target.files[0];
            const previewImage = document.getElementById('previewImage');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result; // Update the image preview
                };
                reader.readAsDataURL(file);
            }
        }
        $(document).ready(function() {

            // $("#close-btn").click(function() {
            //     $("#edit").hide();
            //     // $("#add-btn").show();
            //     // $("#main").show();
            // });

            $("#cat").change(function() {
                var category_id = $(this).val(); // Get selected category ID

                $.ajax({
                    url: "fetch_subcategories.php", // PHP file to fetch subcategories
                    type: "POST",
                    data: {
                        category_id: category_id
                    }, // Send category_id to PHP
                    success: function(response) {
                        $("#subcat").html(response); // Update Subcategory Dropdown
                    }
                });
            });

            function calculateFinalPrice() {
                var price = parseFloat($("#price").val()) || 0;
                var discount = parseFloat($("#discount").val()) || 0;

                // Calculate Final Price
                var discountAmount = (price * discount) / 100;
                var finalPrice = price - discountAmount;

                // Set Final Price in Input Field
                $("#fprice").val(finalPrice.toFixed(2));
            };

            // Trigger Calculation on Price & Discount Change
            $("#price, #discount").on("input", function() {
                calculateFinalPrice();
            });
        });
    </script>


</body>

</html>