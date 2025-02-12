<?php
include_once("conf.php");

if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];

    // Query to delete the category from the database
    $sql = "DELETE FROM `categorymaster` WHERE `category_id` = $category_id"; // Make sure column name is `category_id`
    if (mysqli_query($conn, $sql)) {
        echo 'success'; // Send success response back to AJAX
    } else {
        echo 'error'; // Send error response back to AJAX
    }
} else {
    echo 'error'; // If no category_id is passed
}
?>
