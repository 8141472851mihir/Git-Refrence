<!-- <?php
$i=0;
$j=0;

for ($i=1;$i<=5;$i++)
{
    for($j=1;$j<=5;$j++)
    {
        // if($i==1 || $i==5)
        // {
        //     echo "*";
        // }
        // else
        // {
        //     if($j==5)
        //     {
        //         echo "*";
        //     }
        //     else
        //     {
        //         echo "&nbsp;";
        //     }
        // }
        if($i==1 || $j==5)
        {
            echo "*&nbsp;";
        }
        elseif($j==5 || $i==5)
        {
            echo "*&nbsp;";
        }
        elseif($i==5||$j==1)
        {
            echo "*&nbsp;";
        }
    }
  
    echo "<br>";
}
?> -->

<!-- <?php
$i=0;
$j=0;

for ($i=1;$i<=5;$i++)
{
    for($j=1;$j<=5;$j++)
    {
        if($i==1 || $j==5){
            echo "*";
        }
        elseif($j==5 || $i==5)
        {
            echo "*";
        }
        elseif($i==1||$j==5)
        {
            echo "*";
        }
        elseif($i==2|| $j==4 || $i==3||$j==3 ||$i==4||$j==4)
        {
            echo " ";
        }
        else{
            echo "*";
        }
        
    }
    echo PHP_EOL;
    
}
?> -->


<?php
$i=0;
$j=0;

for ($i=1;$i<=5;$i++)
{
    for($j=1;$j<=5;$j++)
    {
        if($i==1 || $j==5){
            echo "*";
        }
        elseif($j==5 || $i==5)
        {
            echo "*";
        }
        elseif($i==1||$j==5)
        {
            echo "*";
        }
        elseif($i==2|| $j==4 || $i==3||$j==3 ||$i==4||$j==4)
        {
            echo " ";
        }
        
    }
    echo "<br>";
    
}
?> 
