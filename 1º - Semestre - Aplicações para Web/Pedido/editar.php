
<?php
// Arquivo editar_pedido.php
include 'conexao.php';

$idPedido = $_POST['idPedido'];
$idCliente = $_POST['idCliente'];
$idProduto = $_POST['idProduto'];
$valorTotal = $_POST['valorTotal'];
$QTD = $_POST['quantidade'];

$sql = "UPDATE pedido SET idCliente = $idCliente, idProduto = $idProduto, valorTotal = $valorTotal, quantidade = $QTD WHERE idPedido = $idPedido";

if (mysqli_query($conexao, $sql)) {
    echo "Pedido atualizado com sucesso!";
} else {
    echo "Erro ao atualizar o pedido: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
</head>
<body>
<!-- Formulário para atualizar um pedido existente -->
<h2>Editar Pedido</h2>
    <form action="editar.php" method="POST">
        <label for="idPedido">ID Pedido:</label>
        <input type="number" id="idPedido" name="idPedido" required><br>

        <label for="idCliente">ID Cliente:</label>
        <input type="number" id="idCliente" name="idCliente" required><br>

        <label for="idProduto">ID Produto:</label>
        <input type="number" id="idProduto" name="idProduto" required><br>

        <label for="valorTotal">Valor Total:</label>
        <input type="number" id="valorTotal" name="valorTotal" step="0.01" required><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required><br>

        <button type="submit">Atualizar Pedido</button>
    </form>
</body>
</html>