<?php include_once("header.php");
include_once("conf.php");
?>
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

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Subcategory List</h4>
                <h6>Manage your Subcategory</h6>
            </div>
            <div class="page-btn">
                <a href="addsubcategory.php" class="btn btn-added">
                    <img src="assets/img/icons/plus.svg" alt="img" class="me-1">Add New Subcategory
                </a>
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
                $sql = "SELECT s.subcategory_id, s.subcategory_name, c.category_name 
                        FROM subcategorymaster AS s 
                        INNER JOIN categorymaster AS c 
                        ON s.category_id = c.category_id;";
                $i = 1;
                $result = mysqli_query($conn, $sql);
                ?>
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subcategory Name</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr id="row_<?php echo $row['subcategory_id']; ?>">
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['subcategory_name']; ?></td>
                                    <td><?php echo $row['category_name']; ?></td>
                                    <td>
                                        <a class="me-3 edit-btn" href="javascript:void(0);"
                                            data-id="<?php echo $row['subcategory_id']; ?>"
                                            data-name="<?php echo $row['subcategory_name']; ?>"
                                            data-category="<?php echo $row['category_name']; ?>">
                                            <img src="assets/img/icons/edit.svg" alt="Edit">
                                        </a>
                                        <a class="confirm-delete" href="javascript:void(0);"
                                            data-id="<?php echo $row['subcategory_id']; ?>">
                                            <img src="assets/img/icons/delete.svg" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Edit Subcategory Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Subcategory</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editSubcategoryForm">
                            <div class="mb-3">
                                <label for="subcategoryName" class="form-label">Subcategory Name</label>
                                <input type="text" class="form-control" id="subcategoryName" name="subcategory_name"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <select class="form-select" id="categoryName" name="category_id" required>
                                    <!-- Dynamic category options will be populated -->
                                </select>
                            </div>
                            <input type="hidden" id="subcategoryId" name="subcategory_id">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $(".confirm-delete").click(function () {
            var subcategory_id = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "con_deletesubcategory.php",
                        type: "POST",
                        data: { id: subcategory_id },
                        success: function (response) {
                            if (response == "success") {
                                Swal.fire("Deleted!", "Subcategory has been deleted.", "success");
                                $("#row_" + subcategory_id).fadeOut(500);
                            } else {
                                Swal.fire("Error!", "Something went wrong.", "error");
                            }
                        }
                    });
                }
            });
        });
        <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
            Swal.fire({
                title: "Success!",
                text: "Category added successfully.",
                icon: "success",
                confirmButtonText: "OK"
            }).then(() => {
                window.location.href = "subcategory.php";
            });
        <?php } elseif (isset($_GET['error']) && $_GET['error'] == 1) { ?>
            Swal.fire({
                title: "Error!",
                text: "Something went wrong. Please try again.",
                icon: "error",
                confirmButtonText: "OK"
            });
        <?php } ?>
        $(".edit-btn").click(function () {
            var subcategory_id = $(this).data("id");
            var subcategory_name = $(this).data("name");
            var category_name = $(this).data("category");

            // Set the modal fields
            $("#subcategoryId").val(subcategory_id);
            $("#subcategoryName").val(subcategory_name);

            // Fetch categories dynamically if needed
            $.ajax({
                url: "fetch_categories.php", // You can create this file to fetch categories from the database
                type: "GET",
                success: function (data) {
                    var categories = JSON.parse(data);
                    var categoryOptions = '';
                    categories.forEach(function (category) {
                        categoryOptions += `<option value="${category.category_id}" ${category.category_name == category_name ? 'selected' : ''}>${category.category_name}</option>`;
                    });
                    $("#categoryName").html(categoryOptions);
                }
            });

            // Show the modal
            $("#editModal").modal("show");
        });

        // Handle form submission for editing subcategory
        $("#editSubcategoryForm").submit(function (e) {
            e.preventDefault(); // Prevent form from submitting the default way

            var formData = $(this).serialize();

            $.ajax({
                url: "con_editsubcategory.php", // This will handle updating the subcategory in the database
                type: "POST",
                data: formData,
                success: function (response) {
                    if (response == "success") {
                        Swal.fire("Updated!", "Subcategory has been updated.", "success").then(() => {
                            location.reload(); // Reload the page to reflect the changes
                        });
                    } else {
                        Swal.fire("Error!", "Something went wrong.", "error");
                    }
                }
            });
        });

    });

</script>

</body>

</html>