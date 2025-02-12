<?php
include "config.php";
$sql = "insert into student(name,age,address) values('Rahul',20,'Delhi')";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo mysqli_insert_id($conn)."<br>";
    echo "Data inserted successfully";
} else {
    echo mysqli_error($conn);
}

?>