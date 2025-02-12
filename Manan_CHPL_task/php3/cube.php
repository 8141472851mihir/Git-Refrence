<?php

function cube($x) {
  $n = 1;
  
  for($i = 0; $i < $x; $i++) {
    $n *= $x;
  }
  return $n;
}
$x = 3;
$a = cube($x);

echo "cube of ". $x. " is :" ;
echo $a;
?>