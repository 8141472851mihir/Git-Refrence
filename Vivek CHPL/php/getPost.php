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
13)Collect Form Data with $_GET
 -Create a form that collects the user's name ,mobile,age & email using the GET method.
 -After submitting the form, display the name ,mobile,age & email using $_GET
</h4>
<h4>
14)Collect Form Data with $_POST
 -Create a form that collects the user's name ,mobile,age & email using the POST method.
 -After submitting the form, display the name ,mobile,age & email using $_POST	
</h4>
<form action="getPostAction.php" method="post">
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
</body>
</html>