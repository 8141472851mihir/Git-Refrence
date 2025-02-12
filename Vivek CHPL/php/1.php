<?php

echo "<h3>1. Usage of Max and Min</h3>";
echo "5,10,15,20<br>";
$maxno=max(5,10,15,20);
echo "Max no is : $maxno<br>";
$minno=min(5,10,15,20); 
echo "Min no is : $minno";

echo "<h3>2. Usage of strlen and strrev Function</h3>";
$name="Vivek Savani";
$len=strlen($name);
echo "Vivek Savani<br>";
echo "Length is : $len<br>";

$rev=strrev($name);
echo "Reverse is : $rev";

echo "<h3>3. Usage of Casting</h3>";
$v="vivek 15";
$res=(int)$v;
// echo $res;
var_dump($res);

echo "<h3>4. Usage of Arithmetic and Comparison Operators</h3>";
$a=10;
$b=10;
$sum=$a+$b;
echo "Sum is : $sum";

var_dump($a==$b);

echo "<h3>5. Usage of Constants</h3>";
define("Clg","Gls University");
echo Clg;

echo "<h3>6. Usage of Switch</h3>";
$movie="shiddat";

switch($movie)
{
    case "shiddat":
        {
            echo "Your fav movie is shiddat";
            break;
        }
    case "kgf":
        {
            echo "Your fav movie is kgf";
            break;
        }
    case "salar":
        {
            echo "Your fav movie is salar";
             break;
        }
}
?>