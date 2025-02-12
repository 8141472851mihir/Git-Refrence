<?php
include('conn.php');

// $sql = "INSERT INTO user_table (user_firstname, user_lastname, user_email, mobile) VALUES ('Ankit', 'Vasoya', 'ankit@gmail.com','8128786685')";

// if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }



// Get last Id
// if (mysqli_query($conn, $sql)) {
//   $last_id = mysqli_insert_id($conn);
//   echo "New record created successfully. Last inserted ID is: " . $last_id;
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// Insert Multiple
// if (mysqli_multi_query($conn, $sql)) {
//   echo "New records created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// select data from table
// $sql_select = "SELECT user_id, user_firstname, user_lastname FROM user_table WHERE user_lastname = 'Vasoya';
// $result = mysqli_query($conn, $sql_select);

// if (mysqli_num_rows($result) > 0) {
//     // Output data of each row
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "ID: " . $row["user_id"] . " - Name: " . $row["user_firstname"] . " " . $row["user_lastname"] . "<br>";
//     }
// } else {
//     echo "0 results";
// }

// orderby and where
$sql = "SELECT user_id, user_firstname, user_lastname, user_email , mobile FROM user_table ORDER BY user_lastname LIMIT 10"; //WHERE user_lastname = 'Barevadia'
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["user_id"] ."</td><td>". $row["user_firstname"] . " " . $row["user_lastname"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

// delete
// $sql = "DELETE FROM user_table WHERE user_id=48";

// if (mysqli_query($conn, $sql)) {
//   echo "Record deleted successfully";
// } else {
//   echo "Error deleting record: " . mysqli_error($conn);
// }

// update
// $sql = "UPDATE user_table SET user_lastname='Doe' WHERE user_id=42";

// if (mysqli_query($conn, $sql)) {
//   echo "Record updated successfully";
// } else {
//   echo "Error updating record: " . mysqli_error($conn);
// }


mysqli_close($conn);
?>