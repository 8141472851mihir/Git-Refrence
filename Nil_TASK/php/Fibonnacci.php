<?php
	$a = 20;
	$num1 = 0;
	$num2 = 1;

	for($i = 0; $i < $a; $i++){
		echo $num1;
		$num3 = $num1 + $num2;
		$num1 = $num2;
		$num2 = $num3;
		echo "<br>";
	}
?>
