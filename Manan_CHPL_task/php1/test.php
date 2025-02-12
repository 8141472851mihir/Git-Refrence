<?php
$str = "today is holiday";
var_dump($str);
echo "<br>";
$i = strlen($str)-1;
$j = 0;
echo "<h2>with while loop</h2>";
echo "<b>string:</b>";
while ($j <= $i) /* print single charecter of string with while loop*/
{
    echo  strtoupper($str[$j]);
    $j++;
}
echo "<br>";
echo "<h2>with for loop</h2>";
echo "<b>string:</b>";
for($j = 0; $j <= $i; $j++) //print singal charecter of string with for loop
{
    echo  strtoupper($str[$j]);
}
echo "<br>";
echo "<h2>Reverce String</h2>";

echo "<b>string:</b>" .strtolower(strrev($str)); //string reverced 

$x = 5;
$y = 5.5;
$z = "5.555";
$q = false; 
$w = array("11","22","33");
echo "<br>";
var_dump($x);
echo "<br>";
var_dump($y);
echo "<br>";
var_dump($z);
echo "<br>";
var_dump($q);
echo "<br>";
var_dump($w);
echo "<br>";
echo substr($str,0,5);
echo "<br>";
echo substr($str,9);
echo "<br>";
echo " \"holiday\"";
echo "<br>";

if ($x===$y)
    {
        echo "data type and value are same";
    }
else
    {
        echo "data type and value are not same";
    }
echo "<br>"

?>
