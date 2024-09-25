
<?php

// Recuperar dados do HTML
$veiculo = $_POST['vei'];
$cFabrica = $_POST['cFab'];

// Impostos = 45% (Custo Fab * 48%)
$vImp = $cFabrica * 0.45;  // (45/100)

// Distribuidor = 28% (imposto * 28%)
$vDis = ($cFabrica + $vImp) * 0.28;


// Calcular Valor final para o consumidor
// Consumidor = CF + Dist + Imp
$vFinal = $cFabrica + $vImp + $vDis;

echo "<p>Resultado: ";
echo "<br/>Veiculo: " . $veiculo;
echo "<br/>Fabrica: " . $cFabrica;
echo "<br/>Imposto: " . $vImp;
echo "<br/>Distribuidor: " . $vDis;
echo "<br/>Valor Final: " . $vFinal;
?>
