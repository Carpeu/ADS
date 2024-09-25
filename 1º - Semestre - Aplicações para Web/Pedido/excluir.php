

<?php
// Arquivo excluir_pedido.php
include 'conexao.php';

$idPedido = $_GET['id'];

$sql = "DELETE FROM pedido WHERE idPedido = $idPedido";

if (mysqli_query($conexao, $sql)) {
    echo "Pedido excluído com sucesso!";
} else {
    echo "Erro ao excluir o pedido: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Pedido</title>
</head>
<body>
<!-- Formulário para excluir um pedido existente -->
<h2>Excluir Pedido</h2>
    <form action="excluir.php" method="GET">
        <label for="idPedidoExcluir">ID Pedido:</label>
        <input type="number" id="idPedidoExcluir" name="id" required><br>

        <button type="submit">Excluir Pedido</button>
    </form>
</body>
</html>