<?php
    include 'conn.php';

    $sql = "UPDATE `company` SET `company_name`='Doe' WHERE `company_id`=2";

if (mysqli_query($conn, $sql)) {
  echo "<br><br>Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>