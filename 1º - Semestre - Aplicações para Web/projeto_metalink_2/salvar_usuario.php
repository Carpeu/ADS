<?php
// Inicia a sessão para permitir o armazenamento de dados na sessão do usuário
session_start();

// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se os campos 'email' e 'senha' estão definidos em $_POST
if (isset($_POST['email']) && isset($_POST['password'])) {

    // Obtém o nome digitado pelo usuário
    $nome = $_POST['nome'];

    // Obtém o email digitado pelo usuário
    $email = $_POST['email'];

    // Obtém a senha digitada pelo usuário e criptografa
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $user = $_POST['user'];

    $telefone = $_POST['telefone'];

    // Cria a consulta SQL para inserir o novo usuário com a senha criptografada
    $sql = "INSERT INTO usuario (nome, email, password, user, telefone) VALUES ('$nome', '$email', '$password', '$user', '$telefone')";

    // Executa a consulta SQL
    $resultado = $conexao->query($sql); // Executa a consulta SQL e armazena o resultado em uma variável.

    if ($resultado) {
        // Inserção bem-sucedida
        echo "<p>Cadastro realizado com sucesso!</p>";
        header("Location: inicio.php"); // Redireciona o navegador do usuário para a página especificada
    } else {
        // Erro na inserção
        echo "<p>Falha ao cadastrar: " . $conexao->error . "</p>";
    }
} else {
    // Exibe mensagem de erro caso algum campo não tenha sido enviado
    echo "<p>Email ou senha não informados!</p>";
}

// Fecha a conexão com o banco de dados
$conexao->close();

?>
