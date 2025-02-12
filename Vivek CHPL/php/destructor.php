<?php
    class bike
    {
        public $bike;
        public $company;
        function __construct($bike,$company)
        {
            $this->bike=$bike;
            $this->company=$company;
        }
        function __destruct()
        {
            echo "Bike is : {$this->bike}"," || ","Company is : {$this->company}";
        }
    }
    $honda=new bike("Bullet","Royal Enfield");
?>