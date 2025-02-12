<?php
include "config.php";


$sql = "insert into student(name, age, address) values('Rahul', 20, 'Delhi');";
$sql .= "insert into student(name, age, address) values('Suresh', 25, 'Noida');";
$sql .= "insert into student(name, age, address) values('Ramesh', 22, 'Gurugram');";
$sql .= "insert into student(name, age, address) values('Rajesh', 21, 'Ghaziabad');";


if(mysqli_multi_query($conn, $sql)) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
