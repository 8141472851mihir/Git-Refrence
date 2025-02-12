<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date && Time Examples...</title>
</head>

<body>
    <?php
    // Date and Time Functions
    echo "Today is " . date("Y/m/d") . "<br>";
    echo "Today is " . date("Y.m.d") . "<br>";
    echo "Today is " . date("Y-m-d") . "<br>";
    echo "Today is " . date("l") . "<br><br><br>";

    // Date and Time Functions
    echo "The time is " . date("h:i:sa") . "<br><br><br>";

    // Date and Time Functions
    date_default_timezone_set("America/New_York");
    echo "The time is " . date("h:i:sa");

    // Create a Date With mktime Function
    echo "<h3>Date With mktime Function</h3>";
    $d = mktime(11, 14, 54, 8, 12, 2014);
    echo "Created date is " . date("Y-m-d h:i:sa", $d);

    // Date From a String With strtotime()
    $d = strtotime("tomorrow");
    echo date("Y-m-d h:i:sa", $d) . "<br>";

    $d = strtotime("next Saturday");
    echo date("Y-m-d h:i:sa", $d) . "<br>";

    $d = strtotime("+3 Months");
    echo date("Y-m-d h:i:sa", $d) . "<br>";
    ?>
</body>

</html>