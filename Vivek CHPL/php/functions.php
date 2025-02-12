<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions</title>
</head>
<body>
    <?php

        function cube()
        {
            $number=5;
            $cube=(5*5*5);
            echo "Cube is : $cube";
        }
        cube();

        echo "<br><br>";
        
        function oddEven($number)
        {
            if($number%2==0)
            {
                echo "$number is Even";
            }
            else{
                echo "$number is Odd";
            }
        }
        $number=15;
        oddEven($number);

        echo "<br><br>";

        for($i=1;$i<=100;$i++)
        {
            if($i%2==0)
            {
                echo "$i ";
            }
        }

        echo "<br><br>";

        function multiplication()
        {
            $k=1;
            $multi=array(2,4,6,7);
            foreach ($multi as $key) 
            {
                $k*=$key;
            }
            echo "Multiplication of array`s inside value : $k";
        }
        multiplication();
    ?>
</body>
</html>