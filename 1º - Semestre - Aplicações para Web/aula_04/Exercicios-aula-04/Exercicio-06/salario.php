

<?php

// Obter os dados do formulário
$nome = $_POST['nome'];
$salarioFixo = $_POST['salario_fixo'];
$totalVenda = $_POST['total_venda'];
$percentualComissao = $_POST['percentual_comissao'];

// Calcular o valor da comissão
$valorComissao = $totalVenda * ($percentualComissao / 100);

// Calcular o salário líquido
$salarioLiquido = $salarioFixo + $valorComissao;

// Exibir o resultado
echo "<h2>Resultado do Cálculo</h2>";
echo "<p>Nome do Vendedor: $nome</p>";
echo "<p>Salário Fixo: R$" . number_format($salarioFixo, 2, ',', '.') . "</p>";
echo "<p>Total de Venda: R$" . number_format($totalVenda, 2, ',', '.') . "</p>";
echo "<p>Percentual de Comissão:" . $percentualComissao%;
echo "<p>Valor da Comissão: R$" . number_format($valorComissao, 2, ',', '.') . "</p>";
echo "<p><strong>Salário Líquido: R$" . number_format($salarioLiquido, 2, ',', '.') . "</strong></p>";

?>
