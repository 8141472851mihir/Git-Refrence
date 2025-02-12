<?php


class msg{

    const MSG="Hello,Good Morning!";

    public function info(){

         echo "Hi Helly". "  ".self::MSG."<br>";
    }
}

$obj= new msg();
$obj->info();

echo msg::MSG;

?>