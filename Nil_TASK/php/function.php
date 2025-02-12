<?php

    echo "<h2>Cube</h2>";

    echo cube();
    function cube(){
        $num = 5;
        $result = $num * $num * $num;
        return $result;
    }


    echo "<h2>odd even</h2>";
    echo oddeven();


    function oddeven(){
        $val = 5;
        if($val % 2 == 0){
            echo "even";
        }else{
            echo "odd number";
        }
    }



    echo "<h2>array multiplication</h2>";
    echo multiply();

   

    function multiply()
    {
        $arr = array(1,2,3,4,5);
        $pro = 1;       
        $n = 5;
        for ($i = 0; $i < $n; $i++) 
            $pro = $pro * $arr[$i];
        return $pro;
    }


?>