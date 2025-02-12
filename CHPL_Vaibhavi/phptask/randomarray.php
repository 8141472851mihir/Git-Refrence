<?php

// Original array
$array = [10, 20, 30, 40, 50];

// Get a random key from the array
$randomKey = array_rand($array);

// Get the random value using the random key
$randomValue = $array[$randomKey];

// Print the random value
echo "Random value from the array: $randomValue";

?>
