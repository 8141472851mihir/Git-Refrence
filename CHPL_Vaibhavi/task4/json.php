<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>json_encode and json_decode</h2>
<?php
echo " <h3>Json encode data: </h3>";
$age = ["Helly"=>11,"Jiya"=>3,"Niyati"=>5];

echo json_encode($age)."<br>";

 echo "<hr>";
 echo "<h2>json_decode</h2>";
 echo " <h3>Json decode data: </h3>";
 $jsonobj='[
    {"Helly":12,"jiyashi":3,"Niyati":5},
    {"chirag":32,"vishal":34,"purva":28},
    {"Dixit":32,"jiyansh":1,"Ashu":23}
    ]';
 $newarr=json_decode($jsonobj,true);
 print_r($newarr);

 foreach ($newarr as $new){
  
    foreach($new as $d=>$value){
        echo "$d : $value"."<br>";
    }

 }

?>
<hr>
<?php include("datetime.php");?>
</body>
</html>