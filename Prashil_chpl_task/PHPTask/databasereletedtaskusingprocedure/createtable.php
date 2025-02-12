<?php
 include "config.php";

 $sql = "create table student(
     id int(10) auto_increment primary key,
     name varchar(50),
     age int(10),
     address varchar(50)
 )";

 $result = mysqli_query($conn,$sql);
if($result)
{
    echo "Table created successfully";
}
else{
    echo mysqli_error($conn);
}
?>