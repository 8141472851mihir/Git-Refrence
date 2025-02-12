<?php

$conn= mysqli_connect("localhost","root","","admin");


if(!$conn){
    die("connection Failed" .mysqli_connect_error());
}
else{
    // echo "connection successfully!";
}

//create database

// $sql="CREATE DATABASE admin";

// if(mysqli_query($conn,$sql)){

//     echo "Database created successfully";
// }else{
//     echo "Error creating Database".mysqli_error($conn);
// }


//create table

// $sql="CREATE TABLE Admindetails(

// id INT(6) AUTO_INCREMENT PRIMARY KEY,
// firstname VARCHAR(30) NOT NULL,
// lastname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// city VARCHAR(10),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// ) ";

// if(mysqli_query($conn,$sql)){

//     echo "Table created successfully!";
// }
// else{
//     echo "Error creating table". mysqli_error($conn);
// }

//insertdata in table

// $sql= "INSERT INTO  Admindetails (firstname,lastname,email,city) VALUES ('Helly','patel','helly@yahoo.com','Ahmedabad')";
// if(mysqli_query($conn,$sql)){
//     echo "Data inserted successfully!";
// }else{
//     echo "Data not inserted". mysqli_error($conn);
// }

// if(mysqli_query($conn,$sql)){

//     $lastid=mysqli_insert_id($conn);
//     echo "New Data inserted successfully.";
// }
// else{
//     echo "Error : " . $sql . "<br>" . mysqli_error($conn);
// }


//insert multiple value

// $sql= "INSERT INTO  Admindetails (firstname,lastname,email,city) VALUES ('chirag','patel','chirag@yahoo.com','Ahmedabad');";
// $sql.= "INSERT INTO  Admindetails (firstname,lastname,email,city) VALUES ('Heena','Gohil','hina@yahoo.com','Bhavnagar');";
// $sql.= "INSERT INTO  Admindetails (firstname,lastname,email,city) VALUES ('Ravi','panchal','ravi@yahoo.com','Surat')";

// if(mysqli_multi_query($conn,$sql)){

//     echo "New record inserted.";
// }else{
//     echo "Error : ". $sql ."<br>". mysqli_error($conn);
// }

// select data

$sql = "SELECT id, firstname, lastname, city FROM Admindetails";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " ". $row["city"] . "<br>";
  }
} else {
  echo "0 results";
}

echo "<hr>";

echo "<h4>where data</h4>";

//where data

$sql = "SELECT id, firstname, city FROM Admindetails WHERE city='Bhavnagar'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["city"]. "<br>";
  }
} else {
  echo "0 results";
}

echo "<hr>";

echo "<h4>OREDER BY</h4>";

//order by

$sql = "SELECT * FROM Admindetails ORDER BY firstname DESC";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"]. "FirstName ". $row["firstname"]. "<br>";
    }
  } else {
    echo "0 results";
}

//delete record
echo "<hr>";

echo "<h4>DELETE RECORD</h4>";
$id = '6';
$did = "SELECT * FROM Admindetails WHERE id='$id'";
$result=mysqli_query($conn,$did);

if(mysqli_num_rows($result)>0){
  $sql = "DELETE FROM Admindetails WHERE id='$id'";
  if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
}

//update data

echo "<hr>";

echo "<h4>UPDATE RECORD</h4>";

$sql= "UPDATE Admindetails SET city='Anand'WHERE id=2 ";
if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

  

mysqli_close($conn);
?>