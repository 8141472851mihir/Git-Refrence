<?php

include("connection.php");

session_start();

$select = "SELECT p.`id`,p.`product_name`,c.`category_name`,s.`subcategory_name`,p.`brand_name`,p.`price`,p.`stock_quantity`,p.`supplier_name`,p.`purchase_date`,p.`discount_percentage`,p.`final_amount`,p.`payment_method`,p.`available_colors`,p.`product_image`,p.`product_status` FROM `products` AS p LEFT JOIN `product_categories` AS c ON p.`category_id` = c. `id`
LEFT JOIN `product_subcategories` AS s ON p.`subcategory_id` = s.`id`;";
$result = mysqli_query($conn, $select);


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

    <script>
        $(function() {
            $("#datepicker").datepicker();
        });

        $(document).ready(function() {
            $('#datatable').DataTable();
        });

        $(document).ready(function() {
            $("#insert").hide();

            $("#add-btn").click(function() {
                $("#insert").show();
                $("#add-btn").hide();
                $("#main").hide();
            });

            $("#close-btn").click(function() {
                $("#insert").hide();
                $("#add-btn").show();
                $("#main").show();
            });

        });
    </script>
    <style>
        #add-btn {
            z-index: 10;
        }
    </style>
    <title>Product Inventory Management</title>
</head>

