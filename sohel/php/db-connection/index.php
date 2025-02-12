<?php

echo "Procedure base code :- <br>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userDB";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection error : " . mysqli_connect_error());
} else {
    echo "Connection established.<br>";
}






// $createdb = "CREATE DATABASE userDB";
// if(mysqli_query($connection,$createdb)){
//     echo "Database created successfully.";
// }
// else{
//     echo "Error while creating database : " . mysqli_error($connection);
// }






// $usertablecreate = "CREATE TABLE user(
//     id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname varchar(50) NOT NULL,
//     lastname varchar(50) NOT NULL,
//     email varchar(50),
//     date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if(mysqli_query($connection,$usertablecreate)){
//     echo "Table created ";
// }
// else{
//     echo "Error : " . mysqli_error($connection);
// }







$insertdata = "INSERT INTO user (firstname, lastname, email)
VALUES ('Uday','Devnani','uday@gmail.com')";

// if(mysqli_query($connection,$insertdata)){
//     echo "Record inserted successfully";
// }
// else{
//     echo "Error while inserting " . mysqli_error($connection);
// }




$insertdata1 = "INSERT INTO user (firstname, lastname, email)
VALUES ('Uday','Devnani','uday@gmail.com'),
('Fardeen','Mansuri','fardeen@gmail.com'),
('Shubham','Mishra','shubham@gmail.com')";

$insertdata2 = "INSERT INTO user (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";
$insertdata2 .= "INSERT INTO user (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$insertdata2 .= "INSERT INTO user (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";


// if(mysqli_multi_query($connection,$insertdata2)){
//     $lastid = mysqli_insert_id($connection);
//     echo "New recored inserted.<br>Last id = " . $lastid;
// }
// if(mysqli_query($connection, $insertdata1)){
//     echo "4 Records instered";
// }
// else{
//     echo "Something wrong : " . mysqli_error($connection);
// }


// $insertusingprepared = $connection->prepare("INSERT INTO user (firstname,lastname,email) VALUES (?,?,?)");
// $insertusingprepared->bind_param("sss", $firstname,$lastname,$email);

$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
// $insertusingprepared->execute();

$firstname = "Mary";
$lastname = "Moe";
$email = "mary@example.com";
// $insertusingprepared->execute();

$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
// $insertusingprepared->execute();

// echo "New records created successfully";

// $insertusingprepared->close();

$selectalldata = "SELECT * FROM user";
$result = mysqli_query($connection, $selectalldata);

$selectspecificwithwhere = "SELECT firstname,email FROM user WHERE lastname='Dooley' ";
$result1 = mysqli_query($connection, $selectspecificwithwhere);

$selectwithorderby = "SELECT * FROM user ORDER BY lastname DESC ";
$result2 = mysqli_query($connection, $selectwithorderby);

$selectmin = "SELECT MIN(id) FROM user";
$result3 = mysqli_query($connection, $selectmin);

// if(mysqli_num_rows($result3) > 0){
//     while($row = mysqli_fetch_assoc($result3)){
//         echo "Id: " . $row["id"] . ", First Name: " . $row["firstname"] . ", Last Name: ". $row["lastname"] . ", Email: ". $row["email"] . "<br>";
//     }
// }
// else{
//     echo "No record found!!";
// }

// if(mysqli_num_rows($result1) > 0){
//     while($row = mysqli_fetch_assoc($result1)){
//         echo "First Name: " . $row["firstname"] . ", Email: ". $row["email"] . "<br>";
//     }
// }
// else{
//     echo "No record found!!";
// }

$id = 18;


// $deleterecord = "DELETE FROM user WHERE id = 19";
// if(mysqli_query($connection,$deleterecord)){
//     echo "Record deleted successfully.";
// }
// else{
//     echo "Error occured : " . mysqli_error($connection);
// }
$deleterecord = "DELETE FROM user WHERE id = 18";
// if (mysqli_query($connection, $deleterecord)) {
//     if (mysqli_affected_rows($connection) > 0) {
//         echo "Record deleted successfully.";
//     } else {
//         echo "Record already deleted or does not exist.";
//     }
// } else {
//     echo "Error occurred: " . mysqli_error($connection);
// }





$updatename = "UPDATE user SET firstname = 'Manish' WHERE id = 17";

// if (mysqli_query($connection, $updatename)) {
//     if (mysqli_affected_rows($connection) > 0) {
//         echo "Record updated successfully";
//     } else {
//         echo "Record already updated or does not exist";
//     }
// } else {
//     echo "Something wrong : " . mysqli_error($connection);
// }


$selectwithlimit = "SELECT * FROM user LIMIT 5 OFFSET 10";
$result3 = mysqli_query($connection, $selectwithlimit);

// if(mysqli_num_rows($result3) > 0){
//     while($row = mysqli_fetch_assoc($result3)){
//         echo "Id: " . $row["id"] . ", First Name: " . $row["firstname"] . ", Last Name: ". $row["lastname"] . ", Email: ". $row["email"] . "<br>";
//     }
// }
// else{
//     echo "No record found!!";
// }
