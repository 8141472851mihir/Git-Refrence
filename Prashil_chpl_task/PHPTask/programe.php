<?php
    $one = 10;
    $two = 20;
    $sum = $one + $two;

    echo "Sum is ". $sum. "<br>";
    echo "max Number is " .max($one,$two) . "<br>";
    echo "max Number is " .min($one,$two) . "<br>";

    echo "Prime Numebr : " ; 
    function primeCheck($number){
        if ($number == 1)
        return 0;
        for ($i = 2; $i <= $number/2; $i++){
            if ($number % $i == 0)
                return 0;
        }
        return 1;
    }
    // Driver Code
    $number = 7;
    $flag = primeCheck($number);
    if ($flag == 1)
        echo "Prime";
    else
        echo "Not Prime"

    
    
?>