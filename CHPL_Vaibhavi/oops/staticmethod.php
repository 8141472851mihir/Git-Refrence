<?php
class morning {
  public static function welcome() {
    echo "Hello World! goodmorning .";
  }
  public function __construct() {
    self::welcome();
  }
}

new morning();
echo "<br>";
morning :: welcome();

echo "<br>";
class A {
    public static function welcome() {
      echo "Hello World!";
    }
  }
  
  class B {
    public function message() {
      A::welcome();
    }
  }
  
  $obj = new B();
  echo $obj -> message(); 

?>