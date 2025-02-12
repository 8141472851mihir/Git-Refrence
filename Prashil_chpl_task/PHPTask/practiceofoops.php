<?php
namespace hello;
abstract class sound{
    abstract public function printinfo();
}
trait msg{
public function msg(){
    echo "This is Trait msg<br>";
}
}
interface mathopp{
    public function add($num1,$num2);
    public function sub($num1,$num2);
    public function mul($num1,$num2);
    public function div($num1,$num2);
    public function pow($num1,$num2);
    public function powmod($num1,$num2);
}
class hello
{
    public $name = "Hello";
    private $help = "This is private variable";
    public function hello()
    {
        echo $this->name . " , This is parent class<br>";
        echo $this->help . "<br>";
    }
    const MESSAGE = "THIS IS CONSTANT MESSAGE<br>";
    protected function help(){
        echo "This is protected Method<br>";
    }
}
class hii extends hello
{
    public function __construct()
    {
        echo "This is Constructor <br>";
        $this->help();
    }
    public function display()
    {
        echo "This is child class <br>";
    }
    public function __destruct()
    {
        echo "<br>This is Destructor <br>";
    }
}
class info extends sound{
    use msg;
    public function printinfo(){
        // use msg;
        $name = "Prashil parekh";
        $age = 22;
        $city = "Morbi";

        echo "Hello my name is ".$name.". I'm ".$age." years old. I am from  ".$city." <br>";

    }
}
class mathopp1 implements mathopp{
    public function add($num1,$num2){
        $sum = $num1 + $num2;
        echo "The Sum is " .$sum." It's done using interface<br>";
    }
    public function sub($num1,$num2){
        $sum = $num1 - $num2;
        echo "The sub is " .$sum." It's done using interface<br>";
    }
    public function mul($num1,$num2){
        $sum = $num1 * $num2;
        echo "The mul is " .$sum." It's done using interface<br>";
    }
    public function div($num1,$num2){
        $sum = $num2 / $num1;
        echo "The div    is " .$sum." It's done using interface<br>";
    }
    public function pow($num1,$num2){
        $sum = pow($num2,$num1);
        echo "The pow is " .$sum." It's done using interface<br>";
    }
    public function powmod($num1,$num2){}
}
class prashil{
    use msg;
    public static function welcome_msg(){
        echo "This is Welcome msg with the using static function <br>";
    }
    public static $bye = "Bye Bye <br>";
}
$two = new hii();
$two->display();
$two->hello();
echo hello :: MESSAGE;
$print = new info();
$print->printinfo();
$print->msg();
$n = new mathopp1();
$n->add(10,20);
$n->sub(10,20);
$n->mul(10,20);
$n->div(10,20);
$n->pow(2,4);
$m = new prashil();
$m->msg();
prashil::welcome_msg();
echo prashil::$bye;
?>