<?php
echo "1: ";
echo " (Indexed Array): ";
$students = ["A", "B", "C"];
foreach ($students as $student)
    {
        echo "$student\n";
    
    }
    echo "<br>";
echo "2: ";
echo " (Associative Array): ";

$studentProfile = ["Name" => "A", "Age" => 20, "Grade" => "A"];
foreach ($studentProfile as $key => $value)
    {
        echo "$key: $value\n";
    }
    echo "<br>";

echo "3: ";
echo "Subjects Grades (Associative Array): ";

$grades = ["Math" => "A", "Science" => "B", "History" => "A"];
foreach ($grades as $subject => $grade) 
    {
        echo "$subject: $grade\n";
    }
    echo "<br>";

echo "4: ";
echo "Add New Student: ";

$students[] = "D";
print_r($students);
echo "<br>";

echo "5: ";
echo "Display Students with Grades: ";
$studentGrades = ["A" => "A1", "B" => "B1", "C" => "C1"];
foreach ($studentGrades as $student => $grade) 
    {
        echo "$student: $grade\n";
    }
    echo "<br>";

echo "6: ";
echo "Number of Students: ";
echo "Total students: " . count($students) . "\n";
echo "<br>";

echo "7: ";
echo "Update Marks: ";
$studentGrades["B"] = "A1";
print_r($studentGrades);
echo "<br>";

echo "8: ";
echo "Multidimensional Array: ";
$studentsInfo = [
                    ["Name" => "A", "Age" => 20, "Grades" => ["Math" => "A", "Science" => "B"]],
                    ["Name" => "B", "Age" => 21, "Grades" => ["Math" => "C", "Science" => "B"]]
                ];
            print_r($studentsInfo);
            echo "<br>";

echo "9: ";
echo " 3D Array: ";

$studentsTable =[
                    "A" => ["Math" => 95, "Science" => 88],
                    "B" => ["Math" => 78, "Science" => 82]
                ];
print_r($studentsTable);
echo "<br>";

echo "10: ";
echo "Sorting Indexed Arrays: ";
sort($students);
print_r($students);
rsort($students);
print_r($students);
echo "<br>";

echo "11: "; 
echo "Sorting Associative Arrays: ";
asort($studentGrades);
print_r($studentGrades);
arsort($studentGrades);
print_r($studentGrades);
echo "<br>";

echo "12: ";
echo "Sorting Arrays of Strings: ";
$names = ["D", "A", "C"];
sort($names);
print_r($names);
echo "<br>";
?>
