<?php
include_once("conf.php");

if (isset($_POST['id'])) {
    $id =$_POST['id'];

    $sql = "DELETE FROM subcategorymaster WHERE subcategory_id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }

    mysqli_close($conn);
}
?>
