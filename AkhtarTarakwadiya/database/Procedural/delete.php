<?php
include 'conn.php';


$sql = "DELETE FROM `company` WHERE `company_id`=11";

if (mysqli_query($conn, $sql)) {
    echo "<br><br>Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
