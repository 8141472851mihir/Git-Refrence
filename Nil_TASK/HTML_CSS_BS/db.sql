//insert data into table
INSERT INTO `order` (`order_id`, `product_name`, `product_qty`, `delivery_address`, `pincode`, `phn_no`, `delivery_date`, `order_amount`, `payment_method`) VALUES (NULL, 'iphone 13 pro max 128gb', '1', 'near HDFC bank, Sola, Ahmedabad', '380060', '1234567890', '2025-02-07', '55999', 'Online');

//change max value
ALTER TABLE `order` CHANGE `product_name` `product_name` VARCHAR(50);

//arrange using max order amount 
SELECT * FROM `order` ORDER BY `order`.`order_amount` DESC;

//arrange using quantity of ORDER
SELECT * FROM `order` ORDER BY `order`.`product_qty` ASC



//new TABLE

//asc view
SELECT * FROM `company_list` ORDER BY `company_list`.`No` ASC;


//desc view
SELECT * FROM `company_list` ORDER BY `company_list`.`No` DESC;


//arrange as per age of the company asc 
SELECT * FROM `company_list` ORDER BY `company_list`.`since` ASC;

//only ahmedabad comapny 
SELECT * FROM `company_list` WHERE Headquarter LIKE 'a%';


//print max brached company's total branches
SELECT MAX(total_branch)
FROM company_list; 


//print whole data of max branched comapny
SELECT * FROM `company_list` WHERE total_branch = (SELECT MAX(total_branch) FROM `company_list`);


