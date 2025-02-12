<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get</title>
</head>
<body>
<h4>
15)Use $_REQUEST to Collect Data from Both GET and POST
 -Create a form that collects data using both GET and POST methods.
 -After submitting, display the data using the $_REQUEST superglobal
</h4>
<form action="reqServerAction.php" method="GET">
    <label for="name">Name</label>
    <input type="text" name="name"><br>
    <label for="mobile">Mobile</label>
    <input type="text" name="mobile"><br>
    <label for="age">Age</label>
    <input type="text" name="age"><br>
    <label for="email">Email</label>
    <input type="email" name="email"><br>
    <input type="submit" value="submit"></input>
</form>
<br><br>
<?php
echo "<h4>16)Display Server Information Using SERVER
        -Use the SERVER superglobal to display the current script name, 
        server information, and request method.
        </h4>";
    
        echo $_SERVER['SCRIPT_NAME'];
        echo "<br>";
        echo $_SERVER['REQUEST_METHOD'];
?>
</body>
</html>