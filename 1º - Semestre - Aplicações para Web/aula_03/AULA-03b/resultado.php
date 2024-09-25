<?php
	// recuperar os dados do html
	
	# $mes[1]
	$a = $_POST['v1'];
	$b = $_POST['v2'];	
	$op = $_POST['operacao'];
	
	echo "<p>RESULTADO:</p>";
	echo "<br>A: " . $a;
	echo "<br>B: " . $b;
	
	// SOMA
	if($op == "SOM"){		
		$z = $a + $b;
		echo "<br>Soma: " . $z;
	}
	
	// SUBTRAÇÃO
	if($op == "SUB"){
		$z = $a - $b;
		echo "<br>Subtração: " . $z;
	}
	
	// MULTIPLICAÇÃO
	if($op == "MUL"){
		$z = $a * $b;
		echo "<br>Multiplicação: " . $z;
	}
	
	// DIVISÃO
	if($op == "DIV"){
		// dividendo é zero?
		if($b == 0){// erro
			echo "<br/>Não existe divisão por Zero" ;
		}else{// realizar divisão
			$z = $a / $b;
			echo "<br>Divisão: " . $z;
		}		
	}
	
?>
