<?php

echo "Queries list for the Company table : <br>";

echo "<br> 1. &nbsp
INSERT INTO `task_company`(`companyname`, `companyemail`, `password`, `companymobile`, `companyaddress`, `companywebsite`, `companyfax`, `numberofemployees`, `companysince`) VALUES ('CHPL','chpl@gmail.org','Chpl@099*!','9988007890','Sanand Ahmedabad','www.chplgroup.org','938-312-23','332','2013'),
('Google','google@gmail.com','g123ddf&&%','998212122','Los-angeles California','www.google.com','32-212-332','23088','1996'),
('Amazon','amazon@outlook.com','amaz#34-f','73615323683','Texas Florida','www.amazon.com','738-3322-11','44598','2001'),
('Apple','apple@hotmail.com','banana@39(892','8583495444','Silicon-Valley Washington','www.apple.com','12-232-211','33942','2000'),
('Microsoft','mic@outlook.com','M#988GG21','3993891223','Paris France','www.microsoft.org','393-094-8232','22003','1994'),
('TCS','tcs@gmail.com','hey@T%98df','84393843222','Bangluru Karnataka','www.tcs.in','485-4343-43','18565','2010'),
('Samsung','samsung@outlook.com','Sam^f&fdj','3478288787','Raikhad Singapore','www.samsung.com','122-21-2334','49333','2003'),
('Toyota','toyota@gmail.com','Toy*@jh3','658548958','Tokyo Japan','www.toyota.com','099-123-445','77320','2010'),
('Tesla','tesla@outlook.com','Tl(jsh]33','721126312','Los-angeles California','www.tesla.com','22923-333','130498','2019'),
('Boat','boat@hotmail.com','Bo%jhas&at','8232871000','Agra Delhi','www.boat.com','898-213-21','11593','2021');
<br>";

echo "<br> 2. &nbsp
UPDATE `task_company` SET `companysince`='2013-06-11' WHERE company_id=1;
<br>";


echo "<br> 3. &nbsp
SELECT * FROM `task_company`;
<br>";

echo "<br> 4. &nbsp
SELECT companyname,companyaddress,companymobile,companyemail FROM `task_company`;
<br>";


echo "<br> 5. &nbsp
SELECT * FROM `task_company` WHERE companywebsite LIKE '%com';
<br>";

echo "<br> 6. &nbsp
SELECT PASSWORD,companyfax FROM `task_company` WHERE companyname='CHPL';
<br>";


echo "<br> 7. &nbsp
SELECT * FROM `task_company` WHERE numberofemployees >= 20000 AND company_id <=7;
<br>";


echo "<br> 8. &nbsp
UPDATE task_company SET companyaddress='Moscow Russia' WHERE companyname='Samsung';
<br>";


echo "<br> 9. &nbsp
SELECT DISTINCT companysince FROM `task_company`;

<br>";

echo "<br> 10. &nbsp
SELECT * FROM task_company WHERE company_id BETWEEN 3 AND 8;

<br>";

echo "<br> 11. &nbsp
SELECT companyname FROM task_company ORDER BY numberofemployees ASC;

<br>";

echo "<br> 12. &nbsp
SELECT * FROM task_company ORDER BY companyaddress DESC;

<br>";


echo "<br> 13. &nbsp
SELECT companyname,companymobile,companywebsite,numberofemployees FROM task_company WHERE company_id > 2 AND (companyemail LIKE 'a%' OR companyemail LIKE 't%');

<br>";


echo "<br> 14. &nbsp
SELECT * FROM task_company WHERE NOT numberofemployees > 50000;

<br>";



echo "<br> 15. &nbsp
UPDATE task_company SET companysince = '1994-06-01', password = 'G00gke%@ii3' WHERE companyname = 'Google';

<br>";


echo "<br> 16. &nbsp
DELETE FROM task_company WHERE companyname = 'Boat';

<br>";


echo "<br> 17. &nbsp
SELECT TOP 3 * FROM `task_company` ORDER BY companyaddress DESC;

<br>";

echo "<br> 18. &nbsp
SELECT COUNT(companyname) FROM task_company; 
<br>";

echo "<br> 19. &nbsp
SELECT AVG(numberofemployees) FROM task_company;
<br>";


echo "<br> 20. &nbsp
SELECT companyname AS Name from task_company;
<br>";
