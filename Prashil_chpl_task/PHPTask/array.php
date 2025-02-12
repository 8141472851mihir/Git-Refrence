<?php
//index array and print it
echo "1 : ";
$student = array("Alice","Bob","Shyam");
foreach($student as $a)
{
    echo $a. " ";
}

echo "<br>";
//stdent profile using associative array
echo "2: ";
$astudent = array("name" => "Alice","age" => 20,"roll" =>"CR");
foreach ($astudent as $x => $y)
{
    echo $x. " : ".$y. " ";
}

//subject grade using associative array
echo "<br>";
echo "3: ";
$grade = array("Science" => "A+", "Maths" => "B", "English" => "A");
foreach ($grade as $x => $y)
{
echo $x. " : ".$y. " ";
}

echo "<br>";

//Add new student in index array
echo "4: ";
array_push($student,"Sanjay");
array_push($student,"Suresh");
foreach($student as $a)
{
    echo $a. " ";
}
echo "<br>";

//student name with grade
echo "5: ";
$withgrade = array  
  (  
  array("Suresh","A+"),  
  array("Ramesh","B+"),  
  array("Sanjay","A")  
  );  
  
for ($row = 0; $row < 3; $row++) {  
  for ($col = 0; $col < 2; $col++) {  
    echo $withgrade[$row][$col]."  ";  
  }  
} 

echo "<br>";

//count of student
echo "6: ";
echo count($student);
echo "<br>";

//Update marks of student in list and display it
echo "7: ";
$withgrade[1][1] = "A+";
// print_r($withgrade);
for ($row = 0; $row < 3; $row++) {  
    for ($col = 0; $col < 2; $col++) {  
      echo $withgrade[$row][$col]."  ";  
    }  
  }  
echo "<br>";

//multidimation array
echo "8: ";
$studentdetail = array  
  (  
  array("name"=>"Suresh","age" => "18","Science" => "A+","MATHS" => "B", "ENGLISH" => "A"),  
  array("name" => "Ramesh","age"=>"20","Science" => "A","MATHS" => "B+", "ENGLISH" => "A+"),  
  array("name" =>"Sanjay","age"=>"21","Science" => "B","MATHS" => "A+", "ENGLISH" => "B+")  
  );

print_r($studentdetail);
echo "<br>";

//3d array
echo "9: ";
$studentsinfo = array(
    array(
        "name" => "Suresh",
        "subjects" => array(
            array("subject" => "Science", "marks" => "A+"),
            array("subject" => "MATHS", "marks" => "B"),
            array("subject" => "ENGLISH", "marks" => "A")
        )
    ),
    array(
        "name" => "Ramesh",
        "subjects" => array(
            array("subject" => "Science", "marks" => "A"),
            array("subject" => "MATHS", "marks" => "B+"),
            array("subject" => "ENGLISH", "marks" => "A+")
        )
    ),
    array(
        "name" => "Sanjay",
        "subjects" => array(
            array("subject" => "Science", "marks" => "B"),
            array("subject" => "MATHS", "marks" => "A+"),
            array("subject" => "ENGLISH", "marks" => "B+")
        )
    )
);

foreach ($studentsinfo as $studenti) {
    echo "Name : " . $studenti["name"] . "\n";
    echo "Subjects :\n";
    foreach ($studenti["subjects"] as $subject) {
        echo "  " . $subject["subject"] . " : " . $subject["marks"] ;
        // echo "<br>";
     }
     echo "<br>";
    }
echo "<br>";

//sorting index array
echo "10: ";
echo "Sorting the index array in ascending order ";
sort($student);
print_r( $student);
echo "<br>";
echo "Sorting the index array in decending order ";
rsort($student);
print_r( $student);
echo "<br>";

//sorting associative array
echo "11: ";
echo "Sort the associative array using key in ascending order ";
ksort($grade);
print_r( $grade);
echo "<br>";
echo "Sort the associative array using key in descending order ";
krsort($grade);
print_r( $grade);
echo "<br>";
echo "Sort the associative array using value in ascending order ";
asort($grade);
print_r( $grade);
echo "<br>";
echo "Sort the associative array using value in descending order ";
arsort($grade);
print_r( $grade);
echo "<br>";

//sort the string array alphabetically
echo "12: ";
sort($student);
print_r( $student);
echo "<br>";

?>