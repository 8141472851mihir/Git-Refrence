<?php
for ($i = 0; $i < 5; $i++) {
    echo "Hello" . "<br>";
}

//while loop

$a = 5;
echo "while loop";
while ($a <= 10) {
    echo "$a" . "<br>";
    $a++;
}

//do while loop

$i = 1;
echo "dowhile loop" . "<br>". "<br>";
do {
    echo "$i" . "<br>";
    $i++;
} while ($i <= 10);

///break statement
echo "break statement" . "<br>". "<br>";
for ($x = 0; $x <= 10; $x++) {
    if ($x == 3)
        break;
    echo "The number is: $x <br>";
}

///continue statement
echo "continue statement" . "<br>". "<br>";
for ($x = 0; $x <= 10; $x++) {
    if ($x == 3)
        continue;
    echo "The number is: $x <br>";
}

//foreach statement
echo "Foreach Statement". "<br>". "<br>";
$Fruits = array("Apple", "Banana", "Orange", "Grapes");

foreach ($Fruits as $x) {
    echo "$x <br>";
}


?>