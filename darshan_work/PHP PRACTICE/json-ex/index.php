<?php

$json_decode = '{"Akhtar":22, "Ankit":30, "Jay":27}';
echo "<b>Json : </b>";
print_r($json_decode);
echo "<br>";
echo "<b>Array : </b>";
print_r(json_decode($json_decode)); //false print Object
echo "<br><br>";

$array1_encode = ["Darshan","Ankit","Raj"];
echo "<b>Array : </b>";
print_r($array1_encode);
echo "<br>";
echo "<b>Json : </b>";
print_r(json_encode($array1_encode)) . "<br><br>";
echo "<br><br>";