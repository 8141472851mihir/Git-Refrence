<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $selectedValue = $_POST['country'];

    echo "your selected country:".$selectedValue;

    if($selectedValue=="India"){
        echo "<option>Gujarat</option>";
        echo "<option>Mp</option>";
        echo "<option>Punjab</option>";
    }
    if($selectedValue=="USA"){
        echo "<option>California</option>";
        echo "<option>Florida</option>";
        echo "<option>Alaska</option>";
    }
    if($selectedValue=="UAE"){
        echo "<option>Dubai</option>";
        echo "<option>Ajman</option>";
        echo "<option>Sharjah</option>";
    }
    $selectedValue = $_POST['country'];
    $sectedstate=$_POST['state'];

    if($sectedstate=="Gujarat"){
        echo "<option>Ahmedabad</option>";
        echo "<option>Rajkot</option>";
        echo "<option>Surat</option>";
    }

} else {
    echo 'Invalid request!';
}




    ?>