<?php
require 'conn.php';
$email = 'roh@gmail.com';
$password = 12345;

$sql1 = "SELECT * FROM employee_table where emp_email = '$email';";
$result = mysqli_query($conn, $sql1);
$rowcount = mysqli_num_rows($result);
if ($rowcount > 0) {

  $sql = "SELECT * FROM employee_table WHERE emp_email = '$email' AND password = $password;";
  $result1 = mysqli_query($conn, $sql);
  $rowcount = mysqli_num_rows($result1);


  if ($result1->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<br>whelcome " . $row["emp_name"] . "<br>";
  } else {
    echo "<br>Enter valid password " . $conn->error;
  }
} else {
  echo "<br>enter valid email";
}
$conn->close();
?>

