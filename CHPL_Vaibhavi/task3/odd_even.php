<?php 

function odd_even($num){
    
    if($num%2==0){
       echo "Your number is even";
    }
    else{
        echo "Your number is odd";
    }
    return $num;
}
echo odd_even(5)."<br>";
echo odd_even(2)."<br>";
echo odd_even(num:4)."<br>";
echo odd_even(10)."<br>";
echo odd_even(num: 13)."<br>";

?>