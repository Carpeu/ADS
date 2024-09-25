<?php

session_start(); // Inicia a sessão para permitir o armazenamento de dados na sessão do usuário

// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se os campos de email e senha foram enviados pelo formulário
if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email']; // Obtém o email digitado pelo usuário
  $password = $_POST['password']; // Obtém a senha digitada pelo usuário

  // Cria a consulta SQL para selecionar o usuário com o email informado
  $sql = "SELECT idusuario, nome, email, password FROM usuario WHERE email='$email'";

  $resultado = $conexao->query($sql); // Executa a consulta SQL e armazena o resultado

  if ($resultado->num_rows == 1) { // Verifica se o número de linhas retornadas pela consulta é 1

    $arResultado = $resultado->fetch_assoc(); // Obtém a primeira linha do resultado

    // Verifica se a senha digitada pelo usuário corresponde à senha armazenada no banco de dados
    if ($password === $arResultado['password']) { // O operador === em PHP é usado para comparação de identidade. Ele verifica se os dois operandos são iguais em valor e tipo.
      $_SESSION['idusuario'] = $arResultado ['idusuario']; // Armazena o ID do usuário na sessão
      $_SESSION['nome'] = $arResultado['nome']; // Armazena o nome do usuário na sessão

      header("Location: inicio.php"); // Redireciona o usuário para a página inicial
      exit(); // Encerra o script após o redirecionamento
    } else {
      echo "Senha incorreta!"; // Exibe uma mensagem de erro informando que a senha está incorreta
    }
  } else {
    echo "Usuário não encontrado!"; // Exibe uma mensagem de erro informando que o usuário não foi encontrado
  }
} else {
  echo "Campos de email e senha não foram enviados!"; // Exibe uma mensagem de erro informando que os campos não foram enviados
}

$conexao->close(); // Fecha a conexão com o banco de dados
exit(); // Encerra a execução do script
?>
