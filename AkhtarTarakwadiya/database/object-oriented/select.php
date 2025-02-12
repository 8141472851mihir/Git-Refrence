<?php
include 'conn.php';

echo "<br><br>";
$select = "SELECT * FROM `user` ORDER BY `user_id` LIMIT 5";

$resule = $conn->query($select);

if ($resule->num_rows > 0) {

    while ($row = $resule->fetch_assoc()) {
        echo "<br>id: " . $row["user_id"] . " - Name : " . $row["name"] . " || Email :  " . $row["email"] . "|| Phone :  " . $row["phone"] . "|| Address :  " . $row["address"] . "|| Profession :  " . $row["profession"] . " || City :  " . $row["city"] . "  || State :  " . $row["state"] . "|| Price :  " . $row["price"] . "<br><br>";
    }
} else {
    echo "Data Not Found";
}

echo "<br><br><br><br><br>";


echo "<br><h3>Where Condition</h3><br>";
$select = "SELECT * FROM `user` WHERE `price` = 150";

$resule = $conn->query($select);

if ($resule->num_rows > 0) {

    while ($row = $resule->fetch_assoc()) {
        echo "<br>id: " . $row["user_id"] . " - Name: " . $row["name"] . " || Email :  " . $row["email"] . " || Phone :  " . $row["phone"] . " || Address :  " . $row["address"] . " || Profession :  " . $row["profession"] . " || City :  " . $row["city"] . "  || State :  " . $row["state"] . " || Price :  " . $row["price"] . "<br><br>";
    }
} else {
    echo "Data Not Found";
}

echo "<br><br><br><br><br>";

echo "<br><h3>Min && Max && Average && Sum Of Price Field</h3>";

// Using Min Function
$select = "SELECT MIN(price) AS minimum FROM `user`";

$resule = $conn->query($select);

if ($resule->num_rows > 0) {

    while ($row = $resule->fetch_assoc()) {
        echo "Minimum : " . $row["minimum"] . "<br><br>";
    }
} else {
    echo "Data Not Found";
}

// Using MAX() function
$select = "SELECT MAX(price) AS maximum FROM `user`";

$resule = $conn->query($select);

if ($resule->num_rows > 0) {

    while ($row = $resule->fetch_assoc()) {
        echo "Maximum : " . $row["maximum"] . "<br><br>";
    }
} else {
    echo "Data Not Found";
}

// Using AVG() function
$select = "SELECT AVG(price) AS Average FROM `user`";

$resule = $conn->query($select);

if ($resule->num_rows > 0) {

    while ($row = $resule->fetch_assoc()) {
        echo "Average : " . $row["Average"] . "<br><br>";
    }
} else {
    echo "Data Not Found";
}

// Using Sum Function
$select = "SELECT SUM(price) AS Total FROM `user`";

$resule = $conn->query($select);

if ($resule->num_rows > 0) {

    while ($row = $resule->fetch_assoc()) {
        echo "Total : " . $row["Total"] . "<br><br>";
    }
} else {
    echo "Data Not Found";
}


// Using Coubt Function
$select = "SELECT COUNT(user_id) AS Count FROM `user`";

$resule = $conn->query($select);

if ($resule->num_rows > 0) {

    while ($row = $resule->fetch_assoc()) {
        echo "Total Users : " . $row["Count"] . "<br><br>";
    }
} else {
    echo "Data Not Found";
}
