<?php
    include "conf.php";

    $sql = "select * from users where username = 'John' order by id desc limit 3";
    $result = $conn -> query($sql);
    if( $result -> num_rows > 0){
        while($row = $result -> fetch_assoc() ){
            echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
        }
    }
    else{
        echo "0 results";
    }
?>