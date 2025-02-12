<?php
    class car   
    {
        public $name;
        public $company;
        
        function __construct($name,$company)
        {
            $this->name=$name;
            $this->company=$company;    
        }
        function get_carName()
        {
            return $this->name; 
        }
        function get_carCompany()
        {
            return $this->company; 
        }
    }
    $bmw=new car("Fortuner","Toyota");
    echo "Car is : ".$bmw->get_carName();
    echo "<br>";
    echo "Company is : ".$bmw->get_carCompany();
?>