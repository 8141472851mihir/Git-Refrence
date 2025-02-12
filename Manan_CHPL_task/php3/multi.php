<?php

function multi(...$x) {
  $n = 1;
  $len = count($x);
  for($i = 0; $i < $len; $i++) {
    $n *= $x[$i];
  }
  return $n;
}

$a = multi(2,5,8,4,5,6);

echo "Multiplication of array values ";
echo $a;
?>