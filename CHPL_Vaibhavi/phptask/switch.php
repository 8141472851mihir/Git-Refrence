<?php

function isThursday($day) {
    switch ($day) {
        case "Monday":
            echo "Not Thursday";
            break;
        case "Tuesday":
            echo "Not Thursday";
            break;
        case "Wednesday":
            echo "Not Thursday";
            break;
        case "Thursday":
            echo "Yes, it's Thursday!";
            break;
        case "Friday":
            echo "Not Thursday";
            break;
        case "Saturday":
            echo "Not Thursday";
            break;
        case "Sunday":
            echo "Not Thursday";
            break;
        default:
            echo "Invalid day";
    }
}

// Test the function
$isThursday = isThursday("Thursday");

?>
