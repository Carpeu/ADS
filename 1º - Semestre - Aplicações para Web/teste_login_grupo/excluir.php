<?php
session_start();

// Inclui o arquivo conexao.php que contém as informações de conexão com o banco de dados.
include 'conexao.php';

// Verifica se o ID do usuário está presente na URL via GET
if (isset($_GET['id'])) {
  // Armazena o ID recebido via GET
  $id_cliente = $_GET['id'];
} else {
  // Caso não haja ID na URL, redireciona para a página de listagem
  header("Location: listar_usuario.php?msg=Erro: ID do usuário não informado!");
  exit();
}

// Conecta ao banco de dados
$conexao = mysqli_connect("127.0.0.1", "root", "", "metalink");

// Verifica se a conexão foi bem sucedida
if (!$conexao) {
  echo "<p>Erro ao conectar ao banco de dados!</p>";
  exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuário | Excluir</title>
</head>
<body>
  <h3>Usuário | Excluir</h3>
  <p>Deseja realmente excluir o usuário <strong><?php echo $id_cliente; ?></strong>?</p>
  <form method="post" action="cExcluir.php">
    <input type="hidden" name="idusuario" value="<?php echo $id_cliente; ?>">
    <input type="submit" value="SIM"> &nbsp;
    <button><a href="listar_usuario.php">NÃO</a></button>
  </form>
</body>
</html>
