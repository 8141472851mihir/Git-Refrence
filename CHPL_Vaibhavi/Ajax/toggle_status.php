<?php
$form_data = json_decode(file_get_contents('form_data.json'), true);
$key = $_POST['key'];
$status = $_POST['status'];

$form_data[$key]['status'] = $status;

file_put_contents('form_data.json', json_encode($form_data));

echo $status;
?>