<?php
include("../connect.php");
if (isset($_GET['DeleteID'])) {

    $id = $_GET['DeleteID'];
    $query = "DELETE FROM product WHERE id = $id";

    $result = mysqli_query($con, $query);

    if ($result) {
        header("location:data_add_display.php");
    } else {
        echo "Error deleting product!" . mysqli_error($con);
    }
}
?>