

<?php
// Prepara a consulta SQL
$sql = "SELECT * FROM pedido 
INNER JOIN cliente ON pedido.idCliente = cliente.idCliente
INNER JOIN produto ON pedido.idProduto = produto.idProduto";

// Executa a consulta
// $sql = "SELECT * FROM pedido";
$resultado = mysqli_query($conexao, $sql);

// Verifica se a consulta foi bem-sucedida
echo "<h2>Lista de Pedidos</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>ID Cliente</th><th>ID Produto</th><th>Valor Total</th><th>Quantidade</th></tr>";

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $row['idPedido'] . "</td>";
    echo "<td>" . $row['idCliente'] . "</td>";
    echo "<td>" . $row['idProduto'] . "</td>";
    echo "<td>" . $row['valorTotal'] . "</td>";
    echo "<td>" . $row['quantidade'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Fecha a conexão com o banco de dados
$conn->close();
?>
