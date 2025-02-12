<?php
    echo "<h3>Fibonacci series</h3>";
    $n1=0;
    $n2=1;
    for($i=1;$i<10;$i++)
    {
        echo $n1.", ";
        $n3=$n1+$n2;
        $n1=$n2;
        $n2=$n3;
    }

    echo "<h3>* Pattern</h3>";
    for($i=0;$i<5;$i++)
    {
        for ($k=0; $k<5-$i-1; $k++)
        {
            echo "&nbsp";
        }
        for($j=0;$j<=$i;$j++)
        {
            echo "* ";
        }
        echo "<br>";
    }

    echo "<h3>Pattern</h3>";
    $k=1;
    for($i=0;$i<4;$i++)
    {
        for($v=0;$v<4-$i-1;$v++)
        {
            echo "&nbsp";
        }
        for($j=0;$j<=$i;$j++)
        {
            echo "$k ";
            $k++;
        }
        echo "<br>";
    }

    echo "<h3>Reverse Without Function</h3>";
    $str="vivek savani";
    $len=strlen($str);

    for($i=($len-1);$i>=0;$i--)
    {
        echo $str[$i];
    }
?>