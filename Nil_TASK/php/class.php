<?php
    echo "<h2>date && time</h2>";
    echo date("l");
    echo "<br>";
    echo date("y/m/d");
    echo "<br>";
    echo date("h:i:sa");
    echo "<br>";



    //json
    echo "<h2>json encoding decoding</h2>";
    echo "<br>";
    $cars= array("Volvo","Marcedes","BMW","AUDI");

    $a = json_encode($cars);
    echo $a;
    echo "<br>";

    $b = json_decode($a);
    print_r($b);
?>