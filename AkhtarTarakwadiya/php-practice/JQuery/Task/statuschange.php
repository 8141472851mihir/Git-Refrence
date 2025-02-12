<?php

// echo "Hello World";


if(isset($_POST['action']) && $_POST['action'] != "" && $_POST['action'] == "India"){
    echo $_POST['action'];
}else{
    echo 0;
}