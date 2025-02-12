<?php
    include 'conn.php';

    $sql = "SELECT `company_id`, `company_name`, `company_email` FROM `company`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<br><br>id: " . $row["company_id"]. " - Name: " . $row["company_name"]. " "." - Email: " . $row["company_email"]. "<br>";
  }
} else {
  echo "Data Not Found";
}

mysqli_close($conn);
?>