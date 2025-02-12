<?php

class employee{

public $name;
protected $age=20;//protected properties
private $salary=15000;

function set_name($name){ //public function
     $this->name=$name;
}
protected  function set_age(){ //protected function
    echo $this->age;
}
private function get_salary(){
    
    echo $this->salary;

}

}
class info extends employee{ //child class
    function msg(){
        echo "Employee Age is :";
         $this->set_age();
    }
}
$obj= new info();
$obj->msg();

echo "<br>";


//public class:
$obj= new employee();
$obj->set_name("helly");//public 
echo "Employee Name is: " .$obj->name;

// $obj->set_age(20);//error because this function is protected and use own class and derived class.

// $obj->get_salary(12000);//error because this function is private and use only own class.

?>