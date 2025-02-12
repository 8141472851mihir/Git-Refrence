    <!-- <?php  
    $a=2;
    $b=6;
    echo "Before swapping:<br>"; 
    echo "a =".$a ."<br>"; 
    echo " b=".$b;
    $temp=0;
    $temp = $a;  
    $a = $b;  
    $b = $temp;  
    echo "<br><br>After swapping:<br>";  
    echo "a =".$a ."<br>"; 
    echo " b=".$b;
    ?>   -->

    <?php  
    $a=2;
    $b=6;
    echo "Before swapping:<br>"; 
    echo "a =".$a ."<br>"; 
    echo " b=".$b;
    $a = $a+$b;
    $b = $a-$b;  
    $a = $a-$b;  
    echo "<br><br>After swapping:<br>";  
    echo "a =".$a ."<br>"; 
    echo " b=".$b;
    ?>  