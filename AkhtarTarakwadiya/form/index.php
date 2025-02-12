<?php
// Include the form component
include 'FormComponent.php';

// Define form fields configuration
$fields = [
    [
        'type' => 'text',
        'name' => 'username',
        'label' => 'Username:',
        'required' => true,
    ],
    [
        'type' => 'email',
        'name' => 'email',
        'label' => 'Email:',
        'required' => true,
    ],
    [
        'type' => 'text',
        'name' => 'last',
        'label' => 'Last Name:',
        'required' => true,
    ],
    [
        'type' => 'password',
        'name' => 'password',
        'label' => 'Password:',
        'required' => true,
    ],
];

// Render the form
renderForm('process.php', 'POST', $fields, 'Register');
?>
