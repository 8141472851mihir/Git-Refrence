<?php 
    class A 
    {
        public static function greet()
        {
            echo "Hellooo";
        }
    }
    class B 
    {
        public function msg()
        {
            A::greet();
        }
    }
    $b=new B();
    $b->msg();
?>