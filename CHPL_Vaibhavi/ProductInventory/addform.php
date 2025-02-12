<?php
include_once('dbcon.php');  // Including the DB connection file
// Fetch categories from the database only if the connection is successful
// $query = "SELECT * FROM categories";
// $categories = mysqli_query($conn, $query);

// if (!$categories) {
//     die('Error fetching categories: ' . mysqli_error($conn));
// }
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

    .error {
        color: red;
        font-size: 12px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h4 class="text-center mb-4">Product Inventory Management</h4>
        <form action="code.php" id="product_form" enctype="multipart/form-data" Method="post">
            <div class="form-group mb-3 mt-3">
                <label for="product_name" class="mb-2 fw-bolder">Product Name :</label>
                <input type="text" id="product_name" class="form-control" name="product_name">
                <span id="product_name_error" class="error"></span>
            </div>
            <div class="form-group mb-3 mt-3">
                <label for="category" class="mb-2 fw-bolder">Category :</label>
                <select id="category" name="category" class="form-control form-select"
                    onchange="loadSubcategories(this.value)">
                    <option value="">Select Category</option>
                    <?php
                    // Fetch categories from the database
                    $query = "SELECT * FROM categories";
                    $categories = mysqli_query($conn, $query);
                    while ($category = mysqli_fetch_assoc($categories)) {
                        echo '<option value="' . $category['category_id'] . '">' . $category['category_name'] . '</option>';
                    }
                    ?>
                </select>
                <span id="category_error" class="error"></span>
            </div>

            <div class="form-group mb-3 mt-3">
                <label for="subcategory" class="mb-2 fw-bolder">Subcategory :</label>
                <select id="subcategory" name="subcategory" class="form-control form-select">
                    <!-- Dynamically loaded using AJAX -->
                </select>
            </div>
            <div class="form-group mb-3 mt-3">
                <label for="brand-name" class="mb-2 fw-bolder">Brand Name :</label>
                <select id="brand-name" name="brand-name" class="form-control form-select">
                    <option value="">Select Brand</option>
                    <?php
                    $query = "SELECT * FROM brands";
                    $brands = mysqli_query($conn, $query);
                    while ($brand = mysqli_fetch_assoc($brands)) {
                        echo '<option value="' . $brand['brand_id'] . '">' . $brand['brand_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group mb-3 mt-3">
                <label for="price" class="mb-2 fw-bolder">Price :</label>
                <input type="number" id="price" name="price" class="form-control" min="0">
                <span id="price_error" class="error"></span>
            </div>
            <div class="form-group mb-3 mt-3">
                <label for="stock_quantity" class="mb-2 fw-bolder">Stock Quantity :</label>
                <input type="number" id="stock_quantity" name="stock_quantity" class="form-control" min="0">
                <span id="stock_quantity_error" class="error"></span>
            </div>

            <div class="form-group mb-3 mt-3">
                <label for="supplier_name" class="mb-2 fw-bolder">Supplier Name :</label>
                <input type="text" id="supplier_name" name="supplier_name" class="form-control">
                <span id="supplier_name_error" class="error"></span>
            </div>
            <div class="form-group mb-3 mt-3">
                <label for="purchase_date" class="mb-2 fw-bolder">Purchase Date :</label>
                <input type="text" id="purchase_date" name="purchase_date" class="form-control datepicker">
                <span id="purchase_date_error" class="error"></span>
            </div>
            <div class="form-group mb-3 mt-3">
                <label for="discount_percentage" class="mb-2 fw-bolder">Discount Percentage :</label>
                <input type="number" id="discount_percentage" name="discount_percentage" class="form-control"
                    oninput="calculateFinalPrice()" min="0" max="100">
                <p id="final-price"></p>
                <span id="discount_percentage_error" class="error"></span>
            </div>
            <div class="form-group mb-3 mt-3">
                <label for="final_price" class="mb-2 fw-bolder">Final Price :</label>
                <input type="text" id="final_price" name="final_price" class="form-control" readyonly>
            </div>
            <div class="form-group mb-3 mt-3">
                <label for="payment_method" class="mb-2 fw-bolder">Payment Method :</label>
                <div id="payment_method">
                    <input type="radio" id="cash" name="payment_method" value="Cash">
                    <label for="cash">Cash</label>
                    <input type="radio" id="credit-card" name="payment_method" value="Credit Card">
                    <label for="credit-card">Credit Card</label>
                    <input type="radio" id="upi" name="payment_method" value="UPI">
                    <label for="upi">UPI</label>
                </div>
                <span id="payment_method_error" class="error"></span>
            </div>
            <div class="form-group mb-3 mt-3">
                <label for="available_colors" class="mb-2 fw-bolder">Available Colors :</label>
                <div id="available_colors">
                    <input type="checkbox" id="red" name="available_colors[]" value="Red">
                    <label for="red">Red</label>
                    <input type="checkbox" id="blue" name="available_colors[]" value="Blue">
                    <label for="blue">Blue</label>
                    <input type="checkbox" id="black" name="available_colors[]" value="Black">
                    <label for="black">Black</label>
                    <input type="checkbox" id="white" name="available_colors[]" value="White">
                    <label for="white">White</label>
                    <input type="checkbox" id="green" name="available_colors[]" value="Green">
                    <label for="green">Green</label>
                </div>
            </div>
            <div class="form-group mb-3 mt-3">
                <label for="product_image" class="mb-2 fw-bolder">Product Image :</label>
                <input type="file" id="product_image" name="product_image" class="form-control"
                    onchange="previewImage(event)" accept="image/*">
                <img id="product-image-preview" src="" alt="Product Image Preview"
                    style="display: none; margin-top: 10px; max-width: 300px;">
                <span id="product_image_error" class="error"></span>
            </div>
            <button type="submit" class="btn btn-primary" name="save">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
            <a href="data.php" class="btn btn-danger">Cancel</a>
        </form>
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

        $("#purchase_date").datepicker({
            dateFormat:"yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: "1900:2025"
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
        const file = event.target.files[0]; // Get the selected file
        const reader = new FileReader(); // Create a FileReader object

        reader.onload = function(e) {
            const imagePreview = document.getElementById('product-image-preview');
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
    $('#product_form').submit(function(e) {
        var isValid = true;
        $('.error').text(''); // Reset all error messages

        // Reset the red text style for all fields before validation
        $('.form-group').removeClass('has-error');

        // Validate Product Name
        if ($('#product_name').val().trim() === "") {
            $('#product_name_error').text("Product Name is required");
            $('#product_name').closest('.form-group').addClass('has-error'); // Add red color for error field
            isValid = false;
        }

        // Validate Category
        if ($('#category').val() === "") {
            $('#category_error').text("Category is required");
            $('#category').closest('.form-group').addClass('has-error');
            isValid = false;
        }

        // Validate Price
        // Validate Price
        var price = $('#price').val().trim();
        if (price === "" || isNaN(price) || parseFloat(price) <= 0) {
            $('#price_error').text("Please enter a valid price greater than 0");
            $('#price').closest('.form-group').addClass('has-error'); // Add red color for error field
            isValid = false;
        }


        // Validate Stock Quantity
        var stockQuantity = $('#stock_quantity').val().trim();
        if (stockQuantity === "" || isNaN(stockQuantity) || parseFloat(stockQuantity) < 0) {
            $('#stock_quantity_error').text("Please enter a valid stock quantity");
            $('#stock_quantity').closest('.form-group').addClass('has-error'); // Add red color for error field
            isValid = false;
        }



        // Validate Discount Percentage
        var discount = parseFloat($('#discount_percentage').val());
        if (isNaN(discount) || discount < 0 || discount > 100) {
            $('#discount_percentage_error').text("Discount percentage must be between 0 and 100");
            $('#discount_percentage').closest('.form-group').addClass(
                'has-error');
            isValid = false;
        }

        // Validate Supplier Name
        if ($('#supplier_name').val().trim() === "") {
            $('#supplier_name_error').text("Supplier Name is required");
            $('#supplier_name').closest('.form-group').addClass('has-error'); // Add red color for error field
            isValid = false;
        }

        // Validate Purchase Date
        if ($('#purchase_date').val().trim() === "") {
            $('#purchase_date_error').text("Purchase Date is required");
            $('#purchase_date').closest('.form-group').addClass('has-error'); // Add red color for error field
            isValid = false;
        }

        // Validate Payment Method (Radio buttons)
        if (!$('input[name="payment_method"]:checked').val()) {
            $('#payment_method_error').text("Please select a payment method");
            $('#payment_method').closest('.form-group').addClass('has-error'); // Add red color for error field
            isValid = false;
        }

        // Validate Product Image (ensure it's selected)
        if ($('#product_image').get(0).files.length === 0) {
            $('#product_image_error').text("Please upload a product image");
            $('#product_image').closest('.form-group').addClass('has-error'); // Add red color for error field
            isValid = false;
        }

        if (!isValid) {
            // alert("Please fill all required fields");
            e.preventDefault(); // Prevent form submission if invalid
        }
    });


    $('#discount_percentage').on('input', function() {
        var discount = parseFloat($(this).val());
        if (discount < 0) {
            $(this).val(0);
        }
        calculateFinalPrice();
    });

    // Discount input field change handler to ensure no negative values
    $('#discount_percentage').on('input', function() {
        var discount = parseFloat($(this).val());
        if (discount < 0) {
            $(this).val(0); // Set value to 0 if negative
        }
        calculateFinalPrice(); // Recalculate final price
    });
    

    

    

    </script>
</body>

</html>