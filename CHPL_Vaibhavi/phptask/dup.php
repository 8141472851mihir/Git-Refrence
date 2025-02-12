<?php

// Original array with duplicate values
$originalArray = [1, 2, 2, 3, 4, 4, 5];

// Remove duplicate values
$uniqueArray = array_unique($originalArray);

// Print the unique array
echo "Original Array: " . implode(", ", $originalArray) . "<br>";
echo "Unique Array: " . implode(", ", $uniqueArray);

?>
