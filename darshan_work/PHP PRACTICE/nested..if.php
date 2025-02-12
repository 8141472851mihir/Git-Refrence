<html>
    <body>
        <?php
        $a=60;
        echo "<b> Age is: $a</b>";
        if($a)
        {
            if($a<10)
            {
                echo "<br>";
                echo "below 10";
            }
            elseif($a <= 18)
            {
                echo "<br>";
                echo "teenager";
            }
            elseif($a<=40)
            {
                echo "<br>";
                echo "younger";
            }
            elseif($a>=50)
            {
                echo "<br>";
                echo "older";
            }
            else 
            {
                echo "<br>";
                echo "check again";
            }
        }
        ?>
    </body>
</html>