<?php
// static mathord
class greeting {
  public static function welcome() {
    echo "Welcome! <br>";
  }
  public static $staticProp = "<br> Bye Bye";
}

// abstract 
// Parent class
abstract class Car {
  public $name;
  public function __construct($name) {
    $this->name = $name;
  }
  abstract public function intro() : string; 
}

// Child classes
class bmw extends Car {
  public function intro() : string {
    return "car : $this->name"; 
  }
}

class honda extends Car {
  public function intro() : string {
    return " car : $this->name"; 
  }
}

class tesla extends Car {
  public function intro() : string {
    return "car : $this->name"; 
  }
}

//trait 
trait message1 {
  public function msg1() {
    echo "<br>OOP in php "; 
  }
}
class Welcome {
  use message1;
}

// interface 
interface Animal {
  public function makeSound();
}

class Dog implements Animal {
  public function makeSound() {
    echo "Bhow";
  }
}

// Call static method
greeting::welcome();

// Create objects from the child classes
$bmw = new bmw("BMW");
echo $bmw->intro();
echo "<br>";

$honda = new honda("Honda");
echo $honda->intro();
echo "<br>";

$tesla = new tesla("Tesla");
echo $tesla->intro();



// trait
$obj = new Welcome();
$obj->msg1();
echo "<br>"; 

// interface 
$animal = new Dog();
$animal->makeSound();

echo greeting :: $staticProp;
?>