<?php
include('conn.php');

// Login
$name = "Darshan";
$password = "12345678900";
$email = "darshan@gmail.com";

$select_query = "SELECT * FROM employee_details WHERE (emp_name = '$name' AND emp_password = '$password') OR (emp_email = '$email' AND emp_password = '$password')";


$result = mysqli_query($conn, $select_query);

if (mysqli_num_rows($result) > 0) {
    // echo "login Successfully <br>";
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "Loging Successfully<br>";
        echo "Name: " . $row['emp_name']."- E-mail" . $row['emp_email'] . " - Password: " . $row['emp_password'] . "<br>";
    }
}else{
    echo "No results Found <br>  Please register your self";
}

?>