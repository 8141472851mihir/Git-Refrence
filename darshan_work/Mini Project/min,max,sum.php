<html>
    <body>
        <?php
        $value = array();
        $size = 10;
        for ($i = 0; $i < $size; $i++) {
            $value[] = rand(1, 100);
        }
        print_r($value);
        
        $min = $value[0];
        for($i=0;$i<count($value);$i++)
        {
            if($value[$i]<$min)
            {
                $min = $value[$i];
            }
        }
        echo "Minimum:$min";

        $max = $value[0];
        for($i=0;$i<count($value);$i++)
        {
            if($value[$i]>$max)
            {
                $max = $value[$i];
            }
        }
        echo "Maximum:$max";

        $add = 0;
        for($i=0;$i<count($value);$i++)
        {
           $add= $add+$value[$i]; 
        }
        echo "Addition:$add";
        
        // echo "<br>";
        // echo "Minimun:".min($value);
        // echo "<br>";
        // echo "Maximum:".max($value); 
        // echo "<br>";
        ?>
    </body>
</html>