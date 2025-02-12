<?php

//student list using indexed array

echo "<h2>Student Name:(Indexed Array)</h2>";

$stu_name = ["helly", "vaibhavi", "chirag"];

print_r($stu_name);

echo "<br><br>";

foreach ($stu_name as $name) {
    echo "student name : $name" . "<br>";
}

echo "<hr>";

//student profile using associative array

echo "<h2>Student Profile:(Associative Array)</h2>";

$stu_profile = ["helly" => "developer", "chirag" => "Admin", "jiya" => "Marketing"];

print_r($stu_profile);

echo "<br><br>";

foreach ($stu_profile as $profile => $valule) {
    echo "$profile : $valule " . "<br>";
}

echo "<hr>";

//multiple subject using associative array

echo "<h2>Multiple Subject Grades:(Associative Array)</h2>";

$sub = [
    "Helly" => ["Maths" => "A+", "gujarati" => "B"],
    "chirag" => ["gujarati" => "A", "science" => "A"],
    "jiya" => ["Science" => "B", "English" => "A"]
];

foreach ($sub as $name => $valule) {
    echo "$name: ";

    foreach ($valule as $grade => $value) {
        echo "$grade : $value" . "<br>";
    }
}
echo "<hr>";

echo "<h2>Add New Student :(Indexed Array)</h2>";

$stu_name = ["helly", "vaibhavi", "chirag"];

$stu_name[] = "jiyanshi";

print_r($stu_name);

echo "<hr>";
echo "<h2>Display Student With Grade :</h2>";

$student = ["Heer" => "A+", "Ashish" => "B", "Ronak" => "B"];

print_r($student);
echo "<br><br>";

foreach ($student as $name => $value) {
    echo "$name :$value " . "<br>";
}
echo "<hr>";
echo "<h2>Count Total Students:</h2>";
$stu_name = ["Ronak", "Jigar", "Helly", "Riya"];
echo "Total Number of students: ";
echo count($stu_name);

echo "<hr>";
echo "<h2>Updated Student Marks:</h2>";

$stu_marks = [
    "Helly" => ["Maths" => 85, "gujarati" => 90, "English" => 90],
    "chirag" => ["gujarati" => 65, "science" => 80, "Maths" => 89],
    "jiya" => ["Science" => 90, "English" => 89, "Maths" => 90]
];

foreach ($stu_marks as $name => $valule) {
    echo "$name: " . "<br>";

    foreach ($valule as $marks => $value) {
        echo "$marks : $value" . "<br>" . "<br>";
    }
}

echo "<h4>Updated Marks Array: </h4>";

$stu_marks["Helly"]["Maths"] = 90;
$stu_marks["Helly"]["gujarati"] = 65;
$stu_marks["Helly"]["English"] = 95;
$stu_marks["chirag"]["science"] = 85;

echo "<br>";

foreach ($stu_marks as $name => $valule) {
    echo "$name: " . "<br>";

    foreach ($valule as $marks => $value) {
        echo "$marks : $value" . "<br>" . "<br>";
    }
}

echo "<hr>";
echo "<h2>Create Multidimensional Array With Student Name , Age, Grades ,Subject:</h2>";
$stu_pro = [
    [
        "name" => "Helly",
        "Age" => 16,
        "subjects" => [
            "Maths" => ["grade" => "A"],
            "Science" => ["grade" => "A+"]
        ],
    ],
    [
        "name" => "Chirag",
        "Age" => 23,
        "subjects" => [
            "Maths" => ["grade" => "A"],
            "Science" => ["grade" => "A+"]
        ]
    ]

];
// print_r($stu_pro);

foreach($stu_pro as $Student){
    
    echo "Name:".$Student['name']."Age: ".$Student['Age']."<br>";

    foreach ($Student['subjects'] as $marks=>$value) {
        echo "$marks :{$value['grade']}"."<br>";
    }

}
echo "<hr>";
echo "<h2>Create Multidimensional Array With Student Name , Marks,Subject:</h2>";
$stu_pro = [
    [
        "name" => "Helly",
        "Age" => 16,
        "subjects" => [
            "Maths" => ["Mark" => 85],
            "Science" => ["Mark" =>90]
        ],
    ],
    [
        "name" => "Chirag",
        "Age" => 23,
        "subjects" => [
            "Maths" => ["Mark" =>95],
            "Science" => ["Mark" => 93]
        ]
    ]

];

foreach($stu_pro as $Student){
    
    echo "Name:".$Student['name']."Age: ".$Student['Age']."<br>";

    foreach ($Student['subjects'] as $marks=>$value) {
        echo "$marks :{$value['Mark']}"."<br>";
    }

}
echo "<hr>";
echo "<h2>Sorting Indexed Array</h2>";

$age = array("23", "32", "12");
sort($age);
print_r($age);
echo "<br>";

echo "<h3> Desending Order </h3>"."<br>";
$age = array("23", "32", "12");
rsort($age);
print_r($age);

echo "<hr>";
echo "<h2>Sorting Associative Arrays key : value</h2>";

$age = array("Helly"=>"35", "jiya"=>"15", "riya"=>"32");
asort($age);
print_r($age);

echo "<br>";

ksort($age);
print_r($age);

echo "<hr>";
echo "<h2>Sorting Array string Alphabetically</h2>";

$name=["Helly","vaibhavi","riya"];
sort($name);
print_r($name);

?>