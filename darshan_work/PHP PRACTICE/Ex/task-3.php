<html>
    <body>
        <?php
        $a=10;
        $b=5;
        echo "Before:";
        echo "<br>";
        echo "a:".$a;
        echo "<br>";
        echo "b:".$b;

        $temp = $a;
        $a=$b;
        $b=$temp;
        echo "<br>";
        echo "<br>";
        echo "After:";
        echo "<br>";
        echo "a:$a";
        echo "<br>";
        echo "b:$b";
        ?>
    </body>
</html>