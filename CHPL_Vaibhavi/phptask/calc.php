<?php

// Input marks for each subject
$physics = 80;
$chemistry = 75;
$biology = 89;
$mathematics = 90;
$computer = 85;

// Calculate total marks
$totalMarks = $physics + $chemistry + $biology + $mathematics + $computer;

// Calculate percentage
$percentage = ($totalMarks / 500) * 100;

// Determine grade based on percentage
if ($percentage >= 90) {
    $grade = 'A';
} elseif ($percentage >= 80) {
    $grade = 'B';
} elseif ($percentage >= 70) {
    $grade = 'C';
} elseif ($percentage >= 60) {
    $grade = 'D';
} elseif ($percentage >= 40) {
    $grade = 'E';
} else {
    $grade = 'F';
}

// Display result
echo "Percentage: " . $percentage . "%\n";
echo "Grade: " . $grade . "\n";

?>
