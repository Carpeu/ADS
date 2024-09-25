
<?php

session_start();  // Inicia uma sessão PHP. Isso permite o armazenamento e acesso de variáveis de sessão durante a interação do usuário com o site.
if (!isset($_SESSION['nome'])) {
    // Verifica se a variável de sessão 'nome' não está definida, o que indica que o usuário não está logado.
    // Nesse caso, redireciona para a página de login.
    header("Location: login.php");
    // Redireciona o navegador do usuário para a página especificada (login.php).
    // Isso é útil para direcionar usuários não autenticados para a página especificada antes de acessar páginas restritas.
    exit();
    // Finaliza o script para garantir que o código abaixo não seja executado se o redirecionamento ocorrer.
}
print_r($_SESSION);
include 'conexao.php'; // Inclui o arquivo conexao.php que contém as informações de conexão com o banco de dados.
	
if(isset($_GET['m']) ){  // Verifica se existe uma mensagem na URL.
    echo $_GET['m'];  // Exibe a mensagem na página.
}

# CONECTAR NO BD
$conexao = mysqli_connect("127.0.0.1", "root", "", "metalink");  // Estabelece conexão com o banco de dados MySQL

# CRIAR SCRIPT SQL
$sql = "SELECT * FROM usuario WHERE idusuario =" .  $_SESSION['idusuario']; // Define o script SQL para selecionar todos os produtos da tabela 'produto'

# EXECUTAR COMANDO SQL NO BD
$resultado = mysqli_query($conexao, $sql); // Executa o comando SQL no banco de dados

# VERIFICAR RESULTADO
if(! $resultado){ // Se houver falha na execução do comando SQL, exibe uma mensagem de erro
    $msgERRO = "<p> Falha ao buscar Usuario. Verifique!!</p>"; // Define uma mensagem de erro indicando falha ao buscar usuario e solicita que o usuário verifique
    $msgERRO .= mysqli_error($conexao);// Concatena a mensagem de erro com a mensagem de erro específica retornada pela função mysqli_error(),
    // que retorna a descrição do último erro ocorrido durante a execução da consulta SQL no banco de dados.
    echo $msgERRO; // Exibe a mensagem de erro completa na página.      
}

#CONVERTER EM VETOR
$arResultado = mysqli_fetch_assoc($resultado); // Converte o resultado da consulta em um array associativo
    
?>






<!DOCTYPE html> <!-- <!DOCTYPE html>: inicio do documento HTML -->
<html lang="pt-br"> <!-- <html lang="pt-br">: Define o idioma da página como português do Brasil-->
<head> <!-- <head>: Cabeçalho da página-->
    <meta charset="UTF-8"> <!-- <meta charset="UTF-8">: Define a codificação de caracteres como UTF-8-->
    <title>Página Inicial</title> <!-- <title>Página Inicial</title>: Define o título da página-->
</head> <!-- </head>: Cabeçalho da página-->
<body> <!-- <body>: Abre o corpo da página-->
    <h2>Bem-vindo, <?php echo $_SESSION['nome']; ?></h2> 
    <!-- Exibe o nome do usuário armazenado na variável de sessão 'nome'. -->
   <?php echo "<a href='links.php?idusuario=" . $arResultado['idusuario'] . "'>Cadastrar Link</a> | "; ?>
    
        <br>
    <a href="listar_links.php">Listar Links Criados <a>
        <br>
    



    <button><a href="logout.php">SAIR</a></button>
    <!-- Link para a página de logout. -->
</body> <!-- </body>: Fecha o corpo da página-->
</html> <!-- </html>: Fecha o documento HTML-->