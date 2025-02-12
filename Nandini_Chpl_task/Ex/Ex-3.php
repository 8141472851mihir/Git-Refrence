<!-- Write a program in PHP to print prime numbers between 1 and 100 -->

<html>
<body>
<h2><u>Prime Numbers between 1 and 100:</u></h2>
    <?php
    function primenumbers($a=0,$b=0)
    {
        $prime_numebrs=array();
        for($i = $a; $i <= $b; $i++) 
        {
            $prime = true;
            for($j = 2; $j < $i; $j++) 
            {
                //var_dump($j);
                if ($i % $j === 0) 
                {
                    $prime = false;
                    break;
                }
            }
            //break;
            if($prime && $i!=1) 
            { 
                array_push($prime_numebrs,$i);
            }
        }
        return implode(",",$prime_numebrs);
    }
    //echo "<pre>";
    $ouput=primenumbers(2,100);
    echo $ouput;
    //print_r(primenumbers(1000,100000));
    ?>
</body>
</html>
