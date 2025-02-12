<html>
    <body>
        <?php
        date_default_timezone_set("Asia/Calcutta");
        $t=time();
        echo date('d-m-y H:i:s',$t);

        echo date_default_timezone_get();
        echo "<h3><b>the time is:$t</b></h3>";
        echo "<br>";

        $t=date('H',$t);

        if($t<=12)
        {
            echo "Good Morning";
        }
        elseif($t <= 17)
        {
            echo "Good Afternoon";
        }
        elseif($t <= 20)
        {
            echo "Good Evening";
        }
        else
        {
            echo "good nignt";
        }
        ?>
    </body>
</html>