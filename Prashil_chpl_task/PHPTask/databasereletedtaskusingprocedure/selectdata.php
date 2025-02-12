<?php
include "config.php";

$sql = "select * from student";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        echo "ID: " . $row['id'] . " Name: " . $row['name'] . " Age: " . $row['age'] . " Address: " . $row['address'] . "<br>";
    }
}
else{
    echo "no record found";
}
?>