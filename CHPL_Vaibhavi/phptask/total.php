<?php
$numbers = [10, 20, 30, 60, 50];
$total = 0;


for ($i = 0; $i < count($numbers); $i++) {
    $total= $total+ $numbers[$i];
}
echo "Total: $total";

?>
