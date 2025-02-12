<?php
include_once("conf.php");

$sql = "SELECT category_id, category_name FROM categorymaster";
$result = mysqli_query($conn, $sql);

$categories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

echo json_encode($categories);
?>
