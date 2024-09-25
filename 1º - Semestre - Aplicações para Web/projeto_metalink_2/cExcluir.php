<?php
session_start();

// Inclui o arquivo conexao.php que contém as informações de conexão com o banco de dados.
include 'conexao.php';

// Verifica se o ID do usuário foi enviado via POST
if (isset($_POST['idusuario'])) {
  // Armazena o ID do usuário
  $id_cliente = $_POST['idusuario'];

  // Cria a consulta SQL para excluir o usuário
  $sql = "DELETE FROM usuario WHERE idusuario = $id_cliente";

  // Executa a consulta SQL
  $resultado = mysqli_query($conexao, $sql);

  // Verifica se a exclusão foi bem sucedida
  if ($resultado) {
    // Mensagem de sucesso e redirecionamento
    header("Location: listar_usuario.php?msg=Usuário excluído com sucesso!");
  } else {
    // Mensagem de erro e redirecionamento
    $msgERRO = mysqli_error($conexao);
    header("Location: listar_usuario.php?msg=$msgERRO");
  }
} else {
  // Mensagem de erro e redirecionamento
  header("Location: listar_usuario.php?msg=Erro: ID do usuário não informado!");
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);

?>
