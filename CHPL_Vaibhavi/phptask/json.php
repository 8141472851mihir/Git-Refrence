<?php
$jsonString = '{
    "name": "vaibhu",
    "age": 30,
    "city": "Ahmedabad",
    "hobbies": ["reading", "traveling", "photography"],
    "is_student": false
}';

$data = json_decode($jsonString, true);
if ($data !== null) {
    echo "Name: " . $data['name'] . "<br>";
    echo "Age: " . $data['age'] . "<br>";
    echo "City: " . $data['city'] . "<br>";
    echo "Hobbies: " . implode(", ", $data['hobbies']) . "<br>";
    echo "Is Student: " . ($data['is_student'] ? 'Yes' : 'No') . "<br>";
} else {
    echo "Failed to decode JSON.";
}

?>
