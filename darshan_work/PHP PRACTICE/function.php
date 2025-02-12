<html>
    <body>
        <?php
        function mycalculator($x=0,$y=0)
        {
            echo "x=".$x;
            echo ",y=".$y;
            echo "<br>";
            $sum=$x+$y;
            echo "<br>";
            echo "Addition $x + $y=$sum";
            $sub=$x-$y;
            echo "<br>";
            echo "Substraction $x - $y=$sub";
            $mul=$x*$y;
            echo "<br>";
            echo "Multiplication $x * $y=$mul";
            $div=$x/$y;
            echo "<br>";
            echo "Division $x / $y=$div";

            return 0;
        }
        mycalculator(23,4)
        ?>
    </body>
</html>