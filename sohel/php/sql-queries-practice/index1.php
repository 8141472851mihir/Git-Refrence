<?php

echo "Queries list for the Product table : <br>";

echo "<br> 1. &nbsp
INSERT INTO `task_product`(`productname`, `productdescription`, `productcategory`, `productstock`, `productprice`, `ordernumber`, `customername`, `customeraddress`, `customermobile`, `deliverydate`) VALUES 
('Eclairs', 'Very nice Chocolate', 'Food', '5000', '2', '101', 'Sohel', 'Ahmedabad Gujarat', '9934838437', '2025-01-30'),
('T-Shirt', '100% Cotton Premium T-Shirt', 'Clothing', '200', '499', '102', 'Ali', 'Mumbai, Maharashtra', '9876543210', '2025-02-01'),
('Laptop', 'Gaming Laptop with RTX 4060', 'Electronics', '50', '95000', '103', 'Rahul', 'Bangalore, Karnataka', '9823456789', '2025-02-05'),
('Wrist Watch', 'Luxury Leather Strap Watch', 'Accessories', '150', '2499', '104', 'Ananya', 'Delhi', '9798765432', '2025-02-07'),
('Smartphone', 'Latest 5G Smartphone', 'Electronics', '300', '42999', '105', 'Meera', 'Hyderabad, Telangana', '9887654321', '2025-02-10'),
('Backpack', 'Waterproof Travel Backpack', 'Bags', '500', '1499', '106', 'Arjun', 'Chennai, Tamil Nadu', '9765432189', '2025-02-12'),
('Sports Shoes', 'Running Shoes with Extra Cushion', 'Footwear', '250', '3499', '107', 'Vikas', 'Pune, Maharashtra', '9654321876', '2025-02-15'),
('Book', 'Best-Selling Novel', 'Stationery', '1000', '699', '108', 'Riya', 'Kolkata, West Bengal', '9543218765', '2025-02-18'),
('Headphones', 'Noise Cancelling Over-Ear Headphones', 'Electronics', '120', '7999', '109', 'Pooja', 'Jaipur, Rajasthan', '9432187654', '2025-02-20'),
('Handbag', 'Premium Leather Handbag', 'Accessories', '180', '5999', '110', 'Sneha', 'Surat, Gujarat', '9321876543', '2025-02-25');

<br>";

echo "<br> 2. &nbsp
SELECT * FROM `task_product`;
<br>";


echo "<br> 3. &nbsp
SELECT productname,productstock,productprice FROM `task_product`;
<br>";

echo "<br> 4. &nbsp
UPDATE task_product SET manufacturedate = '2022-05-01', expirydate = '2024-05-30' WHERE product_id = 1;
<br>";


echo "<br> 5. &nbsp
SELECT ordernumber FROM `task_product` WHERE productname = 'Laptop';
<br>";

echo "<br> 6. &nbsp
UPDATE task_product SET productstock = '300' WHERE productcategory <= 50;
<br>";


echo "<br> 7. &nbsp
SELECT productname,customername FROM `task_product` WHERE ordernumber >= 105;
<br>";


echo "<br> 8. &nbsp
SELECT SUM(productprice) FROM task_product;
<br>";


echo "<br> 9. &nbsp
SELECT AVG(productstock) FROM task_product WHERE product_id BETWEEN 5 AND 7;

<br>";

echo "<br> 10. &nbsp
SELECT * FROM task_product WHERE productcategory LIKE 'A%s';    

<br>";

echo "<br> 11. &nbsp
SELECT * FROM task_product WHERE productdescription LIKE 'L__%';

<br>";

echo "<br> 12. &nbsp
DELETE FROM task_product WHERE customername = 'Vikas';

<br>";


echo "<br> 13. &nbsp
SELECT * FROM task_product WHERE productprice NOT BETWEEN 10000 AND 50000;

<br>";


echo "<br> 14. &nbsp
SELECT productname,productprice,ordernumber,customername FROM task_product WHERE productcategory NOT IN('Accessories', 'Eletronics');

<br>";



echo "<br> 15. &nbsp
SELECT productname,productprice,manufacturedate,expirydate FROM task_product ORDER BY productstock DESC;

<br>";


echo "<br> 16. &nbsp
SELECT MIN(productprice) FROM task_product;

<br>";


echo "<br> 17. &nbsp
UPDATE task_product SET deliverydate = '2025-02-01' WHERE ordernumber = 105;

<br>";

echo '<br> 18. &nbsp
UPDATE task_product SET manufacturedate = "2025-01-30", expirydate="2026-02-01" WHERE productcategory = "Electronics";
<br>';

echo "<br> 19. &nbsp
SELECT product_id,productname,productdescription,productstock FROM task_product WHERE manufacturedate IS NULL;
<br>";


echo "<br> 20. &nbsp
SELECT DISTINCT productcategory FROM task_product;
<br>";
