<?php
session_start();

# Verificar se o usuário está logado
if(!isset($_SESSION['idusuario'])){
    header("Location: login.php"); // Redirecionar para a página de login se não estiver logado
    exit();
}

# Conectar ao banco de dados
$conexao = mysqli_connect("127.0.0.1", "root", "", "metalink"); 
if(!$conexao){
    die("Erro de conexão: " . mysqli_connect_error());
}

# Verificar se o ID do link foi fornecido na URL
if(!isset($_GET['id']) || empty($_GET['id'])){
    header("Location: listar_links.php"); // Redirecionar de volta para a lista de links se o ID não for fornecido
    exit();
}

$idLink = $_GET['id'];
$idUsuario = $_SESSION['idusuario'];

# Verificar se o usuário é o proprietário do link
$sql = "SELECT * FROM links WHERE idLinks = $idLink AND Usuario_idUsuario = $idUsuario";
$resultado = mysqli_query($conexao, $sql);

if(mysqli_num_rows($resultado) == 0){
    header("Location: listar_links.php"); // Redirecionar de volta para a lista de links se o usuário não for o proprietário do link
    exit();
}

# Excluir o link do banco de dados
$sql = "DELETE FROM links WHERE idLinks = $idLink";
$resultado = mysqli_query($conexao, $sql);

if($resultado){
    header("Location: listar_links.php"); // Redirecionar de volta para a lista de links após a exclusão
    exit();
} else {
    echo "Erro ao excluir o link.";
}

mysqli_close($conexao);
?>
