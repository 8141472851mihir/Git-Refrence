<?php
session_start();

$_SESSION["color"] = "Black";
$_SESSION["animal"] = "cat";
echo "Session variables are set.<br><br>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Examples</title>
</head>
<?php
    echo "Favorite color is " . $_SESSION["color"] . ".<br>";
    echo "Favorite animal is " . $_SESSION["animal"] . ".<br>";

    // Its Prints the Values Which are Stored in $_Session Variable
    // print_r($_SESSION);

    session_unset();

    session_destroy();

    echo "<br><br>Session Detroyed..."
?>
<body>

</body>

</html>