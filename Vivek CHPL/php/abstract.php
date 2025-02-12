<?php
    abstract class car
    {
        public $name;
        public function __construct($name) 
        {
            $this->name=$name;
        }
        abstract public function data();
    }
    class thar extends car 
    {
        public function data() 
        {
            return $this->name;
        }
    }
    class bmw extends thar 
    {
        public function data() 
        {
            return $this->name;
        }
    }
    $thar=new thar("Thar");
    echo $thar->name;
    echo "<br>";
    $bmw=new bmw("BMW");
    echo $bmw->name;
?>