<?php

function reverseDiagonalPattern($size) {
    for ($row = 1; $row <= $size; $row++) {
        for ($col = 1; $col <= $size; $col++) {
            // Check if the current column is on the reverse diagonal
            if ($col == $size - $row + 1) {
                echo '* ';
            } else {
                echo '  '; // Print space for other positions
            }
        }
        echo PHP_EOL; // Move to the next line after each row
    }
}

// Example: Create a reverse diagonal pattern with size 5
reverseDiagonalPattern(5);

?>
