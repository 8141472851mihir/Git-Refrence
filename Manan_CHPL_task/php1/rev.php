<?php
$string = "123456";
$rev = "";
$i=strlen($string)-1;
for($i; $i>=0; $i--)
{
    $rev .= $string[$i];
}

echo "oraginal string:". $string . "<br>";
echo "reversed string:". $rev;
?>