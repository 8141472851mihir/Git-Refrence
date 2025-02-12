<?php
   
    $num=100;
    echo "prime number series";
    echo "<br>";

    for ($i = 1; $i <= $num; $i++) {
        $prime = 1;
        if ($i < 2) {
            $prime = 0;
        } else {
            for ($j = 2; $j <= sqrt($i); $j++) {
                if ($i % $j == 0) {
                    $prime = 0;
                    break;
                }
            }
        }
        if ($prime == 1) 
        {
            echo "$i," ;
           
        }
    }

   

?>



