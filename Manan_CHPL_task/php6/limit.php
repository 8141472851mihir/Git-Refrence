<?php
require 'connection.php';

$sql = "SELECT * FROM testdata LIMIT 5, 2";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        echo "id: " . $row["id"]. " - Customer Name: " . $row["customer_name"]. "<br> Product name " . $row["product_name"]. "<br> product price" . $row["product_price"]. "<br> product sell". $row["product_sell"] . "<br> buy date :" .$row["product_date"]. "<br>" ;
    }
}
else
{
    echo "0 result";
}
$conn->close();
?>