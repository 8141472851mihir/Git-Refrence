<?php
require 'connection.php';
$sql1 = "SELECT * FROM testdata where product_price = 50000";
$result = mysqli_query($conn, $sql1);
$rowcount = mysqli_num_rows($result);
if ($rowcount > 0) { 

$sql = "UPDATE testdata SET product_price = 40000 WHERE product_price = 50000;";


 
if ($conn->query($sql) === TRUE) {
    echo "<br>Record updated successfully";
  } else {
    echo "<br>Error updating record: " . $conn->error;
  }
} else {
    echo "<br>Data not found";
}
  $conn->close();
?>