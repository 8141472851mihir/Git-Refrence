<?php
function qube($num)
{
    echo "<h1> CUBE FUNCTION</h1>";
    return $num * $num * $num;
}
function multiplyArray($array)
{
    echo "<h1> MULTIPLICAION FUNCTION</h1>";
    $result = 1;
    foreach ($array as $value) {
        $result *= $value;
    }
    return $result;
}
function oddeven($num)
{
    echo "<h1> ODD EVEN FUNCTION</h1>";

    if ($num % 2 == 0) {
        echo "<h1>" . $num . " is even </h1>";
    } else {
        echo "<h1>" . $num . " is odd </h1>";
    }
}
$ans = qube(20);
echo "<h2> cube of 20 is " . $ans . "</h2>";
$numbers = array(50, 70, 90, 60, 20, 100);
echo "<h2>multiplication of array is ".multiplyArray($numbers) ."</h2>";
oddeven(35);
?>