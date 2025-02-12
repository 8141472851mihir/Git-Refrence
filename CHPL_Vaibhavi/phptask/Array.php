<?php

//1. numeric array:
$animal=array("cat","dog","cow");
{
    $jsonstring='["cat","dog","cow"]';
    $array=json_decode($jsonstring);
}
    echo "1.Numeric array:"."<br>";
    echo $array[0]."<br>";
    echo $array[1]."<br><br>";
//2. Associative array:
$associativeArray = array("name" => "helly", "age" => 10, "city" => "New York");
{
    $jsonstring='{"name" : "helly", "age" :10, "city": "New York"}';
    $array=json_decode($jsonstring,true);
}
echo "2. Associative array:"."<br>";
echo $array["name"]."<br>";
echo $array["age"]."<br>";
echo $array["city"]."<br><br>";
//3. Multidimensional Array:
$multiArray = array(
    array("apple", "banana", "cherry"),
    array(10, 20, 30),
    array("John" => 25, "Jane" => 30, "Jim" => 35)
);
{
$jsonString = '[["apple", "banana", "cherry"], [10, 20, 30], {"John": 25, "Jane": 30, "Jim": 35}]';


$arrayFromJson = json_decode($jsonString, true);
}
echo "3. Multidimensional Array :<br>";
echo $arrayFromJson[0][0] . "<br>";
?>
