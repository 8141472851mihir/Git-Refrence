<?php include('dbcon.php');

$product_id = $_GET['id'];

// Fetch product details from the database
$query = "SELECT * FROM products WHERE product_id = '$product_id'";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);

// Fetch categories and brands for the dropdown options
$categories_query = "SELECT * FROM categories";
$categories_result = mysqli_query($conn, $categories_query);

$brands_query = "SELECT * FROM brands";
$brands_result = mysqli_query($conn, $brands_query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
        rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: antiquewhite;
    }

    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: rgba(154, 7, 29, 0.317);
    }

    h4 {
        font-size: 30px;
        font-weight: 600;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card-header">
            <h4 class="text-center">Edit Product Details</h4>
        </div>
        <div class="card-body">
            <form id="productForm" action="update_product.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">

                <div class="form-group mb-3 mt-3">
                    <label for="product_name" class="mb-2 fw-bolder">Product Name:</label>
                    <input type="text" name="product_name" class="form-control"
                        value="<?php echo $product['product_name']; ?>">
                        <div id="product_name_error" class="error"></div>
                </div>
                <div class="form-group mb-3 mt-3">
                    <label>Category:</label>
                    <select name="category" class="form-control" id="category" onchange="loadSubcategories(this.value)">
                        <?php while ($category = mysqli_fetch_assoc($categories_result)) { ?>
                        <option value="<?php echo $category['category_id']; ?>"
                            <?php echo ($category['category_id'] == $product['category_id']) ? 'selected' : ''; ?>>
                            <?php echo $category['category_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-3 mt-3">
                    <label>Subcategory:</label>
                    <select name="subcategory" class="form-control" id="subcategory">
                        <!-- Dynamically load subcategories -->
                        <?php
                            $subcategory_query = "SELECT * FROM subcategories WHERE category_id = '" . $product['category_id'] . "'";
                            $subcategory_result = mysqli_query($conn, $subcategory_query);
                            while ($subcategory = mysqli_fetch_assoc($subcategory_result)) {
                        ?>
                        <option value="<?php echo $subcategory['subcategory_id']; ?>"
                            <?php echo ($subcategory['subcategory_id'] == $product['subcategory_id']) ? 'selected' : ''; ?>>
                            <?php echo $subcategory['subcategory_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-3 mt-3">
                    <label>Brand Name:</label>
                    <select name="brand-name" class="form-control">
                        <?php while ($brand = mysqli_fetch_assoc($brands_result)) { ?>
                        <option value="<?php echo $brand['brand_id']; ?>"
                            <?php echo ($brand['brand_id'] == $product['brand_id']) ? 'selected' : ''; ?>>
                            <?php echo $brand['brand_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-3 mt-3">
                    <label>Price:</label>
                    <input type="number" name="price" id="price" class="form-control"
                        value="<?php echo $product['price']; ?>" oninput="calculateFinalPrice()">
                        <div id="price_error" class="error"></div>
                </div>
                <div class="form-group mb-3 mt-3">
                    <label>Stock Quantity:</label>
                    <input type="number" name="stock_quantity" class="form-control"
                        value="<?php echo $product['stock_quantity']; ?>">
                        <div id="stock_quantity_error" class="error"></div>  
                </div>
                <div class="form-group mb-3 mt-3">
                    <label>Supplier Name:</label>
                    <input type="text" name="supplier_name" class="form-control"
                        value="<?php echo $product['supplier_name']; ?>">
                        <div id="supplier_name_error" class="error"></div>  
                </div>
                <div class="form-group mb-3 mt-3">
                    <label>Purchase Date:</label>
                    <input type="text" name="purchase_date" id="purchase_date" class="form-control"
                        value="<?php echo date('d-M-Y', strtotime($product['purchase_date'])); ?>">
                        <div id="purchase_date_error" class="error"></div>  
                </div>
                <div class="form-group mb-3 mt-3">
                    <label>Discount Percentage:</label>
                    <input type="number" name="discount_percentage" id="discount_percentage" class="form-control"
                        value="<?php echo $product['discount_percentage']; ?>" oninput="calculateFinalPrice()">
                    <p id="final-price"></p>
                    <div id="discount_percentage_error" class="error"></div>  
                </div>
                <div class="form-group mb-3 mt-3">
                    <label>Final Price:</label>
                    <input type="number" name="final_price" id="final_price" class="form-control"
                        value="<?php echo $product['final_price']; ?>" readonly>
                </div>
                <div class="form-group mb-3 mt-3">
                    <label>Payment Method:</label>
                    <select name="payment_method" class="form-control">
                        <option value="Cash" <?php echo ($product['payment_method'] == 'Cash') ? 'selected' : ''; ?>>
                            Cash</option>
                        <option value="Credit Card"
                            <?php echo ($product['payment_method'] == 'Credit Card') ? 'selected' : ''; ?>>Credit Card
                        </option>
                        <option value="UPI" <?php echo ($product['payment_method'] == 'UPI') ? 'selected' : ''; ?>>UPI
                        </option>
                    </select>
                </div>
                <div class="form-group mb-3 mt-3">
                    <label>Available Colors:</label>
                    <input type="checkbox" name="available_colors[]" value="Red"
                        <?php echo (in_array('Red', explode(',', $product['available_colors']))) ? 'checked' : ''; ?>>
                    Red
                    <input type="checkbox" name="available_colors[]" value="Blue"
                        <?php echo (in_array('Blue', explode(',', $product['available_colors']))) ? 'checked' : ''; ?>>
                    Blue
                    <input type="checkbox" name="available_colors[]" value="Black"
                        <?php echo (in_array('Black', explode(',', $product['available_colors']))) ? 'checked' : ''; ?>>
                    Black
                    <input type="checkbox" name="available_colors[]" value="White"
                        <?php echo (in_array('White', explode(',', $product['available_colors']))) ? 'checked' : ''; ?>>
                    White
                    <input type="checkbox" name="available_colors[]" value="Green"
                        <?php echo (in_array('Green', explode(',', $product['available_colors']))) ? 'checked' : ''; ?>>
                    Green
                </div>
                <div class="form-group mb-3 mt-3">
                    <label>Product Image:</label>
                    <input type="file" name="product_image" class="form-control" onchange="previewImage(event)">
                    <img id="product-image-preview" src="" alt="Product Image Preview"
                        style="display: none; margin-top: 10px; max-width: 300px;">
                    <?php if ($product['product_image']) { ?>
                    <img id="existing-image" src="uploads/<?php echo $product['product_image']; ?>" width="100"
                        style="margin-top: 10px;">
                    <?php } ?>
                </div>
                <div class="form-group mb-3 mt-3">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                    <a href="data.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
    function loadSubcategories(categoryId) {
        if (categoryId === "") {
            $('#subcategory').html('<option value="">Select Subcategory</option>');
            return;
        }

        $.ajax({
            type: "POST",
            url: "fetchsubcategories.php",
            data: {
                category_id: categoryId
            },
            success: function(data) {
                $('#subcategory').html(data);
            }
        });
    }

    $(document).ready(function() {
        // Initialize date picker with format dd-MMM-yyyy
        $("#purchase_date").datepicker({
            dateFormat: "dd-M-yy",
            changeMonth: true,
            changeYear: true,
            yearRange: "1900:2025"
        });

        $('#productForm').submit(function(e) {
            var isValid = true;

            // Clear previous error messages
            $('.error').text('').hide(); // Hide previous errors on each form submission attempt

            // Validate product name
            if ($('input[name="product_name"]').val().trim() == '') {
                $('#product_name_error').text('Product Name is required').show().css('color', 'red');
                isValid = false;
            }

            // Validate price
            if ($('input[name="price"]').val().trim() == '' || isNaN($('input[name="price"]').val())) {
                $('#price_error').text('Price is required and must be a number').show().css('color',
                    'red');
                isValid = false;
            }

            // Validate stock quantity
            if ($('input[name="stock_quantity"]').val().trim() == '') {
                $('#stock_quantity_error').text('Stock Quantity is required').show().css('color',
                'red');
                isValid = false;
            }

            // Validate supplier name
            if ($('input[name="supplier_name"]').val().trim() == '') {
                $('#supplier_name_error').text('Supplier Name is required').show().css('color', 'red');
                isValid = false;
            }

            // Validate purchase date
            if ($('input[name="purchase_date"]').val().trim() == '') {
                $('#purchase_date_error').text('Purchase Date is required').show().css('color', 'red');
                isValid = false;
            }

            // Validate discount percentage
            if ($('input[name="discount_percentage"]').val().trim() == '' || isNaN($(
                    'input[name="discount_percentage"]').val())) {
                $('#discount_percentage_error').text(
                    'Discount Percentage is required and must be a number').show().css('color',
                    'red');
                isValid = false;
            }

            // If the form is not valid, prevent the form submission
            if (!isValid) {
                e.preventDefault();
            }
        });
        $('#discount_percentage').on('input', function () {
            var discount = parseFloat($(this).val());
            if (discount < 0) {
                $(this).val(0);  
            }
            calculateFinalPrice();  
        });

    });


    function calculateFinalPrice() {
        var price = parseFloat($('#price').val());
        var discount = parseFloat($('#discount_percentage').val());
        var discountAmount = (price * discount) / 100;
        var finalPrice = price - discountAmount;
        $('#final_price').val(finalPrice.toFixed(2));
    }

    function previewImage(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    const imagePreview = document.getElementById('product-image-preview');
    const existingImage = document.getElementById('existing-image');

    if (existingImage) {
        
        existingImage.style.display = 'none';
    }

   
    imagePreview.style.display = 'none'; 
    if (file) {
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block'; 
        };
        reader.readAsDataURL(file);
    } else {
        imagePreview.style.display = 'none'; 
    }
}

    </script>
</body>

</html>