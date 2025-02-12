<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="logic.js"></script>
</head>

<body class="bg-light">
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4>Product Inventory Management</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="data_add_display.php">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="product_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select id="category" name="category" class="form-control" required>
                                <option value="">Select Category</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Clothing">Clothing</option>
                                <option value="Grocery">Grocery</option>
                                <option value="Books">Books</option>
                                <option value="Sports">Sports</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sub Category</label>
                            <select id="subcategory" name="subcategory" class="form-control" required>
                                <option value="">Select Subcategory</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Brand Name</label>
                            <select name="brand_name" class="form-control">
                                <option value="">Select Brand</option>
                                <option>Apple</option>
                                <option>Nike</option>
                                <option>Samsung</option>
                                <option>Adidas</option>
                                <option>Nestle</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Price (₹)</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Discount (%)</label>
                            <input type="number" name="discount" id="discount" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Final Price (₹)</label>
                            <input type="text" name="final_price" id="final_price" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Stock Quantity</label>
                            <input type="number" name="stock_quantity" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Supplier Name</label>
                            <input type="text" name="supplier_name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Purchase Date</label>
                            <input type="text" name="purchase_date" id="purchase_date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Payment Method</label>
                            <div>
                                <input type="radio" name="payment_method" value="Cash"> Cash
                                <input type="radio" name="payment_method" value="Credit Card"> Credit Card
                                <input type="radio" name="payment_method" value="UPI"> UPI
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Available Colors</label>
                            <div>
                                <input type="checkbox" name="color[]" value="Red"> Red
                                <input type="checkbox" name="color[]" value="Blue"> Blue
                                <input type="checkbox" name="color[]" value="Black"> Black
                                <input type="checkbox" name="color[]" value="White"> White
                                <input type="checkbox" name="color[]" value="Green"> Green
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Product Image</label>
                            <input type="file" name="product_image" id="product_image" class="form-control">
                            <img id="image_preview" class="mt-2" style="max-width: 100px; display: none;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Product Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="product_status" id="status">
                                <label class="form-check-label" for="status">In Stock</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success" name="submit">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>