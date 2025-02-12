<?php
    include 'header.php';
    include 'connection.php';
?>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Subcategory ADD</h4>
                <h6>Create new Subcategory</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <?php
                $sql = "SELECT `id`, `category_name` FROM `categories`";
                $result = mysqli_query($conn, $sql);


                ?>
                <div class="row">
                    <form action="con_addsubcourse.php" method="post">
                        <div>
                            <div class="form-group">
                                <label>Sub Course Name</label>
                                <input type="text" name="subcourse_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Course Name</label>
                                <select name="category_name" id="" class="form-select">
                                    <option value="" selected disabled>--select--</option>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo $row["id"] ?>">
                                            <?php echo $row["category_name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" value="Submit" class="btn btn-submit">
                            <!-- <a href="brand.php" class="btn btn-cancel">Cancel</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

</html>