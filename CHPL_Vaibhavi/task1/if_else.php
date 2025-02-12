<?php

//if else

$a=7;
$y=2;

if($a>$y){

    echo "a is greater b."."<br>";
}

//if..else

$x=10;
$y=5;

if($x < $y){

    echo "x is greater y.";
}
else{
    echo "x is small y." ."<br>";
}

//if..else..elseif

$x=10;
$y=5;

if($x < $y){

    echo "x is small y.";
}
elseif ($y < $x) {
   echo "y is samll"."<br>";
}
else{
    echo "x is greater y." ."<br>";
}

//nested if

$age=20;

if($age>18){
    echo "you are eligible for watting"."<br>";
    if($age<18){
        echo "you are not eligible";
    }
    else{
        echo "you are eligible"."<br>";
    }
}

//ternary Operator 

$a=12;

$b= $age > 12 ?"good afternoon." :"good morning";
echo $b;
?>