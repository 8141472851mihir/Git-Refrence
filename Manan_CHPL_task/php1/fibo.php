<?php
$num = 10;
echo "fibonacci sequence <br>";
$first = 0;
$secound = 1;

echo "$first <br> $secound <br>";

for($i = 0; $i <= $num; $i++)
{
    $next = $first + $secound;
    echo $next . "<br>";
    $first = $secound;
    $secound = $next;
}

?>

