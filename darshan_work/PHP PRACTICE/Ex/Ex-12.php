<!-- There are two deals of an item to buy. The quantities and prices of the item are given
below. Write a program in PHP to find the best deal to purchase the item.
$quantity1 = 70;
$quantity2 = 100;
$price1 = 35;
$price2 = 30; -->

<?php

$quantity1 = 70;
$quantity2 = 100;
$price1 = 35;
$price2 = 30;

$total_1 = $quantity1 * $price1;
$total_2 = $quantity2 * $price2;

if($totalCost1 < $totalCost2) 
{
    echo "Deal 1 is the better option with a total cost of $" . $totalCost1;
} 
elseif($totalCost1 > $totalCost2) 
{
    echo "Deal 2 is the better option with a total cost of $" . $totalCost2;
} 
else
{
    echo "Both deals have the same total cost of $" . $totalCost1;
}

?>
