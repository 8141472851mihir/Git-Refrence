<?php
    include 'conn.php';

    $sql = "INSERT INTO `user` (`name`, `email`, `phone`, `address`, `profession`, `city`, `state`, `price`)
                         VALUES ('John', 'john@gmail.com', '4578125496', 'USA', 'developer', 'LA', 'UK', '45')";

    if ($conn->query($sql) === TRUE){
        echo "<br><br>New record created successfully";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>