<?php
$no = 123;
$ans = 0;
echo "Real no=" . $no;
echo "<br>";

while ($no > 0) {
    $ans = ($ans * 10) + ($no % 10);
    $no = (int)($no / 10);  
}

echo "Reverse no=" . $ans;
?>
