<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('conn.php');

// Insert Data
// $sql = "INSERT INTO user_table (user_firstname, user_lastname, user_email, mobile) VALUES ('Ankit', 'Vasoya', 'ankit@gmail.com','8128786685')";

// if ($conn->query($sql) === TRUE) {
//   echo "Data Inserted successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }


// Last id Code
// if ($conn->query($sql) === TRUE) {
//     $last_id = $conn->insert_id;
//     echo "New record created successfully. Last inserted ID is: " . $last_id;
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }


// insert multiple
// $sql = "INSERT INTO user_table (user_firstname, user_lastname, user_email, mobile)
// VALUES ('jatin', 'changecha', 'jatin@gmail.com',9992265823);";
// $sql .= "INSERT INTO user_table (user_firstname, user_lastname, user_email, mobile)
// VALUES ('Mary', 'Moe', 'mary@gmail.com',9856472360);";
// $sql .= "INSERT INTO user_table (user_firstname, user_lastname, user_email, mobile)
// VALUES ('Dolly', 'patel', 'dolly@gmail.com',8952701460)";

// if ($conn->multi_query($sql) === TRUE) {
//   echo "New records created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }


// prepare and bind
// $stmt = $conn->prepare("INSERT INTO user_table (user_firstname, user_lastname, user_email, mobile) VALUES (? , ? , ? , ?)");
// $stmt->bind_param("sssi", $user_firstname, $user_lastname, $user_email, $mobile);

// // set parameters and execute
// $user_firstname = "Harsh";
// $user_lastname = "Makawana";
// $user_email = "harsh@gmail.com";
// $mobile = 6359135207;
// $stmt->execute();

// $user_firstname = "jurmil";
// $user_lastname = "Kathiriya";
// $user_email = "jurmil.gmail.com";
// $mobile = 6352615966;
// $stmt->execute();

// $user_firstname = "Mukund";
// $user_lastname = "Barevadia";
// $user_email = "mukund@gmail.com";
// $mobile = 9924079603;
// $stmt->execute();

// echo "New records created successfully";
echo "<br>";


// order by
// $sql = "SELECT  user_id, user_firstname, user_lastname, user_email , mobile AS minimum FROM user_table WHERE user_lastname = 'Barevadia'" ;
// $sql = "SELECT  user_id, user_firstname, user_lastname, user_email , mobile AS minimum FROM user_table ORDER BY user_lastname LIMIT 5 " ;
// $sql = "SELECT  min(user_id) AS minimum FROM user_table" ; 
// $sql = "SELECT  max(user_id) AS maximum FROM user_table" ; 
//  $sql = "SELECT  sum(user_id) as sum FROM user_table" ;
 $sql = "SELECT  avg(user_id) as average FROM user_table" ;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Minimum User ID</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["sum"]. "</td></tr>";
        }


    // echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // // output data of each row
    // while ($row = $result->fetch_assoc()) {
    //     echo "<tr><td>" . $row["user_id"] ."</td><td>". $row["user_firstname"] . " " . $row["user_lastname"] . "</td></tr>";
    // }

    echo "</table>";
} else {
    echo "0 results";
}

// if ($result->num_rows > 0) {

//   while($row = $result->fetch_assoc()) {
//     echo "<br>";
//     echo "id: " . $row["user_id"]. " - Name: " . $row["user_firstname"]. " " . $row["user_lastname"]. "<br>";
//     echo "Email: " . $row["user_email"]. "<br>";
//     echo "Mobile: " . $row["mobile"]. "<br>";

//     echo "<br>";
//   }
// } else {
//   echo "0 results";
// }


// delete
// $id = 6; 
// //  Check if the ID exists before deleting
// $sql = "SELECT * FROM user_table WHERE user_id = $id";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // If ID exists, delete the record
//     $delete_sql = "DELETE FROM user_table WHERE user_id = $id";
//     if ($conn->query($delete_sql) === TRUE) {
//         echo "Record with ID $id deleted successfully.";
//     } else {
//         echo "Error deleting record: " . $conn->error;   
//     }
// } else {
//     echo "Error: ID $id not found.";
// }


// $id = 6; // Define the ID to update
// $new_firstname = "UpdatedName"; // New value for update
// $new_lastname = "UpdatedLast"; 
// $new_email = "updated@example.com"; 
// $new_mobile = "9876543210"; 

// // Check if the ID exists before updating
// $sql = "SELECT * FROM user_table WHERE user_id = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $id);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows > 0) {
//     // ID exists, update the record
//     $update_sql = "UPDATE user_table SET user_firstname = ?, user_lastname = ?, user_email = ?, mobile = ? WHERE user_id = ?";
//     $stmt = $conn->prepare($update_sql);
//     $stmt->bind_param("ssssi", $new_firstname, $new_lastname, $new_email, $new_mobile, $id);
    
//     if ($stmt->execute()) {
//         echo "Record with ID $id updated successfully.";
//     } else {
//         echo "Error updating record: " . $conn->error;
//     }
// } else {
//     echo "Error: ID $id not found.";
// }


// $stmt->close();  
$conn->close();

?>
