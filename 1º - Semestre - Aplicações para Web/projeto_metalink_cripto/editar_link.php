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

# Consultar os detalhes do link
$sql = "SELECT * FROM links WHERE idLinks = $idLink";
$resultado = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($resultado);

# Verificar se o formulário foi enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
    # Recuperar os novos valores do formulário
    $novoTitulo = $_POST['novo_titulo'];
    $novoLink = $_POST['novo_link'];
    $novoStatus = $_POST['novo_status'];

    # Atualizar os valores no banco de dados
    $sql = "UPDATE links SET titulo = '$novoTitulo', link = '$novoLink', bolAtivo = '$novoStatus' WHERE idLinks = $idLink";
    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        header("Location: listar_links.php"); // Redirecionar de volta para a lista de links após a atualização
        exit();
    } else {
        echo "Erro ao atualizar o link.";
    }
}

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Link</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Link</h1>
        <form method="post">
            <div class="form-group">
                <label for="novo_titulo">Novo Título:</label>
                <input type="text" class="form-control" id="novo_titulo" name="novo_titulo" value="<?php echo $row['titulo']; ?>">
            </div>
            <div class="form-group">
                <label for="novo_link">Novo Link:</label>
                <input type="text" class="form-control" id="novo_link" name="novo_link" value="<?php echo $row['link']; ?>">
            </div>
            <div class="form-group">
                <label for="novo_status">Novo Status:</label>
                <select class="form-control" id="novo_status" name="novo_status">
                    <option value="1" <?php if($row['bolAtivo'] == 1) echo 'selected'; ?>>Ativo</option>
                    <option value="0" <?php if($row['bolAtivo'] == 0) echo 'selected'; ?>>Inativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="listar_links.php" class="btn btn-primary">Voltar</a>
        </form>
    </div>
    <!-- Adicionando Bootstrap JS (opcional, apenas se necessário) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
