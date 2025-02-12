<?php 
    class demo 
    {
        const msg="Hello And Welcome !";
        function print()
        {
            echo self::msg;
        }
    }
    $demo=new demo();
    $demo->print();
?>