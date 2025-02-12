<?php

include 'conn.php';

$id = 13;

$check = "SELECT * FROM user WHERE `user_id` = '$id'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
    $sql = "DELETE FROM `user` WHERE `user_id`= '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<br><br>Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

}else{
    echo "<br><br>No record found";
}

$conn->close();

