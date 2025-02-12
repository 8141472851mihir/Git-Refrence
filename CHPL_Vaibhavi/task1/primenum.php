<?php
echo "prime Number first 20 number:" . "<br>";

$n = 20;

for ($i = 2; $i <= $n; $i++) {

  $isprime = true;

  for ($j = 2; $j < $i; $j++) {
    if ($i % $j == 0) {
       $isprime= false;
       break;
    }
  }
  if($isprime){
    echo "$i" ."<br>";
  }


}

?>