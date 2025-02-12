<?php
    include "conf.php";

    $sql = "create table users_data(
        id int(11) auto_increment primary key,
        username varchar(50) not null,
        phoneno bigint(10) not null,
        email varchar(50) not null,
        password varchar(50) not null,
        created_at timestamp default current_timestamp
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