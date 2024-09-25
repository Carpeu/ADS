

<?php
// Dados do formulário
$idCliente = $_POST['idCliente'];
$idProduto = $_POST['idProduto'];
$valorTotal = $_POST['valorTotal'];
$QTD = $_POST['QTD'];

// Prepara a consulta SQL
$sql = "INSERT INTO pedido (idCliente, idProduto, valorTotal, quantidade) VALUES ($idCliente, $idProduto, $valorTotal, $QTD)";

// Cria um prepared statement
$stmt = $conn->prepare($sql);

// Vincula os parâmetros aos valores
$stmt->bind_param($idCliente, $idProduto, $valorTotal, $QTD);

// Executa a consulta
$stmt->execute();

// Verifica se a inserção foi bem-sucedida
if ($stmt->affected_rows > 0) {
  echo "Pedido realizado com sucesso!";
} else {
  echo "Erro ao realizar o pedido.";
}

// Fecha o prepared statement
$stmt->close();

// Fecha a conexão com o banco de dados
$conn->close();
?>
