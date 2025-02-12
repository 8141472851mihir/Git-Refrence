<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Hello User</title>
</head>
<body>
<div class="container">
    <div class="card m-3 p-4">
        <div class="row">
        <h2 class="text-center">GET method output</h2>
        Welcome <?php echo $_GET["name"]; ?><br>
        Your Email address is: <?php echo $_GET["email"]; ?><br>
        Your Age is: <?php echo $_GET["age"]; ?><br>
        Your Number is: <?php echo $_GET["number"]; ?><br>
        </div>
    </div>
</div>
    
</body>
</html>
<?php
echo "Script Name :".$_SERVER['SCRIPT_NAME']."<br>";
echo "Server Information :".$_SERVER['SERVER_ADMIN']. "<br>";
echo "Server Port :".$_SERVER['SERVER_PORT']. "<br>";
echo "Method Name :".$_SERVER['REQUEST_METHOD']."<br>";


?>