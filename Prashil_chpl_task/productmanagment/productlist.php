<?php include_once("header.php");
include_once("conf.php");
?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product List</h4>
                <h6>Manage your products</h6>
            </div>
            <div class="page-btn">
                <a href="addproduct.html" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img"
                        class="me-1">Add New Product</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <img src="assets/img/icons/filter.svg" alt="img">
                                <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
                        </div>
                    </div>
                </div>
                <?php
                $sql = "select p.productid,p.product_name,c.category_name,s.subcategory_name,b.brand_name,p.actualprice,p.discountedprice,p.quantity,p.supplier_name,p.purchase_date,p.discounted_percentage,p.payment_method,p.color,p.product_image,p.status from productmaster as p inner join categorymaster as c on p.categoryid = c.category_id inner join subcategorymaster as s on p.subcategoryid = s.subcategory_id inner join brandmaster as b on b.brand_id = p.brandid;";
                $result = mysqli_query($conn, $sql);
                

                ?>
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <!-- <th>
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th> -->
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Subcategory Name</th>
                                <th>Brand Name</th>
                                <th>Actual Price</th>
                                <th>Discounted Price</th>
                                <th>Quantity</th>
                                <th>Supplier Name</th>
                                <th>Purchase Date</th>
                                <th>Discounted Percentage</th>
                                <th>Payment Method</th>
                                <th>color</th>
                                <th>Product Image</th>
                                <th>Status</th>
                                <th>Remark</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                <td><?php echo $row['productid']?></td>
                                <td><?php echo$row['product_name']?></td>
                                <td><?php echo$row['category_name']?></td>
                                <td><?php echo$row['subcategory_name']?></td>
                                <td><?php echo$row['brand_name']?></td>
                                <td><?php echo$row['actualprice']?></td>
                                <td><?php echo$row['discountedprice']?></td>
                                <td><?php echo$row['quantity']?></td>
                                <td><?php echo$row['supplier_name']?></td>
                                <td><?php echo$row['purchase_date']?></td>
                                <td><?php echo$row['discounted_percentage']?></td>
                                <td><?php echo$row['payment_method']?></td>
                                <td><?php echo$row['color']?></td>
                                <td class="productimgname">
                                    <a href="javascript:void(0);" class="product-img">
                                        <img src="<?php echo$row['product_image']?>" alt="product">
                                    </a>
                                </td>
                                <td><?php echo$row['status']?></td>
                                <td>Out of stock</td>
                                <td>
                                    <a class="me-3" href="editproduct.html">
                                        <img src="assets/img/icons/edit.svg" alt="img">
                                    </a>
                                    <a class="confirm-text" href="javascript:void(0);">
                                        <img src="assets/img/icons/delete.svg" alt="img">
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
</div>
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.2/feather.min.js"
    integrity="sha512-zMm7+ZQ8AZr1r3W8Z8lDATkH05QG5Gm2xc6MlsCdBz9l6oE8Y7IXByMgSm/rdRQrhuHt99HAYfMljBOEZ68q5A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script> -->


<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<script src="assets/js/script.js"></script>
</body>

</html>