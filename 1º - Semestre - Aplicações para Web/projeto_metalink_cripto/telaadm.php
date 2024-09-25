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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .logout-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="card-title">Bem-vindo, <?php echo $_SESSION['nome']; ?></h2>
                        <ul class="list-group mt-4">
                            <li class="list-group-item">
                                <a href="listar_usuario.php?idusuario=<?php echo $arResultado['idusuario']; ?>" class="btn btn-primary">Listar Todos os Usuários</a>
                            </li>
                            
                            <li class="list-group-item">
                                <a href="listar_todos_links.php" class="btn btn-primary">Listar Todos os Links Criados</a>
                            </li>
                            
                            
                        </ul>
                        <div class="text-center logout-btn">
                            <a href="logout.php" class="btn btn-danger">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>