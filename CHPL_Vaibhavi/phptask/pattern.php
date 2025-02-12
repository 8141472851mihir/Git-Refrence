<?php


function printPattern() {
    for ($row = 1; $row <= 5; $row++) {
        for ($col = 1; $col <= 5; $col++) {
            
            if ($row == 1 || $row == 5 || $col == 0 || $col == 5) {
                echo "*";
            } else {
                echo " ";
            }
        }
        echo "\n"."<br>"; 
    }
}


printPattern();

?>

