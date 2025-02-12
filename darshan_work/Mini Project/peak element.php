<?php
$a = array(5, 10, 20, 15);
$arr = [];

for($i=1; $i<count($a)-1; $i++){
    if($a[$i] > $a[$i+1] && $a[$i] > $a[$i-1]) {
        array_push($arr, $a[$i]);
    }
}

var_dump($arr); 
?>