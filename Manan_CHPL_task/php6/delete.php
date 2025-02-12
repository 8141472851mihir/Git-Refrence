<?php
require 'connection.php';

$sql1 = "SELECT * from testdata where customer_name = 'rudra'";
$result = mysqli_query($conn, $sql1);
$rowcount = mysqli_num_rows($result);
if ($rowcount > 0) {
    $sql = "DELETE FROM testdata WHERE customer_name = 'rudra'";

    if ($conn->query($sql) === TRUE) {
        echo "<br>Record deleted successfully";
    } else {
        echo "<br>Error deleting record: " . $conn->error;
    }
} else {
    echo "data not found";
}

$conn->close();
?>