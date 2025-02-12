<?php
// index.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Product_Inventory_Management";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if (!$mysqli) {
    die("connection failed " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
    </link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>

    <!-- jQuery Validation CDN -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>
        #product-form {
            display: none;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#add-btn').click(function() {
                $('#table-containt').hide();
                $('#add-btn').hide();
                $('#product-form').show();
            });

            $("#submit-btn").click(function() {
                $("#product-form").hide();
                $("#table-containt").show();
            });
        });


        $(document).ready(function() {
            $('#table').DataTable();
        });



        // TOGGLE SWITCH BUTTON

        $(document).ready(function() {
            // Initial setup: Ensure label starts as "In Stock"
            if ($("#mySwitch").prop("checked")) {
                $(".form-check-label-switch").text("Product Status: In Stock");
            } else {
                $(".form-check-label-switch").text("Product Status: Out of Stock");
            }

            // When the switch is toggled
            $("#mySwitch").change(function() {
                if ($(this).prop("checked")) {
                    $(".form-check-label-switch").text("Product Status: In Stock");
                    $(this).val("in_stock"); // Ensure the correct value is passed for 'In Stock'
                } else {
                    $(".form-check-label-switch").text("Product Status: Out of Stock");
                    $(this).val("out_of_stock"); // Ensure the correct value is passed for 'Out of Stock'
                }
            });
        });








        // VALIDATION


        $(document).ready(function() {
            // Disable submit button initially
            $("#submit-btn").prop("disabled", true);

            // Check if all fields are valid
            function validateForm() {
                let isValid = true;

                // Validate Product Name
                if ($("#pname").val().trim() === "") {
                    $("#pname").next(".error").remove();
                    $("#pname").after("<span class='error'>Product Name is required</span>");
                    isValid = false;
                } else {
                    $("#pname").next(".error").remove();
                }

                // Validate Category
                if ($("#category").val() === "") {
                    $("#category").next(".error").remove();
                    $("#category").after("<span class='error'>Category is required</span>");
                    isValid = false;
                } else {
                    $("#category").next(".error").remove();
                }

                // Validate Subcategory (must be selected after category)
                if ($("#category").val() !== "" && $("#subcategory").val() === "") {
                    $("#subcategory").next(".error").remove();
                    $("#subcategory").after("<span class='error'>Subcategory is required</span>");
                    isValid = false;
                } else {
                    $("#subcategory").next(".error").remove();
                }

                // Validate Brand Name
                if ($("#brandname").val() === "") {
                    $("#brandname").next(".error").remove();
                    $("#brandname").after("<span class='error'>Brand Name is required</span>");
                    isValid = false;
                } else {
                    $("#brandname").next(".error").remove();
                }

                // Validate Price
                if ($("#price").val().trim() === "" || isNaN($("#price").val()) || parseFloat($("#price").val()) <= 0) {
                    $("#price").next(".error").remove();
                    $("#price").after("<span class='error'>Price must be a valid positive number</span>");
                    isValid = false;
                } else {
                    $("#price").next(".error").remove();
                }

                // Validate Stock Quantity
                if ($("#stock").val().trim() === "" || isNaN($("#stock").val()) || parseInt($("#stock").val()) <= 0) {
                    $("#stock").next(".error").remove();
                    $("#stock").after("<span class='error'>Stock Quantity must be a valid positive number</span>");
                    isValid = false;
                } else {
                    $("#stock").next(".error").remove();
                }

                // Validate Supplier Name
                if ($("#suppliername").val().trim() === "") {
                    $("#suppliername").next(".error").remove();
                    $("#suppliername").after("<span class='error'>Supplier Name is required</span>");
                    isValid = false;
                } else {
                    $("#suppliername").next(".error").remove();
                }

                // Validate Purchase Date
                if ($("#purchasedate").val() === "") {
                    $("#purchasedate").next(".error").remove();
                    $("#purchasedate").after("<span class='error'>Purchase Date is required</span>");
                    isValid = false;
                } else {
                    $("#purchasedate").next(".error").remove();
                }

                // Validate Discount Percentage
                if ($("#discount").val().trim() === "" || isNaN($("#discount").val()) || parseFloat($("#discount").val()) < 0 || parseFloat($("#discount").val()) > 100) {
                    $("#discount").next(".error").remove();
                    $("#discount").after("<span class='error'>Discount Percentage must be a valid number between 0 and 100</span>");
                    isValid = false;
                } else {
                    $("#discount").next(".error").remove();
                }

                // Validate Payment Method
                if (!$("input[name='payment_method']:checked").length) {
                    $("input[name='payment_method']").after("<span class='error'>Payment Method is required</span>");
                    isValid = false;
                } else {
                    $("input[name='payment_method']").next(".error").remove();
                }

                // Validate Final Price
                if ($("#finalprice").val().trim() === "" || isNaN($("#finalprice").val()) || parseFloat($("#finalprice").val()) <= 0) {
                    $("#finalprice").next(".error").remove();
                    $("#finalprice").after("<span class='error'>Final Price must be a valid positive number</span>");
                    isValid = false;
                } else {
                    $("#finalprice").next(".error").remove();
                }

                // Validate Available Colors
                if ($("input[name='available_colors[]']:checked").length === 0) {
                    // Check if the error message already exists to prevent duplicates
                    if ($(".error:contains('At least one color must be selected')").length === 0) {
                        $("input[name='available_colors[]']").first().after("<span class='error'>At least one color must be selected</span>");
                    }
                    isValid = false;
                } else {
                    // Remove the error message when colors are selected
                    $(".error:contains('At least one color must be selected')").remove();
                }


                // Validate Product Image
                if ($("#image").val() === "") {
                    $("#image").next(".error").remove();
                    $("#image").after("<span class='error'>Product Image is required</span>");
                    isValid = false;
                } else {
                    $("#image").next(".error").remove();
                }

                // Enable or disable the submit button based on validity
                if (isValid) {
                    $("#submit-btn").prop("disabled", false);
                } else {
                    $("#submit-btn").prop("disabled", true);
                }

                return isValid;
            }

            // Check validation on field change
            $("input, select, textarea").on("input change", function() {
                validateForm();
            });

            // Prevent form submission if validation fails
            $("form").submit(function(e) {
                if (!validateForm()) {
                    e.preventDefault(); // Prevent form submission
                }
            });

        });
    </script>


