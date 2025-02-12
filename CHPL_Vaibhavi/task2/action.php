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

        <p>Welcome <?php echo $_GET["name"]; ?></p>
        <h4>Your Mobile number is: <?php echo $_GET["mo_no"]; ?></h4>
        <h4>Your Age is: <?php echo $_GET["age"]; ?></h4>
        <h4>Your Email is: <?php echo $_GET["email"]; ?></h4>
    </div>
</body>

</html>