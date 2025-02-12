        <?php

        // include("connection.php");

        $mysqli = new mysqli("localhost", "root", "", "Product_Inventory_Management");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }



        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];
            echo '' . $product_id . '';
        }

        $product_id = intval($_GET['id']);

        $query = "
            SELECT 
                p.product_id, p.product_name, p.category_id, p.subcategory_id, 
                p.brand_name, p.price, p.stock_quantity, p.supplier_name, 
                p.purchase_date, p.discount_percentage, p.final_price, 
                p.payment_method, p.available_colors, p.product_image, 
                p.product_status, c.category_name, s.subcategory_name
            FROM products p
            LEFT JOIN category c ON p.category_id = c.category_id
            LEFT JOIN subcategory s ON p.subcategory_id = s.subcategory_id
            WHERE p.product_id = $product_id";

        // query
        $result = $mysqli->query($query);

        if (!$result) {
            die("Error fetching product: " . $mysqli->error);
        }

        $product = $result->fetch_assoc();
        if (!$product) {
            die("Product not found!");
        }

        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Product</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>

            <script>
                $(document).ready(function() {
                    $("#edit-btn").click(function() {
                        $("#edit-form").show();
                    });
                });



                // TOGGLE SWITCH BUTTON

                $(document).ready(function() {
                    // Assuming 'product_status' comes from the existing product data
                    var currentStatus = 'in_stock'; // Example: replace with dynamic value from the database (e.g., 'in_stock' or 'out_of_stock')

                    // Set the switch state based on the current product status
                    if (currentStatus === 'in_stock') {
                        $("#mySwitch").prop("checked", true);
                        $(".form-check-label-switch").text("Product Status: In Stock");
                    } else {
                        $("#mySwitch").prop("checked", false);
                        $(".form-check-label-switch").text("Product Status: Out of Stock");
                    }

                    // Handle change event when the switch is toggled
                    $("#mySwitch").change(function() {
                        if ($(this).prop("checked")) {
                            $(".form-check-label-switch").text("Product Status: In Stock");
                            $(this).val("in_stock"); // Set value to 'in_stock' when checked
                        } else {
                            $(".form-check-label-switch").text("Product Status: Out of Stock");
                            $(this).val("out_of_stock"); // Set value to 'out_of_stock' when unchecked
                        }
                    });
                });
            </script>
        </head>

        <body>

            <div id="edit-form" class="container mt-5 mb-3 w-75">
                <div class="card pt-3">
                    <div class="card-title text-center">
                        <h2>Edit Product</h2>
                    </div>
                    <div class="card-body">
                        <form action="update_product.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">

                            <div class="mb-3 mt-3">
                                <label for="pname">Product Name:</label>
                                <input type="text" class="form-control" id="pname" name="product_name" value="<?= $product['product_name'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category:</label>
                                <select class="form-select" id="category" name="category_id">
                                    <option value="">---SELECT CATEGORY---</option>
                                    <?php
                                    $category_query = "SELECT * FROM category";
                                    $category_result = $mysqli->query($category_query);
                                    while ($category = $category_result->fetch_assoc()) {
                                        $selected = ($category['category_id'] == $product['category_id']) ? 'selected' : '';
                                        echo "<option value='" . $category['category_id'] . "' $selected>" . $category['category_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="subcategory" class="form-label">Subcategory:</label>
                                <select class="form-select" id="subcategory" name="subcategory_id">
                                    <option value="">---SELECT SUBCATEGORY---</option>
                                    <?php
                                    $subcategory_query = "SELECT * FROM subcategory WHERE category_id = " . $product['category_id'];
                                    $subcategory_result = $mysqli->query($subcategory_query);
                                    while ($subcategory = $subcategory_result->fetch_assoc()) {
                                        $selected = ($subcategory['subcategory_id'] == $product['subcategory_id']) ? 'selected' : '';
                                        echo "<option value='" . $subcategory['subcategory_id'] . "' $selected>" . $subcategory['subcategory_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="brandname">Brand Name:</label>
                                <input type="text" class="form-control" id="brandname" name="brand_name" value="<?= $product['brand_name'] ?>">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" name="price" value="<?= $product['price'] ?>">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="stock">Stock Quantity:</label>
                                <input type="text" class="form-control" id="stock" name="stock_quantity" value="<?= $product['stock_quantity'] ?>">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="suppliername">Supplier Name:</label>
                                <input type="text" class="form-control" id="suppliername" name="supplier_name" value="<?= $product['supplier_name'] ?>">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="purchasedate">Purchase Date:</label>
                                <input type="date" class="form-control" id="purchasedate" name="purchase_date" value="<?= $product['purchase_date'] ?>">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="discount">Discount Percentage:</label>
                                <input type="text" class="form-control" id="discount" name="discount_percentage" value="<?= $product['discount_percentage'] ?>">
                            </div>

                            <label for="payment">Payment Method:</label>
                            <div class="form-check mt-3">
                                <input type="radio" class="form-check-input" name="payment_method" value="Cash" <?= ($product['payment_method'] == 'Cash') ? 'checked' : '' ?>>
                                <label class="form-check-label">Cash</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="payment_method" value="Credit Card" <?= ($product['payment_method'] == 'Credit Card') ? 'checked' : '' ?>>
                                <label class="form-check-label">Credit Card</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="payment_method" value="UPI" <?= ($product['payment_method'] == 'UPI') ? 'checked' : '' ?>>
                                <label class="form-check-label">UPI</label>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="finalprice">Final Price:</label>
                                <input type="text" class="form-control" id="finalprice" name="final_price" value="<?= $product['final_price'] ?>">
                            </div>

                            <div class="mt-3">
                                <label for="colors">Available Colors:</label>
                                <?php
                                $available_colors = explode(',', $product['available_colors']);
                                $colors = ['Red', 'Blue', 'Black', 'White', 'Green'];
                                foreach ($colors as $color) {
                                    $checked = in_array($color, $available_colors) ? 'checked' : '';
                                    echo "<div class='form-check'>
                                        <input type='checkbox' class='form-check-input' name='available_colors[]' value='$color' $checked>
                                        <label class='form-check-label'>$color</label>
                                    </div>";
                                }
                                ?>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="image">Product Image Upload:</label>
                                <input type="file" class="form-control" id="image" name="product_image">
                            </div>

                            <!-- <div class="mb-2 mt-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="mytSwitch" name="product_status" value="in_stock" <?= ($product['product_status'] == 'in_stock') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="mytSwitch">Product Status</label>
                                </div>
                            </div> -->


                            <div class="mb-2 mt-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="mySwitch" name="product_status" value="in_stock" checked>
                                    <label class="form-check-label-switch" for="mySwitch">Product Status: In Stock</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Product</button>
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
                                }
                            });
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