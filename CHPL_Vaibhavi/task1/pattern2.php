<?php


$num = 0;

for ($i = 0; $i <= 4; $i++) {

    for ($j = 0; $j <= $i; $j++) {
        echo " $num";

        $num= $num+ 1;

    }
    echo "\n" . "<br>";
}

?>