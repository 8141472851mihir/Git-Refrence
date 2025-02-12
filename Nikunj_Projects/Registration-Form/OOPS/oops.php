<!DOCTYPE html>
<html>
<body>

<?php


// <<<<<<<<<-------------class/object----------->>>>>>>>>>

echo "<h2> class/object </h2> ";

class company {
    // Properties
    public $name;
    public $city;
  
    // Methods
    function set_name($name) {
      $this->name = $name;
    }
    function get_name() {
      return $this->name;
    }
  }
  
  $CHPL = new company();
  $Ahmedabad = new company();
  $CHPL->set_name('CHPL');
  $Ahmedabad->set_name('Ahmedabad');
  
  echo $CHPL->get_name();
  echo "<br>";
  echo $Ahmedabad->get_name();
  
// <<<<<<<<<<-------------CONSTRUCTOR-------------->>>>>>>>>>

echo "<h2> CONSTRUCTOR </h2> ";

class info {
  public $employee_name;
  public $position;

  function __construct($employee_name, $position) {
    $this->employee_name = $employee_name; 
    $this->position = $position; 
  }
  function get_employee_name() {
    return $this->employee_name;
  }
  function get_position() {
    return $this->position;
  }
}

$data = new info("Nikunj ", "Php");
echo $data->get_employee_name();
echo $data->get_position();

echo "<br><br>";

  

//   <<<<<<<<<<-------------INHERITANCE---------->>>>>>>>>>>>>

echo "<h2> INHERITANCE </h2> ";


class information {
    public $employee_name;
    public $position;
    
    public function __construct($employee_name, $color) {
      $this->employee_name = $employee_name;
      $this->position = $position; 
    }
    public function intro() {
      echo "The fruit is {$this->employee_name} and the color is {$this->position}."; 
    }
  }
      
  class location extends info {
    public $location;
    public function __construct($employee_name, $position, $location) {
      $this->employee_name = $employee_name;
      $this->position = $position;
      $this->location = $location; 
    }
    public function intro() {
      echo "My Name is {$this->employee_name}, I'm work on {$this->position}, in {$this->location} company."; 
    }
  }
  
  $location = new location("Nikunj", "Php", "CHPL");
  $location->intro();


  echo "<br><br>";

// <<<<<<<<<<------------Constant------------->>>>>>>>>>>>

echo "<h2> Constant </h2> ";
  class hello {
    const message = "Hello World !";
    public function hello1() {
      echo self::message;
    }
  }
  
  $hello = new hello();
  $hello->hello1();

  echo "<br><br>";
  

// <<<<<<<<<<------------ABSTRACT----------->>>>>>>>>>>


echo "<h2> ABSTRACT </h2> ";


  abstract class mycompany {
    public $name;
    public function __construct($name) {
      $this->name = $name;
    }
    abstract public function intro() : string; 
  }
  
  // Child classes
  class myco extends mycompany {
    public function intro() : string {
      return "$this->name!    is a chpl product"; 
    }
  }
  
  class mysociety extends mycompany {
    public function intro() : string {
      return "$this->name!   is a chpl product"; 
    }
  }
  
  class myassociation extends mycompany {
    public function intro() : string {
      return "$this->name!   is a chpl product"; 
    }
  }
  
  // objects from the child classes
  $myco = new myco("myco");
  echo $myco->intro();
  echo "<br>";
  
  $mysociety = new mysociety("mysociety");
  echo $mysociety->intro();
  echo "<br>";
  
  $myassociation = new myassociation("myassociation");
  echo $myassociation->intro();



// <<<<<<<<-------------INTERFACE------------->>>>>>>>>>>>


echo "<h2> INTERFACE </h2> ";


// Interface definition
interface Animal {
    public function makeSound();
  }
  
  // Class definitions
  class Cat implements Animal {
    public function makeSound() {
      echo " Meow ";
    }
  }
  
  class Dog implements Animal {
    public function makeSound() {
      echo " Bark ";
    }
  }
  
  class Mouse implements Animal {
    public function makeSound() {
      echo " Squeak ";
    }
  }
  
  //list of animals
  $cat = new Cat();
  $dog = new Dog();
  $mouse = new Mouse();
  $animals = array($cat, $dog, $mouse);
  
  // animals sound
  foreach($animals as $animal) {
    $animal->makeSound();
  }

// <<<<<<<<<<<------------STATIC------------>>>>>>>>>>>>

echo "<h2> STATIC </h2> ";


class greeting {
  public static function welcome() {
    echo "Hello World!";
  }
  public function __construct() {
    self::welcome();
  }

}
  greeting::welcome();


// <<<<<<<<-------TRAIT--------->>>>>>>>>

echo "<h2> TRAIT </h2> ";


trait message1 {
  public function msg1() {
    echo "Hello"; 
  }
}

trait message2 {
  public function msg2() {
    echo "Good Afternoon"; 
  }
}

class Welcome {
  use message1;
}

class Welcome2 {
  use message1, message2;
}

$obj = new Welcome();
$obj->msg1();
echo "<br>";


$obj2 = new Welcome2();
$obj2->msg2();


  //<<<<<<<<<------------ DESRRUCTURE -------------->>>>>>>>>>>>>>

echo "<h2> DESRRUCTURE </h2> ";


class mydata {
    // Properties
    var $employee_name;
    var $position;
  
    // Methods
    function __construct($employee_name, $position) {
      $this->employee_name = $employee_name;
      $this->position = $position;
    }
    function __destruct() {
      echo "My name is {$this->employee_name} and I'm work on {$this->position}.";
    }
  }  
  $mydata = new mydata("Nikunj", "Php");


?>
 
</body>
</html>
