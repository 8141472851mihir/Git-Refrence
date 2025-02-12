<?php

$conn = new mysqli("localhost", "root", "", "Bankdata");

if ($conn->connect_error) {
  die("connection Failed" . $conn->connect_error);
}
// echo "Connected successfully";

//create database

// $sql= "CREATE DATABASE Bankdata";

// if($conn->query($sql)=== true){
//     echo "Database created successfully";
// }else{
//     echo "Error creating database: " . $conn->error;
// }

//create table

// $sql="CREATE TABLE Bankuserdetails(

//     id INT(6) AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(30) NOT NULL,
//     lastname VARCHAR(30) NOT NULL,
//     email VARCHAR(50),
//     city VARCHAR(10),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// ) ";

// if($conn->query($sql)===true){
//     echo "Table created suucessfully!";
// }
// else{
//     echo "Error creating table". $conn->error;
// }

// //insertdata in table

// $sql= "INSERT INTO Bankuserdetails (firstname,lastname,email,city) VALUES ('Helly','patel','helly@yahoo.com','Ahmedabad')";

// if($conn->query($sql)=== true){
//     echo "Data inserted successfully!";
// }
// else{
//     echo "Data not inserted". $conn->error;
// }

// if($conn->query($sql)=== true){

//     $lastid= $conn->insert_id;
//     echo "New Data inserted successfully.";
// }
// else{
//     echo "Error : " . $sql . "<br>" . $conn->error;
// }

//insert multiple data

// $sql= "INSERT INTO   Bankuserdetails (firstname,lastname,email,city) VALUES ('chirag','patel','chirag@yahoo.com','Ahmedabad');";
// $sql.= "INSERT INTO  Bankuserdetails (firstname,lastname,email,city) VALUES ('Heena','Gohil','hina@yahoo.com','Bhavnagar');";
// $sql.= "INSERT INTO  Bankuserdetails (firstname,lastname,email,city) VALUES ('Ravi','panchal','ravi@yahoo.com','Surat')";

// if($conn->multi_query($sql)=== true){
//     echo "New record inserted.";
// }
// else{
//     echo "Error: ".$sql ."<br>". $conn->error;
// }

//select data

// $sql = "SELECT id, firstname, lastname, city FROM Bankuserdetails";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " ". $row["city"] ."<br>";
//   }
// } else {
//   echo "0 results";
// }

// where data

$sql = "SELECT id, firstname, city FROM Bankuserdetails WHERE city='Ahmedabad'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["city"] . "<br>";
  }
} else {
  echo "0 results";
}
echo "<hr>";

echo "<h4>OREDER BY</h4>";

//order by

$sql = "SELECT * FROM Bankuserdetails ORDER BY city DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"] . " City : " . $row["city"] . "<br>";
  }
} else {
  echo "0 results";
}

//delete record

echo "<hr>";

echo "<h4>DELETE RECORD</h4>";
$id = '5';
$did = "SELECT * FROM Bankuserdetails WHERE id='$id'";
$result = $conn->query($did);
if ($result->num_rows > 0) {
  $sql = "DELETE FROM Bankuserdetails WHERE id='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

//update data

echo "<hr>";

echo "<h4>UPDATE RECORD</h4>";

$sql= "UPDATE Bankuserdetails SET city='Anand'WHERE id=2 ";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

?>