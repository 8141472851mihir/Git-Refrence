<?php
include "config.php";
$id = 17;
$sql2 = "select * from student where id = $id";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
if(mysqli_num_rows($result2) > 0){
    $sql = "Update student set address = 'Mumbai' where id = $id";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        echo "Record updated successfully";
    }
    else{
        echo mysqli_error($conn);
    }
}
else{
    echo "No record found";
}

?>