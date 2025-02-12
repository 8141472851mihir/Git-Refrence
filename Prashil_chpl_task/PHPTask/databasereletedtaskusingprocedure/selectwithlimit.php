<?php
include "config.php";
$sql = "select * from student limit 2 offset 2";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "ID: " . $row['id'] . " Name: " . $row['name'] . " Age: " . $row['age'] . " Address: " . $row['address'] . "<br>";
    }
}
else{
    echo "No record found";
}
?>