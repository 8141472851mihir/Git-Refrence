<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Date And Time()</h2><hr>
<?php

echo "Today Date is : " .date("d-m-Y")."<br>"."<br>";
echo "Today  is : " .date("l")."<br>"."<br>";

date_default_timezone_set("asia/kolkata");
echo "The time is ".date("H:i:sA");
echo "<hr>";

echo "<h2>mk time</h2>";

$date=mktime(9,14,54,5,6,2013);
echo "created Date is :".date("Y-m-d h:i:sA",$date);
echo "<hr>";

echo "<h2>strtotime()</h2>";

$date=strtotime("yesterday");
echo "Yesterday Date is :".date("Y-m-d h:i:sA",$date)."<br>"."<br>";

$date=strtotime("+2week");
echo "Next two week Date is :".date("Y-m-d h:i:sA",$date)."<br>"."<br>";

$date=strtotime("+1month");
echo "Next Month Date is :".date("Y-m-d h:i:sA",$date)."<br>"."<br>";
echo "<hr>";
?>
</body>
</html>
