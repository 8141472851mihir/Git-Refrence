<?php

class car
{

    public $name;
    public $color;
    function getname($name,$color){
        $this->name=$name;
        $this->color=$color;
    }
}

$obj= new car();
$obj->getname("hundai","white");

echo "Car Name is: ". $obj->name . " And "." Car Color is : " . $obj->color;

?>