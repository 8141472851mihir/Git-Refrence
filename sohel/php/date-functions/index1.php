<?php

// include("index2.php");
// require("index2.php");

echo"PHP Date functions in different types of formats :-<br><br>";
echo date("Y - m - d") . "<br>";
echo date("d / m / y") . "<br>";
echo date("l") . "<br>";
echo date("H : i : s") . "<br>";
echo date("h - i - s A") . "<br>";
echo "Now change the format to indian current time : ";
date_default_timezone_set("Asia/Kolkata");
echo date("h - i - s A") . "<br>";
$d = strtotime("12:35 PM 26 January 2025");
echo date("Y-m-d h:i:sA", $d) . "<br>";
$t = strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $t) . "<br>";

?>