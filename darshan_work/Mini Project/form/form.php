<?php
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Input Types Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #666;
        }

        .inp {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>All Input Types Form</h2>
        <form action="qurrey.php" method="POST">
            <label for="name">Name:</label>
            <input class="inp" type="text" id="name" name="name" required>

            <label for="password">Password:</label>
            <input class="inp"type="password" id="password" name="password" required>

            <label for="email">Email:</label>
            <input class="inp" type="email" id="email" name="email" required>
            

            <label for="phone">Phone:</label>
            <input class="inp" type="text" id="phone" name="phone" required>

            <label for="date">Date:</label>
            <input class="inp" type="date" id="date" name="date" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>