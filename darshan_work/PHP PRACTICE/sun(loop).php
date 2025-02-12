<?php
$no=456;
$ans=0;
echo "no=".$no;
echo "<br>";
while($no>0)
{
    $ans=$ans+($no%10);
    $no=$no/10;
}
echo $ans; 
?>