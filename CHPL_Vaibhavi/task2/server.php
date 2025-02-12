<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Welcome our Page</h1>
    </div>
    <?php
    echo "Script Name: ".$_SERVER['SCRIPT_NAME'];
    echo "<br>";
    echo "Server Information: ".$_SERVER['SERVER_NAME'];
    echo "<br>";
    echo "Request Method: ".$_SERVER['REQUEST_METHOD'];
    ?>
</body>

</html>