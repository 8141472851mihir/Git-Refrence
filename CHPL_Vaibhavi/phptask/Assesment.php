<?php

class FruitManager {
    private $fruitStock = [];

    public function __construct() {
        // Initialize some default fruit stock
        $this->fruitStock = [
            'Apple' => 50,
            'Banana' => 30,
            'Orange' => 40
        ];
    }

    public function addFruitStock($fruitName, $quantity) {
        // Add fruit stock to the array
        if (isset($this->fruitStock[$fruitName])) {
            $this->fruitStock[$fruitName] += $quantity;
        } else {
            $this->fruitStock[$fruitName] = $quantity;
        }
        echo "Fruit stock added successfully!\n";
    }

    public function viewFruitStock() {
        // Display all fruit stocks
        echo "Fruit Stock:\n";
        foreach ($this->fruitStock as $fruitName => $quantity) {
            echo "$fruitName: $quantity\n";
        }
    }

    public function sellFruit($fruitName, $quantity) {
        // Sell fruit and update stock
        if (isset($this->fruitStock[$fruitName])) {
            if ($this->fruitStock[$fruitName] >= $quantity) {
                $this->fruitStock[$fruitName] -= $quantity;
                echo "Sold $quantity $fruitName(s) successfully!\n";
            } else {
                echo "Insufficient stock of $fruitName!\n";
            }
        } else {
            echo "Fruit not found in stock!\n";
        }
    }
}

class Customer {
    private $cart = [];

    public function addToCart($fruitName, $quantity) {
        // Add fruit to the cart
        $this->cart[$fruitName] = $quantity;
    }

    public function viewCart() {
        // Display the cart
        echo "Your Cart:\n";
        foreach ($this->cart as $fruitName => $quantity) {
            echo "$fruitName: $quantity\n";
        }
    }
}

// Usage
$fruitManager = new FruitManager();
$customer = new Customer();

while (true) {
    echo "Fruit Store Console Application\n";
    echo "1. Add Fruit Stock\n";
    echo "2. View Fruit Stock\n";
    echo "3. Sell Fruit\n";
    echo "4. Add to Cart\n";
    echo "5. View Cart\n";
    echo "6. Checkout\n";
    echo "7. Exit\n";
    echo "Enter your choice: ";

    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case 1:
            echo "Enter fruit name: ";
            $fruitName = trim(fgets(STDIN));
            echo "Enter quantity: ";
            $quantity = intval(trim(fgets(STDIN)));
            $fruitManager->addFruitStock($fruitName, $quantity);
            break;
        case 2:
            $fruitManager->viewFruitStock();
            break;
        case 3:
            echo "Enter fruit name: ";
            $fruitName = trim(fgets(STDIN));
            echo "Enter quantity to sell: ";
            $quantity = intval(trim(fgets(STDIN)));
            $fruitManager->sellFruit($fruitName, $quantity);
            break;
        case 4:
            echo "Enter fruit name: ";
            $fruitName = trim(fgets(STDIN));
            echo "Enter quantity: ";
            $quantity = intval(trim(fgets(STDIN)));
            $customer->addToCart($fruitName, $quantity);
            break;
        case 5:
            $customer->viewCart();
            break;
        case 6:
            echo "Checkout is not implemented yet.\n";
            break;
        case 7:
            echo "Exiting...";
            exit;
        default:
            echo "Invalid choice!\n";
    }
}
?>
