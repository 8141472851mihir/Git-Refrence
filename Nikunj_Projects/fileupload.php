<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data" >

    <label for="image">Image</label>
    <input type="file" name="image" id="image">
    <input type="submit" name="submit" id="submit">
    </form>

</body>
</html>



<!-- // <<<<<<<<<<<<<-----------ACCESS MODIFIRE------------>


<!-- // echo "<h2> ACCESS MODIFIRE </h2> ";


// class Car {
//     public $make; // Public property
//     protected $model; // Protected property
//     private $engine; // Private property

//     public function __construct($make, $model, $engine) {
//         $this->make = $make;
//         $this->model = $model;
//         $this->engine = $engine;
//     }

//     // Public method
//     public function displayInfo() {
//         echo "Make: $this->make, Model: $this->model";
//     }

//     // Protected method
//     protected function startEngine() {
//         echo "Starting engine: $this->engine";
//     }

//     // Private method
//     private function stopEngine() {
//         echo "Engine stopped!";
//     }
// }

// class SportsCar extends Car {
//     public function showSportsCarDetails() {
//         // Accessing protected property and method from the parent class
//         echo "Model: " . $this->model;
//         $this->startEngine();
//     }
// }

// // Creating an object of Car
// $myCar = new Car("Toyota", "Corolla", "V6");
// $myCar->displayInfo(); // Public method is accessible

// // Trying to access protected and private properties or methods from outside the class
// $myCar->startEngine(); // Error: Cannot access protected method
// $myCar->stopEngine(); // Error: Cannot access private method

// // Accessing protected method from subclass
// $mySportsCar = new SportsCar("Ferrari", "488", "V8");
// $mySportsCar->showSportsCarDetails(); // This will work because SportsCar inherits from Car -->
