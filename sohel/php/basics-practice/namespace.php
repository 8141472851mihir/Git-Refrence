<?php

include("first.php");
include("second.php");

class Names{
    function print(){
        echo "This print funtion of main class";
    }
}

$obj = new first\Name();
echo "<br>";
$obj1 = new second\Name();
echo "<br>";
$obj3 = new Names();
$obj3->print();
echo "<br>";
?>