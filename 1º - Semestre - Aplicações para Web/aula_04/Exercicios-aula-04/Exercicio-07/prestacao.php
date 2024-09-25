
<?php

// Obter os dados do formulário
$dataCompra = $_POST['data_compra'];
$valorCompra = $_POST['valor_compra'];

// Definir o número de prestações
$numeroPrestacoes = 6;

// Calcular o valor da parcela
$valorParcela = $valorCompra / $numeroPrestacoes;

// Gerar as datas de vencimento das prestações
$dataVencimento = $dataCompra;
$datasVencimento = array();
for ($i = 0; $i < $numeroPrestacoes; $i++) {
    $datasVencimento[] = date('d/m/Y', strtotime($dataVencimento . " + 1 month"));
}

// Exibir o resultado
echo "<h2>Resultado do Cálculo</h2>";
echo "<p>Data da Compra: $dataCompra</p>";
echo "<p>Valor da Compra: R$" . number_format($valorCompra, 2, ',', '.') . "</p>";
echo "<p>Número de Prestações: $numeroPrestacoes</p>";
echo "<p>Valor da Parcela: R$" . number_format($valorParcela, 2, ',', '.') . "</p>";

echo "<h3>Datas de Vencimento</h3>";
echo "<ul>";
foreach ($datasVencimento as $data) {
    echo "<li>$data</li>";
}
echo "</ul>";

?>
