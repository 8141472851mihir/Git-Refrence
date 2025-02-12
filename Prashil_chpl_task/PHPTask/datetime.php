<?php
    date_default_timezone_set("asia/kolkata");
    echo "Today is ". date("y/m/d") ."<br>";
    echo "Today is ". date("Y/M/D") ."<br>";
    echo "Today is ". date("Y/m/d") ."<br>";
    echo "Today is ". date("Y M D") ."<br>";
    echo "Today is ". date("Y-M-D") ."<br>";
    echo "Today is ". date("Y.M.D") ."<br>";
    echo "Today is ". date("l") ."<br>";
    echo "Current year is ". date("y") ."<br>";
    echo "Current year is ". date("Y") ."<br>";
    echo "Current Month is ". date("m") ."<br>";
    echo "Current Month is ". date("M") ."<br>";
    echo "day of month is   ". date("d") ."<br>";
    echo "The time is ". date("h:i:sa") ."<br>";
    echo "The time is ". date("H:i:sA") ."<br>";
    $d=mktime(18,20,33,12,18,2003);
    echo "Created date is ". date("Y-m-d H-i-sA",$d) ."<br>";
    $d=mktime(18,20,33,12,18,2003);
    echo "Created date is ". date("y-m-d h-i-sa",$d) ."<br>";
    $a = strtotime("tomorrow");
    echo "Tomorrow date is ". date("y-m-d h-i-sa",$a) ."<br>";
    $a = strtotime("tomorrow");
    echo "Tomorrow date is ". date("Y-m-d H-i-sA",$a) ."<br>";
    $a = strtotime("+3month");
    echo "3 month after date is ". date("y-m-d h-i-sa",$a) ."<br>";
    $a = strtotime("yesterday");
    echo "3 month after date is ". date("y-m-d h-i-sa",$a) ."<br>";
?>