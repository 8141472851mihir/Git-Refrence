<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title> star patten</title>
</head>
<body>
    <div class="container">
        <div class = "row">
        <div class = "col-sm-4">
        <?php
        $num = 10;
        echo "Left align Star patten <br>";
        for($i=0;$i<$num;$i++)
            {
 
                for($j=0;$j<=$i;$j++)
                {
                    echo "* ";
                }
                echo "<br>";
            }
    ?>
    </div>
    <div class = "col-sm-4">
         <?php
        $space = $i = $k = 0;
        $j = 10;
        echo "center align pyramid <br>";
        for($i = 1; $i <= $j; $i++, $k=0)
        {
            for($space = 1; $space <= $j-$i; $space++)
            {
                echo "&nbsp;&nbsp;"; 
            }
            while($k != 2 * $i - 1)
            {
                echo "* ";
                $k++;
            }
            echo "<br>";
        }
    ?>

    </div>
    <div class = "col-sm-4">
       
        <?php

            $m = 1;
            $n = 10;
            echo "right align star patten"; 
            echo "<br>";
            for($i=$n;$i>=1;$i--)
            {
                for($j=1;$j<=$i-1;$j++)
                {
                    echo "&nbsp;";
                }
                for($k=1;$k<=$m;$k++)
                {
                    echo "*";
                }
                echo "<br>";
                $m++;
            }
        ?>
   
    </div>
    </div>
    </div>
    
</body>
</html>