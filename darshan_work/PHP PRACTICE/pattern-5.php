<?php
$i=0;
$j=0;

$k=1;
for ($i=1;$i<=3;$i++)
{
    for($j=1;$j<=$i;$j++)
    {
        if($i%2==0)
        {
            echo "0";
        }
        else
        {
            echo "1";
        }
    
    }
    echo "<br>";
}
?>