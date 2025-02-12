<?php
$balances = array(
    array(10.5, 20.3, 15.2, 18.7, 12.8),
    array(25.6, 30.4, 28.9, 22.1, 26.3),
    array(35.9, 40.2, 38.5, 33.7, 36.0)
);
echo "Multi-dimensional array of floats (balances): <br>";
for ($row = 0; $row < 3; $row++) {
    for ($col = 0; $col < 5; $col++) {
        echo $balances[$row][$col] . " ";
    }
    echo "<br>";
}

?>
