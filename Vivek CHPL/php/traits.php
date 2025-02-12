<?php 
    trait msg1 
    {
        public function msg_1()
        {
            echo "Hello World";
        }
    }

    trait msg2 
    {
        public function msg_2()
        {
            echo "It's Working...";
        }
    }
    
    class greet 
    {
        use msg1;
    }
    
    class greeting 
    {
        use msg2;
    }

    $greet=new greet();
    $greet->msg_1();
    
    echo "<br>";
    
    $greeting=new greeting();
    $greeting->msg_2();
?>