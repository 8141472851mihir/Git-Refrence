<?php
trait morningmsg {
  public function msg1() {
    echo "Hello! good morning. "; 
  }
}

trait evening {
  public function msg2() {
    echo "Hi! good evening."; 
  }
}

class Welcome {
  use morningmsg , evening;
}

$obj = new Welcome();
$obj->msg1();
echo "<br>";
$obj->msg2();




?>
 