<?php
$space = $i = $k = 0;
$j = 10;
for($i = 1; $i <= $j; $i++, $k=0)
    {
        
    for($space = 1; $space <= $j-$i; $space++)
        {
            echo "&nbsp;&nbsp;&nbsp;"; 
        }
    while($k != 2 * $i - 1)
        {
            echo "* ";
            $k++;
        }
        echo "<br>";
    }
?>

