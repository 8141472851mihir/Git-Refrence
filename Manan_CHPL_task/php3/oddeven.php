<?php
function cube($x) {
    $n = 1;
    
    for($i = 0; $i < $x; $i++) {
      $n *= $x;
    }
    return $n;
  }
function oddeven($x) {
    $i=0;
    if ($x % 2 == 0)
    {
        $i=1;
    }
    return $i;

 
}
$x = 5; 
$a = oddeven($x);
$b = cube($x);

if ($a==1)
{
    echo $x . " is even <br>"; 
}
else{
    echo $x . " is Odd<br>" ;
}
echo "cube of ". $x. " is :" ;
echo $b;

?>