<?php

$conn = mysqli_connect("localhost", "root", "", "admin");

if (!$conn) {
    die("connection failed " . mysqli_connect_error());
} else {
    // echo "connection successfully!";
}

//create table user

// $sql="CREATE TABLE Userlogindata(

// id INT(6) AUTO_INCREMENT PRIMARY KEY,
// uname VARCHAR(20) NOT NULL,
// email VARCHAR(50),
// password VARCHAR(50),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if (mysqli_query($conn,$sql)){
//     echo "Table created successfully!";
// }else{
//     echo "Error creating table". mysqli_error($conn);
// }

//insert data

// $sql="INSERT INTO Userlogindata (uname ,email,password )VALUES('chirag992','chirag@gmail.com','1234');";
// $sql.="INSERT INTO Userlogindata (uname ,email,password )VALUES('heli2014','heli@gmail.com','1245');";
// $sql.="INSERT INTO Userlogindata (uname ,email,password) VALUES('vaibhu991','vaibhu@gmail.com','1990')";

// if (mysqli_multi_query($conn,$sql)){
//     echo "Registered Successfully!";
// }
// else{
//     echo "Error: ".$sql."". mysqli_error($conn);
// }


echo "<h3>User Details</h3>";



$sql = "SELECT * FROM Userlogindata ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID" . $row['id'] . "username : " . $row['uname'] . " Email: " . $row['email'] . "Password: " . $row['password'] . "<br>";
    }
} else {
    echo "0 results";
}

//login

$name = "chirag992";
$password = "1234";

echo "<h3>User Login</h3>";

$sql = "SELECT uname, password FROM Userlogindata WHERE uname = '$name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $new_name = $row['uname'];
    $new_pass = $row['password'];

    if ($new_name === $name) {
        if ($new_pass === $password) {
            echo "<h3>Welcome!Login Successful!</h3>". "Your username:".$name;
        } else {
            echo "<h4>Password Invalid</h4>";
        }
    }
} else {
    $sql_pass = "SELECT password FROM Userlogindata WHERE password = '$password'";
    $result_pass = mysqli_query($conn, $sql_pass);

    if (mysqli_num_rows($result_pass) > 0) {
        echo "<h4>Username Invalid</h4>";
    } else {
        echo "<h4>Username and Password Invalid";
    }
}

mysqli_close($conn);

?>