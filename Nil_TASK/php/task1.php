<?php
    $age = 25;

    switch($age){
        case ($age<18):
            echo "You are not eligible for voting.";
            break;
        
        case ($age>18):
            echo "You are eligible for voting.";
            break;
    }

    global $a, $b;
    $a = 10;
    $b = 10;
    
    function sum($a, $b) {
        $c = $a + $b;
        echo $c;
    }
    
    sum($a, $b);
?>

