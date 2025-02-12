<?php

    $name = $email = $cname = $password = $gender = $posi = "";

    if ($_SERVER["REQUEST_METHOD"] == ["POST"]) {
        print_r($_POST);
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["[password]"]);
        $cname = test_input($_POST["coname"]);
        $gender = test_input($_POST["gender"]);
        $posi = test_input($_POST["position"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


echo "<h2>Your Input:</h2>";
echo $_POST['name'];
echo "<br>";
echo $email;
echo "<br>";
echo $password;
echo "<br>";
echo $cname;
echo "<br>";
echo $gender;
echo "<br>";
echo $posi;
?>