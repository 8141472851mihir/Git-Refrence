<?php

echo "JSON Encode and Decode using PHP<br><br>";
$arr = ["Name"=>"Sohel", "Age"=>"22", "City"=>"Ahmedabad"];
print_r($arr);
echo "<br>JSON = " . json_encode($arr) . "<br><br>";

$arr1 = ["Sohel","Jay","Manish"];
print_r($arr1);
echo "<br>JSON = ". json_encode($arr1) . "<br><br>";

$json = '{"Sohel":25, "Jay":30, "Manish":35}';
var_dump($json);
echo "<br>";
var_dump(json_decode($json));
echo "<br>";
echo "<br>";


$json1 = '{"Karan":20, "Rohan":25, "Rahul":30}';
var_dump($json1);
echo '<br>';
var_dump(json_decode($json1, true));

echo '<br>';
echo '<br>';
echo '<br>';

echo "Exception in PHP :-";
echo '<br>';


$n = 4 ;
try{
    if($n %2== 0){
        echo '-> Before throwing exception execute this line<br>';
        throw new Exception('Even number required!');
    }
    echo "Hello freind!";
}catch(Exception $e){
    echo $e->getMessage();
    ;
}



?>