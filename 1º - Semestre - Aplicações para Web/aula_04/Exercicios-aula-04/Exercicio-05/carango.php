
<?php

// Obter os dados do formulário
$valorVeiculo = $_POST['valor_veiculo'];
$combustivel = $_POST['combustivel'];

// Definir as porcentagens de desconto
$descontos = array(
    "alcool" => 25,
    "gasolina" => 21,
    "diesel" => 14
);

// Calcular o desconto
$desconto = $valorVeiculo * ($descontos[$combustivel] / 100);

// Calcular o valor a ser pago
$valorAPagar = $valorVeiculo - $desconto;

// Resultado
echo "<h2>Resultado do Cálculo</h2>";
echo "<p>Valor do Veículo: R$" . number_format($valorVeiculo, 2, ',', '.') . "</p>";
echo "<p>Combustível: $combustivel</p>";
echo "<p>Desconto: " . $descontos[$combustivel] . "%</p>";
echo "<p>Valor do Desconto: R$" . number_format($desconto, 2, ',', '.') . "</p>";
echo "<p><strong>Valor a Pagar: R$" . number_format($valorAPagar, 2, ',', '.') . "</strong></p>";

?>
