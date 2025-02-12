<?php

echo "<h3>Leap years between 1901 to 2016:</h3>";
echo "check=2004"."<br>";
function year_check($Year){
    if($Year% 400==0)
    print("It is a leap year");
    elseif($Year %100==0)
    print("It is not a leap year");
    elseif($Year%4==0)
    print("It is a leap year");
    else
    print("It is not a leap year");
}
$Year=2004;
year_check($Year);
?>
