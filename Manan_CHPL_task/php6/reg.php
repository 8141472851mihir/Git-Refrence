<?php
require 'conn.php';
$name = 'm';
$address ="ahemdabad";
$number = 8585858585;
$email = 'ohi1@gmail.com';
$password = "456456";
$age = 35;
$date = '12-12-2020';
$company = "bajaj";
$job = "manager";
$exp = 10;
$gender = "male";
$edu = "mba";
$city ="ahemdabad"; 


$sql1 = "SELECT * FROM employee_table where emp_email = '$email';";
$result = mysqli_query($conn, $sql1);
$rowcount = mysqli_num_rows($result);
if ($rowcount > 0) {
    echo "<br>data exist";
 
} else {
    $sql = "INSERT INTO employee_table(emp_name,emp_address,emp_number, emp_email, password, emp_age, emp_joindate, emp_company, emp_job, emp_experience, emp_gender, emp_education, emp_city) VALUES ('$name','$address',$number,'$email',$password,$age,'$date','$company','$job',$exp,'$gender','$edu','$city');";
    $result1 = mysqli_query($conn, $sql);
    
      if ($conn->query($sql) === TRUE) {
        echo "<br>data inserted";
      } else {
        echo "<br>data not inserted" . $conn->error;
      }
}
$conn->close();
?>

