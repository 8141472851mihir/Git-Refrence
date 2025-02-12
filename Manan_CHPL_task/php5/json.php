<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>json</title>
</head>
<body>
<?php
$name = ["A","B","C"];
$std = ["A"=>10, "B"=>12, "C"=>5];
$jsonobj = '{"A":21,"B":31,"C":41}';
$obj = json_decode($jsonobj);
$class = json_decode($jsonobj,true);
echo json_encode($name) . "<br>";
echo json_encode($std) . "<br>";
var_dump(json_decode($jsonobj));
echo "<br>";
echo $obj->A . "<br>";
echo $obj->B . "<br>";
echo $obj->C . "<br>";
echo $class["A"]. "<br>";
echo $class["B"]. "<br>";
echo $class["C"]. "<br>";

foreach($obj as $key => $value)
{
    echo $key . "=>" . $value . "<br>";
}
?>
    
</body>
</html>