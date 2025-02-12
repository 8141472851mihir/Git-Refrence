<?php

class Person
{
    public $name;
    public $age;

    function setname($name)
    {
        $this->name = $name;
    }
    function setage($age)
    {
        $this->age = $age;
    }
    function getname()
    {
        return $this->name;
    }
    function getage()
    {
        return $this->age;
    }
}

$person = new Person();
$person->name = "Akhtar";
$person->setname("Aman ");
$person->setage("20");
echo $person->getname();
echo $person->getage();
echo "<br>";

class Fruits
{
    public $name;
    public $price;

    public function setValue($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
    public function getValue()
    {
        echo "<br> Name = " . $this->name . ", Price = " . $this->price;
    }
}
$banana = new Fruits();
$banana->setValue("Banana", "30 Rs");
$banana->getValue();
echo "<br>";


class Car extends Fruits
{
    public $modal;

    function __construct()
    {
        echo "<br>This is Constructor <br>";
    }

    function setValue($name, $modal)
    {
        $this->name = $name;
        $this->modal = $modal;
    }
    function getValue()
    {
        echo "Name = " . $this->name . ", Modal = " . $this->modal;
    }
    function __destruct()
    {
        echo "<br> Destructor called";
    }
}
$car = new Car();
$car->setValue("Volvo", "XC350<br>");
$car->getValue();


class People
{
    public $name;
    private $age;
    protected $account;

    function setValue($name, $age, $account)
    {
        $this->name = $name;
        $this->age = $age;
        $this->account = $account;
    }
    function getValue()
    {
        echo "<br>Name = " . $this->name . ", Age = " . $this->age . ", Account = " . $this->account;
    }
    private function ab()
    {
        echo "<br>Private function called";
    }
    protected function bc()
    {
        echo "<br>Protected function called";
    }
}
$people = new People();
$people->setValue("Amit", "23", "29930017763");
$people->getValue();

class P1 extends People
{
    const MESSAGE = "THis is a Constant message<br>";
    function __construct()
    {
        echo "<br>Child class start";
    }
    function __destruct()
    {
        // echo "<br>Child class end";
    }
}
$p1 = new P1();
$p1->setValue("Ravi", "25", "7836763625367");
$p1->getValue();
echo "<br> Contant = " . P1::MESSAGE;
// $p1->ab();
// $p1->bc();

abstract class Book
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    abstract function intro();
}

class Novel extends Book
{
    public function intro()
    {
        return "<br>The name is coming from an abstract class and method = $this->name !!";
    }
}
$novel = new Novel("Chatur");
echo $novel->intro();

interface Animal
{
    public function sound();
}
class Dog implements Animal
{
    public function sound()
    {
        echo "<br><br>Interface example = Bow Bow";
    }
}
class Cat implements Animal
{
    public function sound()
    {
        echo "<br>Interface example = Meow Meow";
    }
}
$dog = new Dog();
$cat = new Cat();
$dog->sound();
$cat->sound();

// trait message
// {
//     public function msg()
//     {
//         echo "This is Trait";
//     }
// }

class Main
{
    public function main()
    {
        echo "<br><br>This is main function<br>";
    }
    // use message;
}

$m = new Main();
$m->main();
// $m->msg();


class Hello
{
    public static $value = "Akhtar!! This is a Fixed value";
    public static function sayHello()
    {
        echo "<br><br>Hello World!! Print through static method<br>";
    }
}
Hello::sayHello();
echo Hello::$value;
