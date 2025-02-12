<?php
function multi($num1, $num2) {
  $res = $num1 * $num2;
  if ($res > 0) {
    throw new Exception("Your result is positive: $res");
  } else {
    echo "Your result is negative" ;
  }
  return $res;
}

try {
  echo " Result: " . multi(5, -3) ;
} catch (Exception $e) {
  echo $e->getMessage()."<br>";
}
finally{
    echo "<br>";
    echo "always execute final block";
}
?>