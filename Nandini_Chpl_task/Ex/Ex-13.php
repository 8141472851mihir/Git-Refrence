<!-- create an array with integer value store it and print it into reverse without using any function.  -->

<?php
$array = [1,2,3,4,5,6,7,8,9,10];

echo "Real Array= ";

foreach ($array as $value) 
{
    echo $value . ' ';
}

echo "<br>";
echo "Reverse Array= ";
$length = count($array);
while ($length > 0) 
{
    $length--;
    echo $array[$length] . ' ';
}
echo "\n";

?>
