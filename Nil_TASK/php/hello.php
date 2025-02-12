<?php
$stateind = ["Gujarat","Rajasthan","Delhi","maharastra"];
$stateus = ["california","florida","New york"];

$stateindjson = json_encode($stateind);

if(isset($_POST ["status"])){
    $status = $_POST ["status"];
    $status = trim($status);


    if($status == "India"){
        echo $stateindjson;
        // echo json_encode($stateind);
    }
    elseif($status == "US"){
        echo json_encode($stateus);
    }
}
  
?>