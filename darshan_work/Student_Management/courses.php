<?php
include 'header.php';
include 'connection.php';
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.2/feather.min.js"
    integrity="sha512-zMm7+ZQ8AZr1r3W8Z8lDATkH05QG5Gm2xc6MlsCdBz9l6oE8Y7IXByMgSm/rdRQrhuHt99HAYfMljBOEZ68q5A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>
<script src="assets/js/script.js"></script>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Courses List</h4>
            </div>
            <div class="page-btn">
                <a href="addCourses.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-1">Add New Courses</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <?php
                $sql = "SELECT `id`,`category_name` FROM `categories`;";
                $i = 1;
                $result = mysqli_query($conn, $sql);
                ?>
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['category_name'] ?></td>
                                    <td>


                                        <a class="btn btn-warning editCategoryBtn" href="javascript:void(0);" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['category_name']; ?>">
                                            Edit
                                        </a>

                                        <a class="confirm-text btn btn-danger" href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id']; ?>)">
                                            Delete
                                        </a>
                                    </td>

                                    <script>
                                        function confirmDelete(id) {
                                            if (confirm('Are you sure you want to delete this category?')) {
                                                window.location.href = 'delete_category.php?id=' + id;
                                            }
                                        }
                                    </script>

                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm">
                    <input type="hidden" id="categoryId" name="id">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="category_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>


</body>

</html>

<script>
    $(document).ready(function() {
    $(".editCategoryBtn").click(function() {
        var categoryId = $(this).data("id"); 
        var categoryName = $(this).data("name"); 

        $("#categoryId").val(categoryId);
        $("#categoryName").val(categoryName);

        $("#editCategoryModal").modal("show");
    });

    $("#editCategoryForm").submit(function(e) {
        e.preventDefault(); 

        var formData = $(this).serialize();

        $.ajax({
            url: "update_category.php", 
            type: "POST",
            data: formData,
            success: function(response) {
                alert("Category updated successfully!");
                $("#editCategoryModal").modal("hide"); 
                location.reload(); 
            },
            error: function() {
                alert("Failed to update category.");
            }
        });
    });
});

</script>


