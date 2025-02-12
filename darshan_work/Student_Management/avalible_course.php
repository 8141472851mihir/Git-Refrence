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
                <h4>Subcategory List</h4>
                <h6>Manage your Subcategory</h6>
            </div>
            <div class="page-btn">
                <a href="addsubcourse.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img"
                        class="me-1">Add New Subcategory</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                
                <?php
                $sql = "SELECT ac.`id`,c.category_name,ac.course_name FROM `avalible_courses` AS ac INNER JOIN categories as c on ac.category_id = c.id;";
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
                                <th>Subcategory Name</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <?php
                                $id = 1;
                                while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                    <td><?php echo $id++ ?></td>
                                    <td><?php echo $row['category_name'] ?></td>
                                    <td><?php echo $row['course_name'] ?></td>


                                    <td>
                                        <a class="me-3 btn btn-warning editSubcategoryBtn" href="javascript:void(0);"
                                            data-id="<?php echo $row['id']; ?>"
                                            data-course-name="<?php echo $row['course_name']; ?>"
                                            data-category-name="<?php echo $row['category_name']; ?>">
                                            Edit
                                        </a>

                                        <a class="confirm-text btn btn-danger" href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id']; ?>)">
                                            Delete
                                        </a>

                                        <script>
                                            function confirmDelete(id) {
                                                if (confirm('Are you sure you want to delete this subcategory?')) {
                                                    window.location.href = 'delete_subcategory.php?id=' + id;
                                                }
                                            }
                                        </script>

                                    </td>
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

<!-- Edit Subcategory Modal -->
<div class="modal fade" id="editSubcategoryModal" tabindex="-1" aria-labelledby="editSubcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubcategoryModalLabel">Edit Subcategory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSubcategoryForm">
                    <input type="hidden" id="subcategoryId" name="id">
                    <div class="mb-3">
                        <label for="courseName" class="form-label">Subcategory Name</label>
                        <input type="text" class="form-control" id="courseName" name="course_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="category_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Subcategory</button>
                </form>
            </div>
        </div>
    </div>
</div>


</body>

</html>

<script>
    $(document).ready(function() {
        $(".editSubcategoryBtn").click(function() {
            var subcategoryId = $(this).data("id"); 
            var courseName = $(this).data("course-name");
            var categoryName = $(this).data("category-name");

            $("#subcategoryId").val(subcategoryId);
            $("#courseName").val(courseName);
            $("#categoryName").val(categoryName);

            // Show the modal
            $("#editSubcategoryModal").modal("show");
        });

        $("#editSubcategoryForm").submit(function(e) {
            e.preventDefault(); 

            var formData = $(this).serialize(); 
            $.ajax({
                url: "update_subcategory.php", 
                type: "POST",
                data: formData,
                success: function(response) {
                    alert("Subcategory updated successfully!");
                    $("#editSubcategoryModal").modal("hide");
                    location.reload(); 
                },
                error: function() {
                    alert("Failed to update subcategory.");
                }
            });
        });

        
    });
</script>