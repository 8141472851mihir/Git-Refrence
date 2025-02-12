<?php


class student{

    public $name;
    public $age;
    public function __construct($name,$age){
        $this->name=$name;
        $this->age=$age;
    }

    protected function info(){
        echo "Student Name is {$this->name} and Age is {$this->age}.";
    }
}

class teacher extends student{

    public function msg(){
  
        echo "Student Details : ";
        $this->info();
    }

}
$obj=new teacher("helly",12);
$obj->msg();
?>