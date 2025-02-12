<?php include_once("header.php");
include_once("conf.php");
?>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Category List</h4>
                <h6>Manage your categories</h6>
            </div>
            <div class="page-btn">
                <a href="addcategory.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img"
                        class="me-1">Add New category</a>
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
                $sql = "SELECT * FROM `categorymaster`";
                $i = 0;
                $result = mysqli_query($conn, $sql);
                ?>
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                        <tr id="category_<?php echo $row['category_id']; ?>">
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
                                        <a class="me-3" href="editproduct.html">
                                            <img src="assets/img/icons/edit.svg" alt="img">
                                        </a>
                                        <!-- Update the delete link with an onclick function to trigger AJAX -->
                                        <a class="confirm-text" href="javascript:void(0);"
                                            onclick="deleteCategory(<?php echo $row['category_id']; ?>)">
                                            <img src="assets/img/icons/delete.svg" alt="img">
                                        </a>
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
<script>
    function deleteCategory(category_id) {
     Swal.fire({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, delete it!',
     }).then((result) => {
         if (result.isConfirmed) {
             // Perform AJAX request for deletion
             $.ajax({
                 url: 'con_deletECategory.php', // The PHP script that will handle the deletion
                 type: 'POST',
                 data: { category_id: category_id }, // Send the category_id to the PHP script
                 success: function(response) {
                     if (response == 'success') {
                         Swal.fire(
                             'Deleted!',
                             'The category has been deleted.',
                             'success'
                         ).then(() => {
                             // Remove the deleted row from the table
                             $('tr#category_' + category_id).remove(); 
                             window.location.reload();
                         });
                     } else {
                         Swal.fire(
                             'Error!',
                             'There was an error deleting the category.',
                             'error'
                         );
                     }
                 },
                 error: function() {
                     Swal.fire(
                         'Error!',
                         'There was an error with the AJAX request.',
                         'error'
                     );
                 }
             });
         }
     });
 }
</script>


</html>