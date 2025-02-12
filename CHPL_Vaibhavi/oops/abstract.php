<?php

abstract class total{
    abstract protected function numbers($num1,$num2);
}
class sum extends total{

    public function numbers($num1, $num2){

        return $num1+$num2;

    }
}
class mul extends total{

    public function numbers($num1,$num2){
        return $num1*$num2;
    }
}
$obj= new sum();
echo"Total numbers sum: ". $obj->numbers(5,2)."<br>";

$obj= new mul();
echo"Total numbers multiplication : ". $obj->numbers(4,2);
?>
