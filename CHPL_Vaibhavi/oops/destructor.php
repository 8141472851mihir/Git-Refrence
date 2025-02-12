<?php

class numbers{

    public $num1;
    public $num2;


    function __construct($num1,$num2){
      
        $this->num1=$num1;
        $this->num2=$num2;
    }


    function __destruct(){
        echo "The num1 is {$this->num1} And  the num2 is{$this->num2}. ";
        
    }

}
$obj= new numbers(10,12);
?>