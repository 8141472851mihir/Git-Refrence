<?php
include "conn.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["edit_id"];
    $name = $_POST["edit_name"];
    $email = $_POST["edit_email"];
    $phone = $_POST["edit_phone"];
    $gender = $_POST["edit_gender"];
    // $department = $_POST["edit_department"];  
    // $designation = $_POST["edit_designation"]; 
    $skills = isset($_POST["skills"]) ? implode(",", $_POST["skills"]) : "";
    $salary = $_POST["edit_salary"];
    $joining_date = $_POST["edit_joining_date"];

  
    if (!empty($_FILES["edit_profile_picture"]["name"])) {
        $targetDir = "img/";
        $fileName = basename($_FILES["edit_profile_picture"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        move_uploaded_file($_FILES["edit_profile_picture"]["tmp_name"], $targetFilePath);
    } else {
        $targetFilePath = $_POST["existing_profile_picture"] ?? "";
    }

   
    $sql = "UPDATE employee_details SET 
            name='$name', 
            email='$email', 
            phone='$phone', 
            gender='$gender', 
            skills='$skills', 
            salary='$salary', 
            joining_date='$joining_date', 
            profile_pic='$targetFilePath' 
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error updating employee: " . $conn->error;
    }

    $conn->close();
}
?>