<body>
    <div id="main" class="container-fluid">

        <h2 class="text-center mt-3 mb-3">Product Inventory Table</h2>
        <button id="add-btn" class="btn btn-primary position-fixed top-0 end-0 mt-3 me-3">Add Product</button>

        <table id="datatable" class="table border table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Action</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <!-- <th>Sub Category</th> -->
                    <th>Brand Name</th>
                    <th>Price</th>
                    <th>Stock Quantity</th>
                    <!-- <th>Supplier Name</th> -->
                    <th>Purchase Date</th>
                    <th>Discount %</th>
                    <th>Final Price</th>
                    <!-- <th>Payment Method</th> -->
                    <th>Color</th>
                    <th>Product Image</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $checked = ($row['product_status'] == 'In Stock') ? 'checked' : '';
                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td>
                                <button id="edit-btn" class="btn btn-success btn-sm">
                                    <a href="edit.php?id=<?php echo $row["id"]; ?>" class="text-white text-decoration-none">Edit</a>
                                </button>

                                <button class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $row['id']; ?>">Delete</button>

                            </td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td>
                                <?php echo $row['category_name']; ?>
                            </td>
                            <td><?php echo $row['brand_name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['stock_quantity']; ?></td>
                            <td>
                                <?php
                                $formattedDate = date("d M, Y", strtotime($row['purchase_date']));
                                echo $formattedDate;
                                ?>
                            </td>
                            <td><?php echo $row['discount_percentage']; ?></td>
                            <td><?php echo $row['final_amount']; ?></td>
                            <td>
                                <?php
                                $colorsArray = explode(',', $row['available_colors']);
                                foreach ($colorsArray as $color) {
                                    echo "$color" . ", ";
                                }
                                ?>
                            </td>

                            <td><img src="<?php echo $row['product_image']; ?>" width="100" height="auto" alt="Product Image">
                            </td>
                            <td>
                                <!-- <div class="mb-3"> -->
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-status" type="checkbox" data-id="<?php echo $row['id']; ?>"
                                        <?php echo $checked; ?>>
                                    <label class="form-check-label">
                                        <?php echo $row['product_status']; ?>
                                    </label>
                                </div>
                                <!-- </div> -->
                            </td>
                        </tr>
                <?php
                    } // Closing while loop
                } else {
                    echo "<tr><td colspan='15' class='text-center'>No products found</td></tr>";
                }
                ?>
            </tbody>

        </table>

    </div>

    <div id="insert" class="container w-75">
        <div class="card mt-5 mb-2 shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h3 class="text-center">Add Product Details</h3>
                    <button class="btn btn-close" id="close-btn"></button>
                </div>
                <form id="login-form" action="insert.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name <span class="fw-bold text-danger">*</span></label>
                        <input type="text" class="form-control" name="product_name" id="productName" placeholder="Your Product Name" required>
                    </div>

                    <div class="row bg-secondary bg-opacity-25">
                        <div class="col-6 mb-3">
                            <label for="cat" class="form-label">Category <span class="fw-bold text-danger">*</span></label>
                            <select class="form-select" name="category_id" id="cat">
                                <option value="">---Select Category---</option> <!-- Default select option -->
                                <?php
                                // Database Query
                                $category = "SELECT * FROM product_categories";
                                $result = mysqli_query($conn, $category);

                                // Fetch Data and Populate Options
                                while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="subcat" class="form-label">Sub Category <span class="fw-bold text-danger">*</span></label>
                            <select class="form-select" name="subcategory_id" id="subcat">
                                <option value="">---Select Subcategory---</option> <!-- Default Select Option -->
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mb-3">
                            <label for="brand" class="form-label">Brand Name <span class="fw-bold text-danger">*</span></label>
                            <select class="form-select" name="brand_name" id="brand">
                                <option>---Select Brand Name---</option>
                                <option value="Apple">Apple</option>
                                <option value="Samsung">Samsung</option>
                                <option value="Nike">Nike</option>
                                <option value="Adidas">Adidas</option>
                                <option value="Nestle">Nestle</option>
                                <option value="Amul">Amul</option>
                                <option value="Navneet">Navneet</option>
                                <option value="Oxford">Oxford</option>
                                <option value="Reebok">Reebok</option>
                                <option value="Panasonic">Panasonic</option>
                                <option value="Whirlpool">Whirlpool</option>
                                <option value="HotWheels">HotWheels</option>
                                <option value="Nilkamal">Nilkamal</option>
                                <option value="Lakme">Lakme</option>
                                <option value="Nivea">Nivea</option>
                                <option value="Castrol">Castrol</option>
                                <option value="Bajaj">Bajaj</option>
                            </select>
                        </div>

                        <div class="col-4 mb-3">
                            <label for="price" class="form-label">Price <span class="fw-bold text-danger">*</span></label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="Enter Product Price" required>
                        </div>

                        <div class="col-4 mb-3">
                            <label for="stock" class="form-label">Stock Quantity</label>
                            <input type="number" name="stock_quantity" class="form-control" id="stock" placeholder="Enter Stock Quantity">
                        </div>
                    </div>
                    <div class="row bg-secondary bg-opacity-25">
                        <div class="col-6 mb-3">
                            <label for="supplierName" class="form-label">Supplier Name</label>
                            <input type="text" name="supplier_name" class="form-control" id="supplierName" placeholder="Your Supplier Name">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="datepicker" class="form-label">Purchase Date <span class="fw-bold text-danger">*</span></label>
                            <input type="text" name="purchase_date" class="form-control" id="datepicker" placeholder="Select Date" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="discount" class="form-label">Discount Percentage</label>
                            <input type="number" name="discount_percentage" class="form-control" id="discount" placeholder="Enter Discount Amount">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="fprice" class="form-label">Final Price</label>
                            <input type="text" name="final_amount" class="form-control" id="fprice" readonly>
                        </div>
                    </div>

                    <div class="row bg-secondary bg-opacity-25">

                        <div class="col-2 mb-3">
                            <label for="pmethod" class="form-label">Payment Method <span class="fw-bold text-danger">*</span></label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio1" name="payment_method" value="Cash"
                                    checked>
                                <label class="form-check-label" for="radio1">Cash</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio1" name="payment_method"
                                    value="Credit Card">
                                <label class="form-check-label" for="radio1">Credit Card</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio1" name="payment_method" value="UPI">
                                <label class="form-check-label" for="radio1">UPI</label>
                            </div>
                        </div>

                        <div class="col-4 mb-3">
                            <label for="colors" class="form-label">Available Colors</label>
                            <div class="row">
                                <div class="col-6 form-check">
                                    <input class="form-check-input" type="checkbox" id="check1" name="available_colors[]"
                                        value="Red" checked>
                                    <label class="form-check-label">Red</label>
                                </div>
                                <div class="col-6 form-check">
                                    <input class="form-check-input" type="checkbox" id="check1" name="available_colors[]"
                                        value="Blue">
                                    <label class="form-check-label">Blue</label>
                                </div>
                                <div class="col-6 form-check">
                                    <input class="form-check-input" type="checkbox" id="check1" name="available_colors[]"
                                        value="Black">
                                    <label class="form-check-label">Black</label>
                                </div>
                                <div class="col-6 form-check">
                                    <input class="form-check-input" type="checkbox" id="check1" name="available_colors[]"
                                        value="White">
                                    <label class="form-check-label">White</label>
                                </div>
                                <div class="col-6 form-check">
                                    <input class="form-check-input" type="checkbox" id="check1" name="available_colors[]"
                                        value="Green">
                                    <label class="form-check-label">Green</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <label class="form-label" for="customFile">Product Image Upload <span class="fw-bold text-danger">*</span></label>
                            <input type="file" class="form-control" name="product_image" id="customFile" required accept="image/*" onchange="previewImage(event)" />
                            <div class="mt-2">
                                <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;" />
                            </div>
                        </div>
                    </div>

                    <!-- <div class="mb-3">
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="mySwitch">Product Status <span class="fw-bold text-danger">*</span></label>
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="product_status"
                                value="In Stock" checked>
                        </div>
                    </div> -->

                    <button id="add-btn" type="submit" class="btn btn-primary mt-4">Add Product</button>
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
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('imagePreview');
                preview.src = reader.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
        $(document).ready(function() {
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

            // $(document).on("click", ".delete-btn", function() {
            //     var productId = $(this).data("id"); // Get product ID

            //     // Show confirmation alert
            //     if (confirm("Are you sure you want to delete this record?")) {
            //         $.ajax({
            //             url: "delete.php", // PHP file to handle deletion
            //             type: "POST",
            //             data: {
            //                 id: productId
            //             },
            //             success: function(response) {
            //                 alert(response); // Show success message
            //                 location.reload(); // Reload the page to reflect changes
            //             },
            //             error: function() {
            //                 alert("Error deleting product.");
            //             }
            //         });
            //     }
            // });
            $(document).on("click", ".delete-btn", function() {
                var productId = $(this).data("id"); // Get product ID

                // Show SweetAlert confirmation
                Swal.fire({
                    title: "Are you sure?",
                    text: "Your record will be delete from the database!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform AJAX request to delete the product
                        $.ajax({
                            url: "delete.php", // PHP file to handle deletion
                            type: "POST",
                            data: {
                                id: productId
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your record has been deleted.",
                                    icon: "success"
                                }).then(() => {
                                    location.reload(); // Reload the page to reflect changes
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    title: "Error!",
                                    text: "Error deleting product.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            });


            $(document).on("change", ".toggle-status", function() {
                Swal.fire({
                    title: "Status Changed!",
                    icon: "success",
                    draggable: true
                });

                var productId = $(this).data("id"); // Get product ID
                var newStatus = $(this).is(":checked") ? "In Stock" : "Out of Stock"; // Set status
                var label = $(this).siblings("label");

                console.log("Sending Data:", {
                    product_id: productId,
                    status: newStatus
                }); // Debugging

                $.ajax({
                    url: "update_status.php",
                    type: "POST",
                    data: {
                        product_id: productId,
                        status: newStatus
                    },
                    success: function(response) {
                        console.log("Server Response:", response); // Debugging

                        if (response.trim().startsWith("Success")) {
                            label.text(newStatus);
                        } else {
                            alert("Failed to update status! Server says: " + response);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("AJAX Error: " + error);
                    }
                });
            });

        });
    </script>
</body>

</html>