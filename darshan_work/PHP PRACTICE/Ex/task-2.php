<html>
    <body>
        <?php
        $value = array();
        $size = 10;
        $result=0;
        
        for ($i = 0; $i < $size; $i++) {
            $value[] = rand(100, 1000);
        }
        echo "Random array:";
        print_r($value);
        
        $min = $value[0];
        $max = $value[0];

        for($i=0;$i<count($value);$i++)
        {
            if($value[$i]<$min)
            {
                $min = $value[$i];
            }

            elseif($value[$i]>$max)
            {
                $max = $value[$i];
            }
        }
        echo "<br>";
        echo "Minimum:$min";
        echo "<br>";
        echo "Maximum:$max";

        for($i=0;$i<count($value);$i++)
        {
            $result+=$value[$i];
        }
        echo "<br>";
        echo "Sum:$result";
        ?>
    </body>
</html>