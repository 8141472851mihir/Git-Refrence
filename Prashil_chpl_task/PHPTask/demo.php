<?php
class Demo{
    public function __construct(){
        echo "Hello World";
    }
    public function run(){
        echo "This is msg";
    }
    public function __destruct(){
        echo"this is demo msg";
    }
}
$h = new Demo();
$h->run();
?>