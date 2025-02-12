<?php
// Include database connection
include_once('dbcon.php');

// Check if category_id is passed via POST
if (isset($_POST['category_id']) && !empty($_POST['category_id'])) {
    $category_id = $_POST['category_id'];

    // Fetch subcategories for the selected category
    $query = "SELECT * FROM subcategories WHERE category_id = '$category_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Start generating options for the subcategory dropdown
        echo '<option value="">Select Subcategory</option>'; // Default option
        while ($subcategory = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $subcategory['subcategory_id'] . '">' . $subcategory['subcategory_name'] . '</option>';
        }
    } else {
        echo '<option value="">No subcategories available</option>';
    }
}
?>
