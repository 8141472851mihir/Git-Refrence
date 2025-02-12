<?php

class Paren
{
    public $name;
    private $age;
    protected $city;

    private function setName($name, $age, $city)
    {
        $this->name = $name;
        $this->age = $age;
        $this->city = $city;
    }
    public function getName()
    {
        return $this->name . " is " . $this->age . " years old." . " He lives in " . $this->city . ".";
    }

}

$p = new Paren();
$p->name = "Sohel";
// $p->age = "22";
$p->setName("sohel","22","Rajkot");
echo $p->getName();

class child{
    
}

?>

