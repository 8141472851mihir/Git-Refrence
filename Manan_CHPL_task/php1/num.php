<?php
$num = 20;
echo "Star patten <br>";
for($i=1;$i<=$num;$i+=2)
{
    for($j=1;$j<=$i;$j++)
    {
        echo "$j,";
    }
    echo "<br>";
}
?>