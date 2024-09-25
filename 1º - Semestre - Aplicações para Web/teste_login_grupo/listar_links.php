<?php
// Conectar ao banco de dados
$conexao = mysqli_connect("127.0.0.1", "root", "", "metalink");

// Verificar se a conexão foi bem-sucedida
if(!$conexao) {
    echo "Erro ao conectar ao banco de dados.";
    exit();
}


$sql = "SELECT l.idLinks, l.titulo, l.url, l.bolAtivo, u.idusuario, u.user, u.email, u.nome
FROM links l
INNER JOIN usuario u ON l.usuario_idusuario = u.idusuario
ORDER BY l.id_links ASC";
 


// Executar a consulta
$resultado = mysqli_query($conexao, $sql);

// Verificar se a consulta teve sucesso
if(!$resultado) {
    echo "Erro ao consultar o banco de dados.";
    mysqli_close($conexao);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Links</title>
</head>
<body>
    <h3>Listagem de Links</h3>
    <table border="1">
        <tr>
            <th>ID Link</th>
            <th>Título</th>
            <th>URL</th>
            <th>Ativo</th>
            <th>Usuario</th>

            
        </tr>
        <?php while($links = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?php echo $links['idLinks']; ?></td>
            <td><?php echo $links['titulo']; ?></td>
            <td><?php echo $links['url']; ?></td>
            <td><?php echo $links['bolAtivo']; ?></td>
            <td><?php echo $links['Usuario_idUsuario']; ?></td>
            
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>
