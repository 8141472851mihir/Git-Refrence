<?php
 class Vehicle {
    private $make;
    private $model;
    const LEAVING_MESSAGE = "Thank you <br>";

    // Constructor to initialize the vehicle properties
    public function __construct($make, $model) {
        $this->make = $make;
        $this->model = $model;
    }
    function __destruct() {
        echo "The car is {$this->make}.";
      }

    // Getter for make
    public function getMake() {
        return $this->make;
    }

    // Getter for model
    public function getModel() {
        return $this->model;
    }

    // Method to display vehicle details
    public function displayInfo() {
        echo "Vehicle: " . $this->make . " " . $this->model . "<br>";
    }
}

// Inheritance: Extending the Vehicle class to create a Car class
class Car extends Vehicle {
    private $fuelType;

    public function __construct($make, $model, $fuelType) {
        // Call the parent class constructor
        parent::__construct($make, $model);
        $this->fuelType = $fuelType;
    }

    // Overriding the displayInfo method to include fuel type
    public function displayInfo() {
        parent::displayInfo(); // Call the parent method
        echo "Fuel Type: " . $this->fuelType . "<br>";
    }
}



// Create objects and demonstrate functionality
$vehicle = new Vehicle("Toyota", "Corolla");
$vehicle->displayInfo();

echo "\n";

$car = new Car("Honda", "Civic", "Petrol");
$car->displayInfo();

echo "\n";

echo Vehicle::LEAVING_MESSAGE;

?>
