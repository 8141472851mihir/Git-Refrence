<?php include("header.php");
include("conf.php"); ?>

<!-- <script src="assets/js/jquery-3.6.0.min.js"></script> -->

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<!-- <script src="assets/js/jquery-3.6.0.min.js"></script> -->

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script src="assets/js/script.js"></script>

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
                $sql = "select category_id,category_name from categorymaster";
                $result = mysqli_query($conn, $sql);


                ?>
                <div class="row">
                    <form action="con_addsubcategory.php" method="post">
                        <div>
                            <div class="form-group">
                                <label>Sub Category Name</label>
                                <input type="text" name="subcategory_name" class="form-control">
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <select name="category_name" id="" class="form-select">
                                        <option value="" selected disabled>--select--</option>
                                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <option value="<?php echo $row["category_id"] ?>">
                                                <?php echo $row["category_name"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" value="Submit" class="btn btn-submit">
                                <!-- <a href="brand.php" class="btn btn-cancel">Cancel</a> -->
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



</body>
<script>

$(document).ready(function () {
    console.log("jQuery is working, validation script running...");

    $("form").submit(function (e) {
        let isValid = true;
        let categoryName = $("select[name='category_name']").val();
        let subcategoryName = $("input[name='subcategory_name']").val().trim();
        let namePattern = /^[A-Za-z\s]+$/; // Regular expression to allow only letters and spaces

        $(".error-message").remove(); // Remove previous error messages
        console.log("Category Selected:", categoryName);
        console.log("Subcategory Name:", subcategoryName);

        // Validate category selection
        if (!categoryName) {
            $("select[name='category_name']").parent().append("<span class='error-message' style='color: red; font-size: 12px; margin-left:10px;'>Category Name is required</span>");
            isValid = false;
        }

        // Validate subcategory name (required & must contain only letters)
        if (subcategoryName === "") {
            $("input[name='subcategory_name']").after("<span class='error-message' style='color: red; font-size: 12px; margin-left:10px;'>Sub Category Name is required</span>");
            isValid = false;
        } else if (!namePattern.test(subcategoryName)) {
            $("input[name='subcategory_name']").after("<span class='error-message' style='color: red; font-size: 12px; margin-left:10px;'>Only letters are allowed</span>");
            isValid = false;
        }

        if (!isValid) {
            console.log("Form submission prevented due to validation errors.");
            e.preventDefault(); // Prevent form submission
        } else {
            console.log("Form submitted successfully.");
        }
    });
});



</script>

</html>