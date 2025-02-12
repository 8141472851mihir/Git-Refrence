<?php

echo "Fibonacci series for first 15 numbers:";
$terms = 15;


$first = 0;
$second = 1;


echo "$first, $second";


for ($i = 2; $i < $terms; $i++) {
    $next = $first + $second;
    echo ", $next";
    $first = $second;
    $second = $next;
}

?>
