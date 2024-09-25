<?php
	// recuperar os dados do html
	
	# $mes[1]
	$x = $_POST['v1'];
	$y = $_POST['v2'];
	$z = $x + $y;
	
	//echo $x . " - " . $y;
	
	$a = 10;
	$b = 5;
	
	$c = $a + $b;
	
	
	// echo "<br>Resultado: ";
	//echo $c;
	echo "<br>Soma: " . $z;
	
	$z = $a - $b;
	echo "<br>Subtração: " . $z;
	
	$z = $a * $b;
	echo "<br>Multiplicação: " . $z;
	
	$z = $a / $b;
	echo "<br>Divisão: " . $z;
?>
