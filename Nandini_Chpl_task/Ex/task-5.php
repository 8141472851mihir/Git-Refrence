<?php
$array = [5, 10, 20, 15];

function element($arr) {
    $n = count($arr);

    if ($arr[0]>=$arr[1]) 
    {
        return $arr[0];
    }

    if ($arr[$n-1]>=$arr[$n-2]) 
    {
        return $arr[$n-1];
    }

    for ($i=1;$i<$n-1;$i++) 
    {

        if ($arr[$i]>=$arr[$i-1] && $arr[$i]>=$arr[$i+1]) 
        {
            return $arr[$i];
        }
    }
    
    return 0;
}

$result = element($array);

if ($result != 0) 
{
    echo "Peak element is: " . $result;
} 
else
{
    echo "No peak element found";
}

?>
