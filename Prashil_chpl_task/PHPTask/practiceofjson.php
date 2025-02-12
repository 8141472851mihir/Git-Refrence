<?php
$pinfo = array(
    array("name" => "prashil", "age" => 18, "city" => "morbi"),
    array("name" => "shrut", "age" => "22", "city" => "Rajkot"),
    array("name" => "darshan", "age" => "25", "city" => "junagadh")
);

echo json_encode($pinfo)."<br>";

$car = array("BMW","FERRARI","MG HECTOR");
echo json_encode($car)."<br>";

$jobj = '{"name":"prashil","age":18,"city":"morbi"}';
print_r(json_decode($jobj,true));
echo "<br>"; 

$jsonobj = '{"name":"shrut","age":"22","city":"Rajkot"}';
$obj = json_decode($jsonobj);
echo $obj->name . "<br>";
echo $obj->age. "<br>";
echo $obj->city. "<br>";

$arr = json_decode($jsonobj,true);
echo $arr["name"] ."<br>";
echo $arr["age"]."<br>";
echo $arr["city"]."<br>";

$jsonobj = '{"name":"darshan","age":"25","city":"junagadh"}     ';

$obj = json_decode($jsonobj);

foreach($obj as $key => $value) {
  echo $key . " => " . $value . "<br>";
}


?>