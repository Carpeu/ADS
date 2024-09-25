
<?php

// Obter os valores
$valor1 = $_POST['valor1'];
$valor2 = $_POST['valor2'];

// Comparar os valores
if ($valor1 > $valor2) {
    $maiorValor = $valor1;
} else {
    $maiorValor = $valor2;
}

// Resultado
echo "<h2>Maior Valor</h2>";
echo "<p>Primeiro valor: ". $valor1;
echo "<p>Segundo valor: " . $valor2;
echo "<p>Maior valor: " . $maiorValor;

?>

