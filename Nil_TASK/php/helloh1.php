<?php
if(isset($_POST['remarks'])){
    $remarks = $_POST['remarks'];
    $remarks = trim($remarks);
    // echo $remarks;

    if($remarks == 1){
        echo 1;
    }else{
        echo 0;
    }
}

?>
