<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <h1>Welcome to PHP</h1>

        <div class="card mb-2">
            <div class="card-body">
                <h4>Program 1 - Str concat and var_dump</h4>
                <br>
                <?php
                $greet = "from PHP";
                echo "Hello - " . $greet . "<br>";
                var_dump($greet);
                ?>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <h4>Program 2 - Global scope variable</h4>
                <br>
                <?php
                $a = "Sohel";
                echo $a . " - is a global variable";

                function greeting()
                {
                    echo "Welcome " . $a . "within a function <br>";
                }
                greeting();

                echo "Welcome " . $a . " out side a function <br>";
                echo "<h5>See, the function is giving me warning but if i use global keayword it will solved </h5>";
                function greeting1()
                {
                    global $a;
                    echo "Welcome " . $a . " within a function <br>";
                }
                greeting1();
                ?>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <h4>Program 3 - Array</h4>
                <br>
                <?php
                $prolan = array("PHP", "JAVA", "PYTHON", "FLUTTER");
                echo $prolan;
                echo "<h5>The warning is coming because the array does not print in echo tag </h5>";
                print($prolan);
                echo "<h5>Also warning in print tag, we need print_r  for print the array </h5>";
                print_r($prolan);
                echo "<pre>";
                var_dump($prolan);
                ?>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <h4>Program 4 - Modify Strings</h4>
                <br>
                <?php
                $s = "Hello World!";
                echo "<h5>Original string = " . $s;
                echo "<br>";
                echo "<br>";
                echo "Upper case = ";
                echo strtoupper($s);
                echo "<br>";
                echo "Lower case = ";
                echo strtolower($s);
                echo "<br>";
                echo "Replace str = ";
                echo str_replace("World", "Sohel", $s);
                echo "<br>";
                echo "Reverse str = ";
                echo strrev($s);
                ?>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <h4>Program 5 - Math functions</h4>
                <br>
                <?php
                echo "<h5>List of numbers - 22, 487, 0.65, 121, 7, -4, 76</h5>";
                echo "<br>";
                echo "Minimum no. = ";
                echo min(22, 487, 0, 121, 7, -4, 76);
                echo "<br>";
                echo "Maximum no. = ";
                echo max(22, 487, 0, 121, 7, -4, 76);
                echo "<br>";
                echo "Absolue/Positive -4 = ";
                echo abs(-4);
                echo "<br>";
                echo "Square root of 121 = ";
                echo sqrt(121);
                echo "<br>";
                echo "Round of 0.65 = ";
                echo round(0.65);
                echo "<br>";
                echo "Random numbers of 4 digit = ";
                echo rand(1000, 9999);
                ?>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <h4>Program 6 - Constants (define & const)</h4>
                <br>
                <?php
                const NAME = "Sohel";
                define("AGE", 22);
                echo "<h5>Result of const = ";
                echo NAME;
                echo "<br>";
                echo "<h5>Result of define = ";
                echo AGE;
                echo "<br>";
                function intro()
                {
                    // const NAME = "Sohel";
                    // define("AGE",22);
                    echo "Function intro = ";
                    echo "Hello, I am " . NAME . " and I am " . AGE . " years old.";
                }
                intro();
                ?>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <h4>Program 7 - If..else statement</h4>
                <br>
                <?php
                $time = date("H");
                echo "The time is " . $time . " so the output will ....";
                echo "<br>";

                if ($time < "10") {
                    echo "Have a Good morning, sohel.";
                } elseif ($time < "20") {
                    echo "Have a Good day, sohel.";
                } else {
                    echo "Have a Good night, Sohel.";
                }
                ?>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <h4>Program 8 - String Reverse without using function</h4>
                <br>
                <?php
                $str = "My name is sohel";
                echo "<h5>Original String: $str</h5>";
                echo strlen($str);
                echo "<br>";
                for ($i = strlen($str) - 1; $i >= 0; $i--) {
                    echo $str[$i];
                }
                ?>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <h4>Program 9 - Fibonacci Series</h4>
                <br>
                <?php
                $first = 0;
                $second = 1;
                $n = 10;
                echo "<h5>Fibonacci Series of 10 numbers: </h5>";
                for ($i = 1; $i < $n; $i++) {
                    echo $first . ", ";
                    $third = $first + $second;
                    $first = $second;
                    $second = $third;
                }
                echo $second;

                ?>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <h4>Program 10 - Prime numbers program</h4>
                <br>
                <?php
                echo "<h5>Prime numbers list till 50: </h5>";

                $count = 1;
                while ($count < 50) {
                    $c = 0;

                    for ($i = 1; $i <= $count; $i++) {
                        if (($count % $i) == 0) {
                            $c++;
                        }
                    }
                    if ($c < 3) {
                        echo $count . " , ";
                    }
                    $count = $count + 1;
                }
                ?>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <h4>Program 11 - Star pyramid pattern</h4>
                <br>
                <?php
                echo "<h5>Star pattern: </h5>";

                $n = 5;

                for ($i = 0; $i < $n; $i++) {
                    for ($j = 0; $j < 2 * ($n - $i) - 1; $j++) {
                        echo "&nbsp";
                    }

                    for ($k = 0; $k < 2 * $i + 1; $k++) {
                        echo "* ";
                    }
                    echo "<br>";
                }
                ?>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <h4>Program 12 - Number pyramid pattern</h4>
                <br>
                <?php
                echo "<h5>Number pattern: </h5>";

                $n = 5;

                for ($i = 0; $i < $n; $i++) {
                    for ($j = 0; $j < 2 * ($n - $i) - 1; $j++) {
                        echo "&nbsp";
                    }

                    for ($k = 0; $k < 2 * $i + 1; $k++) {
                        echo $k + 1;
                    }
                    echo "<br>";
                }

                // function sum($a, $b)
                
                // {
                //     $sum = $a + $b;
                //     return $sum;
                
                // }
                // echo sum(5, 6);
                ?>
            </div>
        </div>

    </div>
</body>

</html>