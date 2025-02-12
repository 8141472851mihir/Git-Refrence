<?php

for($counter=1;$counter<=100;$counter++)
    {      
        $b=0;
        for($value=1;$value<=$counter;$value++)
        {
            if($counter%$value==0)
            {
                $b=$b+1;
            }
        }

        
        if($b==2)
        {
            echo '<br>'.$counter;
        }
    }
?>