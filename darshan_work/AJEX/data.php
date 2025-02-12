<?php

// print_r($_POST);
// exit;
if(isset($_POST['action'])){

    $action = $_POST['action'];
    $action = trim($action);

    if( $action == 'Gujarat'){

        echo "<option>Ahmedabad</option>";
        echo "<option>Surat</option>";
    }
    elseif( $action == 'Maharashtra'){
        echo "<option>Mumbai</option>";
        echo "<option>Pune</option>";
        }
}  
    



?>