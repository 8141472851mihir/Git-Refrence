<html>
    <body>
        <?php
        $a = 5;
        $b = 10;
        echo "Before:";
        echo "<br>";
        echo "a:".$a;
        echo "<br>";
        echo "b:".$b;

        $a = $a + $b;
        $b = $a - $b;
        $a = $a - $b;

        echo "<br>";
        echo "<br>";
        echo "After:";
        echo "<br>";
        echo "a = $a";
        echo "<br>";    
        echo "b = $b";        
        ?>
    </body>
</html>