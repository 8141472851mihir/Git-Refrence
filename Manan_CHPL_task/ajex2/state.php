<?php

$india = ["Gujarat", "UP", "MP", "Delhi", "Rajesthan"];
$china = ["Anhui", "Fujian", "Gansu"];
$unitedstate = array("Alabama", "Alaska", "Arizona");
$indiastate =  json_encode($india);
$chinastate =  json_encode($china);
$usstate =  json_encode($unitedstate);


if (isset($_POST["status"])) {
    // echo "hello";
    $states = $_POST["status"];

    if ($states == "india") {
            echo $indiastate;
    }
    if ($states == "china") {
        
        echo $chinastate;
    }
    if ($states == "unitedstate") {
        echo $usstate;
    }
}

?>