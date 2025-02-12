<?php


function findLargenum($num1, $num2, $num3) {
    $largest = ($num1 > $num2) ? (($num1 > $num3) ? $num1 : $num3) : (($num2 > $num3) ? $num2 : $num3);
    return $largest;
}

$num1 = 12;
$num2 = 23;
$num3 = 25;

echo "The largest number among $num1, $num2, and $num3 is: " . findLargenum($num1, $num2, $num3);

?>
