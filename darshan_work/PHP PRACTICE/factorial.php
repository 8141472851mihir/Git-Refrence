<?php
$x=5;
$fact=1;
echo "x=".$x;
echo "<br>";
while($x>0)
{
    $fact=$fact*$x;
    $x--;
}

echo "factorial=". $fact;
?>