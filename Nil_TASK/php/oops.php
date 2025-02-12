<?php 
     namespace vehicles;
    echo "<h2>class && constructor/destuctor and namespace</h2>";
    class cars{

        public $name;
        public $price;

        function __construct($name, $price)
        {
            $this->name = $name;
            $this->price = $price;
        }

        function get_name(){
            return $this->name;
        }
        function get_price(){
            return $this->price;
        }

        function __destruct()
        {
            echo "Mustang comes from muscle car category";
        }
    }
        $car1 = new \vehicles\cars("Mustang", "70 Lakhs");
        echo $car1->get_name();
        echo "<br>";
        echo $car1->get_price();
        echo "<br>";


    //access modifiers
    class am{

        public function name(){
            echo "audi";
        }

        protected function color(){
            echo "red";
        }
        private $price = "75lakhs";
    }

    echo "<br>";
    echo "<h2>access modifiers</h2>";
    $am = new am();
    echo $am-> name();
    echo "<br>";
    //echo $am->color;
    echo "<br>";
   // echo $am->price;



   //inheritance
    class hello extends am{

        const msg = "hello from class hello (constant)";
    }    

   $hello = new hello();
   echo $hello::msg;
   echo "<br>";
   echo $hello->name();
   echo "<br>";
   //echo am::color();


   //interface

   echo "<h2>Interface</h2>";

   interface animal{
    public function makesound();
   }

   class cat implements animal{
        public function makesound()
            {
                echo "meow";
                echo "<br>";
            }
    }
    class dog implements animal{
        public function makesound(){
            echo "bark";
            echo "<br>";
        }
    }

    class mouse implements animal{
        public function makesound(){
            echo "squeak";
            echo "<br>";
        }
    
    }

    $cat = new cat();
    $dog = new dog();
    $mouse = new mouse();
    $animals = array($cat,$dog,$mouse);

    foreach($animals as $animal){
        $animal->makesound();
    }

    //traits
    echo "<h2>Traits</h2>"."<br>";

    trait traits1{
        public function msg2(){
            echo "Hello, I am a trait";
            echo "<br>";
        }
    }

    class world{
        use traits1;
    }
   
    $world = new world();
    $world->msg2();


    //static method and variables

    echo "<h2>Static method/function and variables</h2>";
    class greet{

        public static $pi = 3.14;
        public static function welcome(){
            echo "Welcome to my world";
            echo "<br>";
        }
    }

    greet::welcome();
    echo greet::$pi;
    echo "<br>";

?>
