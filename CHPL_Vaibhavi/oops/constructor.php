<?php

class numbers{

    public $num1;
    public $num2;


    function __construct($num1,$num2){
      
        $this->num1=$num1;
        $this->num2=$num2;
    }

    function multi(){

        return $this->num1*$this->num2;
    }

}
$obj= new numbers(5,4);
echo "Two numbers $obj->num1 And $obj->num2 multiplications are: ". $obj->multi();

?>