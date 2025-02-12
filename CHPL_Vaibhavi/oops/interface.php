<?php

interface information {
    public function numbers($num1,$num2);
}
class sum implements information{

    public function numbers($num1, $num2){

        return $num1+$num2;

    }
}
class mul implements information{

    public function numbers($num1,$num2){
        return $num1*$num2;
    }
}
$obj= new sum();
echo"Total numbers sum: ". $obj->numbers(5,2)."<br>";

$obj= new mul();
echo"Total numbers multiplication : ". $obj->numbers(4,2);
?>
