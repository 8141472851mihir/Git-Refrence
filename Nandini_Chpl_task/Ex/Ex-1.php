<!-- Write a program to compare between things that are not integers. Suppose the strings are
$str1 = "00004";
$str2 = "008";
$str3 = "00007-STR"; -->


<?php

$str1 = "00004";
$str2 = "008";
$str3 = "00007-STR";

if($str1 == $str2) 
{
    echo "$str1 is equal to $str2\n";
} 
else 
{
    echo "<br>";
    echo "$str1 is not equal to $str2\n";
}

if($str1 == $str3) 
{
    echo "<br>";
    echo "$str1 is equal to $str3\n";
} 
else 
{
    echo "<br>";
    echo "$str1 is not equal to $str3\n";
}

if($str2 == $str3) 
{
    echo "<br>";
    echo "$str2 is equal to $str3\n";
} 
else 
{
    echo "<br>";
    echo "$str2 is not equal to $str3\n";
}

?>
