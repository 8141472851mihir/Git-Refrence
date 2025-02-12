<?php

include 'conn.php';

$email = 'akhtar@gmail.com';
$password = '3141';

$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        if ($row['email'] == $email && $row['password'] == $password) {
            echo "<br><br>Login Successfully...<br>";
            echo "<br> Name : " . $row['name'];
            echo "<br> Email : " . $row['email'];
            echo "<br> Phone : " . $row['phone'];
            echo "<br> Address : " . $row['address'];
            echo "<br> Profession : " . $row['profession'];
            echo "<br> City : " . $row['city'];
            echo "<br> State : " . $row['state'];
            echo "<br> Price : " . $row['price'];
        }
    }
} else {
    echo "<br><br>Your Login Credential is Not Correct... Please Enter The Correct Details";
}