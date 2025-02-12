<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $name=$_REQUEST['name'];
        echo $name;
        echo "<br>";
        $mobile=$_REQUEST['mobile'];
        echo $mobile;
        echo "<br>";
        $age=$_REQUEST['age'];
        echo $age;
        echo "<br>";
        $email=$_REQUEST['email'];
        echo $email;
    ?>
</body>
</html>