</head>

<body>

    <div>
        <button id="add-btn" class="btn btn-primary mt-3 mb-3 top-0 end-0">Add Product</button>
    </div>





    <?php
    $mysqli = new mysqli("localhost", "root", "", "Product_Inventory_Management");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $query = "
            SELECT
            p.product_id,
                p.product_name,
                p.category_id,
                p.subcategory_id,
                p.brand_name,
                p.price,
                p.stock_quantity,
                p.supplier_name,
                p.purchase_date,
                p.discount_percentage,
                p.final_price,
                p.payment_method,
                p.available_colors,
                p.product_image,
                p.product_status,
                c.category_name,
                s.subcategory_name
            FROM products p
            LEFT JOIN category c ON p.category_id = c.category_id
            LEFT JOIN subcategory s ON p.subcategory_id = s.subcategory_id";

    $result = $mysqli->query($query);

    ?>

    <div class="data-table" id="table-containt">
        <table id="table" class="table table-dark table-hover">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Product Name</td>
                    <td>Category</td>
                    <td>Subcategory</td>
                    <td>Brand Name</td>
                    <td>Price</td>
                    <td>Stock Quantity</td>
                    <td>Supplier Name</td>
                    <td>Purchase Date</td>
                    <td>Discount Percentage</td>
                    <td>Final Price</td>
                    <td>Payment Method</td>
                    <td>Available Colors</td>
                    <td>Product Image</td>
                    <td>Product Status</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                <?php

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['product_id'] . '</td>';
                    echo '<td>' . $row['product_name'] . '</td>';
                    echo '<td>' . $row['category_name'] . '</td>';
                    echo '<td>' . $row['subcategory_name'] . '</td>';
                    echo '<td>' . $row['brand_name'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>' . $row['stock_quantity'] . '</td>';
                    echo '<td>' . $row['supplier_name'] . '</td>';
                    echo '<td>' . $row['purchase_date'] . '</td>';
                    echo '<td>' . $row['discount_percentage'] . '</td>';
                    echo '<td>' . $row['final_price'] . '</td>';
                    echo '<td>' . $row['payment_method'] . '</td>';
                    echo '<td>' . $row['available_colors'] . '</td>';
                    echo '<td><img src="images/' . $row['product_image'] . '" alt="Product Image" width="50"></td>';
                    echo '<td>' . $row['product_status'] . '</td>';
                    echo '<td>';
                    echo '<a href="edit_product.php?id=' . $row['product_id'] . '" class="btn btn-primary btn-sm" id="edit-btn">Edit</a> ';
                    echo '<br><br>';
                    echo '<a href="delete_product.php?id=' . $row['product_id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</a>';

                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>



    <div id="product-form" class="container mt-5 mb-3 w-75">
        <div class="card pt-3">
            <div class="card-title text-center">
                <h2>Product</h2>
            </div>
            <div class="card-body">
                <form action="insert_product.php" method="POST">

                    <div class="mb-3 mt-3">
                        <label for="pname">Product Name:</label>
                        <input type="text" class="form-control" id="pname" placeholder="Enter Product Name" name="product_name">
                        <!-- required pattern="[A-Za-z\s]+" title="Only alphabets and spaces are allowed" -->
                    </div>


                    <div class="mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <select class="form-select" id="category" name="category_id">
                            <option value="">---SELECT CATEGORY---</option>
                            <?php
                            $category_query = "SELECT * FROM category";
                            $category_result = $mysqli->query($category_query);
                            while ($category = $category_result->fetch_assoc()) {
                                echo "<option value='" . $category['category_id'] . "'>" . $category['category_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="subcategory" class="form-label">Subcategory:</label>
                        <select class="form-select" id="subcategory" name="subcategory_id">
                            <option value="">---SELECT SUBCATEGORY---</option>
                        </select>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="brandname" class="form-label">Brand Name:</label>
                        <select class="form-select" id="brandname" name="brand_name">
                            <option value="Apple">Apple</option>
                            <option value="Nike">Nike</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Adidas">Adidas</option>
                            <option value="Nestle">Nestle</option>
                            <option value="denim">Denim</option>

                        </select>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price">
                        <!-- required min="0" step="0.01" -->
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="stock">Stock Quantity:</label>
                        <input type="text" class="form-control" id="stock" placeholder="Enter Stock Quantity" name="stock_quantity">
                        <!-- required min="0" -->
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="suppliername">Supplier Name:</label>
                        <input type="text" class="form-control" id="suppliername" placeholder="Enter Supplier Name" name="supplier_name">
                        <!-- required pattern="[A-Za-z\s]+" title="Only alphabets and spaces are allowed" -->
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="purchasedate">Purchase Date:</label>
                        <input type="date" class="form-control" id="purchasedate" name="purchase_date">
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="discount">Discount Percentage:</label>
                        <input type="text" class="form-control" id="discount" name="discount_percentage">
                        <!-- min="0" max="100" step="0.01" required -->
                    </div>

                    <label for="payment">Payment Method:</label>
                    <div class="form-check mt-3">
                        <input type="radio" class="form-check-input" id="payment" name="payment_method" value="Cash" checked>
                        <label class="form-check-label" for="payment">Cash</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="payment" name="payment_method" value="Credit Card" checked>
                        <label class="form-check-label" for="payment">Credit Card</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="payment" name="payment_method" value="UPI" checked>
                        <label class="form-check-label" for="payment">UPI</label>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="finalprice">Final Price:</label>
                        <input type="text" class="form-control" id="finalprice" name="final_price">
                    </div>

                    <div class="mt-3">
                        <label for="colors">Available Colors:</label>
                        <div class="form-check mt-3">
                            <input type="checkbox" class="form-check-input" id="colors" name="available_colors[]" value="Red">
                            <label class="form-check-label" for="colors">Red</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="colors" name="available_colors[]" value="Blue">
                            <label class="form-check-label" for="colors">Blue</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="colors" name="available_colors[]" value="Black">
                            <label class="form-check-label" for="colors">Black</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="colors" name="available_colors[]" value="White">
                            <label class="form-check-label" for="colors">White</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="colors" name="available_colors[]" value="Green">
                            <label class="form-check-label" for="colors">Green</label>
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="image">Product Image Upload:</label>
                        <input type="file" class="form-control" id="image" name="product_image">
                    </div>


                    <div class="mb-2 mt-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="product_status" value="in_stock" checked>
                            <label class="form-check-label-switch" for="mySwitch">Product Status: In Stock</label>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary" id="submit-btn" disabled>Submit</button>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $("#category").change(function() {
                var category_id = $(this).val();
                if (category_id != '') {
                    $.ajax({
                        url: 'fetch_subcategories.php',
                        type: 'POST',
                        data: {
                            category_id: category_id
                        },
                        success: function(response) {
                            $("#subcategory").html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error: " + status + ", " + error);
                        }
                    });
                } else {
                    $("#subcategory").html("<option value=''>---SELECT SUBCATEGORY---</option>");
                }
            });
        });




        function calculateFinalPrice() {
            var price = parseFloat($("#price").val()) || 0;
            var discount = parseFloat($("#discount").val()) || 0;

            var discountAmount = (price * discount) / 100;
            var finalPrice = price - discountAmount;

            $("#finalprice").val(finalPrice.toFixed(2));
        };

        $("#price, #discount").on("input", function() {
            calculateFinalPrice();
        });
    </script>

</body>

</html>