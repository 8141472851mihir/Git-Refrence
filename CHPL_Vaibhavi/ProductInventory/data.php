<?php include 'dbcon.php';

$view = "SELECT p.product_id ,p.product_name, c.category_name, s.subcategory_name, b.brand_name, p.price, p.stock_quantity, p.supplier_name, p.purchase_date,
p.discount_percentage, p.final_price, p.payment_method, p.available_colors, p.product_image, p.product_status
FROM products p
LEFT JOIN categories c ON p.category_id = c.category_id
LEFT JOIN subcategories s ON p.subcategory_id = s.subcategory_id
LEFT JOIN brands b ON p.brand_id = b.brand_id";

$result = mysqli_query($conn, $view);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- fancybox cdn -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>


    <script type="text/javascript">
    $(document).ready(function() {
        $('#demo').DataTable();
    });
    </script>

    <style>
    body{
        background-color: antiquewhite;
    }

    h1 {
        font-style: italic;
        color: brown;
        font-size: 45px;
    }
    .table-responsive {
            overflow-x: auto;
        }

        @media (max-width: 1024px) {
            h1 {
                font-size: 30px;
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 25px;
            }
            .table {
                font-size: 12px;
            }
            .btn {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 20px;
            }
            .table {
                font-size: 10px;
            }
            .btn {
                font-size: 12px;
            }
        }

        .action-btns a {
            margin-top: 10px;
        }

        .table td, .table th {
            padding: 8px;
            vertical-align: middle;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header mt-5">
                    <h1 class=" mx-4 fw-bolder">Products Details
                        <a href="addform.php" class="btn btn-warning float-end mb-3 fw-bold text-danger">+ Add Product</a>
                    </h1>
                </div>
                <hr>

                <div class="card-body mt-4">
                    <div class="table-responsive">
                        <table class="table text-center table-striped mt-3 table-sm table-responsive" id="demo">
                            <thead class="text-center">
                                <tr class="table-primary">
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Category Name</th>
                                    <th class="text-center">Subcategory Name</th>
                                    <th class="text-center">Brand Name</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Stock Qty</th>
                                    <th class="text-center">Supplier Name</th>
                                    <th class="text-center">Purchase Date</th>
                                    <th class="text-center">Discount Percentage</th>
                                    <th class="text-center">Final Price</th>
                                    <th class="text-center">Payment Method</th>
                                    <th class="text-center">Available Colors</th>
                                    <th class="text-center">Product Image</th>
                                    <th class="text-center">Product Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) {?>
                                <tr>
                                    <td><?php echo $row['product_id']; ?></td>
                                    <td><?php echo $row['product_name']; ?></td>
                                    <td><?php echo $row['category_name']; ?></td>
                                    <td><?php echo $row['subcategory_name']; ?></td>
                                    <td><?php echo $row['brand_name']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['stock_quantity']; ?></td>
                                    <td><?php echo $row['supplier_name']; ?></td>
                                    <td><?php echo $row['purchase_date'] ; ?></td>
                                    <td><?php echo $row['discount_percentage']; ?></td>
                                    <td><?php echo $row['final_price']; ?></td>
                                    <td><?php echo $row['payment_method']; ?></td>
                                    <td><?php echo $row['available_colors']; ?></td>
                                    <td>
                                        <a href="./uploads/<?php echo $row['product_image'] ?>"data-fancybox >
                                        <img src="./uploads/<?php echo $row['product_image'] ?>" class="img-thumbnail"
                                            alt="Product Image" width="50px" height="50px">
                                        </a>
                                        </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                id="SwitchCheck_<?php echo $row['product_id']; ?>"
                                                data-product-id="<?php echo $row['product_id']; ?>"
                                                <?php echo $row['product_status'] == 'In Stock' ? 'checked' : ''; ?>>
                                            <label class="form-check-label"
                                                for="SwitchCheck_<?php echo $row['product_id']; ?>">
                                                <?php echo $row['product_status'] == 'In Stock' ? 'In Stock' : 'Out of Stock'; ?>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="action-btns d-flex gap-2 justify-content-center p-4">
                                        <a href="edit_product.php?id=<?php echo $row['product_id'] ?>"
                                            class="btn btn-warning btn-sm edit-btn d-flex align-items-center">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="code.php?delete_product=<?php echo $row['product_id'] ?>"
                                            class="btn btn-danger btn-sm delete-btn d-flex align-items-center"
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a href="index.php" class="btn btn-danger">back to Dashboard</a>
    </div>
    <script>
    $(document).ready(function() {
        $('.form-check-input').change(function() {
            var productId = $(this).data('product-id');
            var status = $(this).is(':checked') ? 'In Stock' : 'Out of Stock';
            $.ajax({
                type: 'POST',
                url: 'update_status.php',
                data: {
                    product_id: productId,
                    status: status
                },
                success: function(response) {
                    console.log(response);
                    $('#SwitchCheck_' + productId).next('.form-check-label').text(status);
                }
            });
        });
    });
    Fancybox.bind("[data-fancybox]", {
  // Your custom options
});

    </script>
</body>

</html>