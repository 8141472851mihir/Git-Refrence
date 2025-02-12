
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>date and time</title>
</head>
<body>
<?php
date_default_timezone_set("asia/kolkata");
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l") . "<br>";
echo "Current year " . date("y") . "<br>";
echo "Current month " . date("m") . "<br>";
echo "The time is " . date("h:i:sa") . "<br>";
echo "The time is " . date("H:i:sA") . "<br>";


$d=mktime(13, 50, 60, 10, 22, 2003);
echo "Created date is:" . date("Y-m-d H:i:sA", $d) . "<br>";

$c=strtotime("10:30pm oct 22 2003");
echo "Created date is:" . date("Y-m-d H:i:sA", $c) . "<br>";

$a=strtotime("tomorrow");
echo "Tomorrow Date:" . date("Y-m-d H:i:sA", $a) . "<br>";

$z=strtotime("+3month");
echo "Three month after date:" . date("Y-m-d H:i:sA", $z) . "<br>";

$v=strtotime("yesterday");
echo "Yesterday date : " . date("Y-m-d H:i:sA", $v) . "<br>";
?>
    
</body>
</html>