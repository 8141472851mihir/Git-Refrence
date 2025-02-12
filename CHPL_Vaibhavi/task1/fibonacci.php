<?php 
 echo "Fibonacci series:"."<br>";

 $n1=0;
 $n2=1;

  for($i=0;$i<=10;$i++){
     echo "$n1"."<br>";

     $sum=$n1+$n2;
     $n1=$n2;
     $n2=$sum;
  }

?>