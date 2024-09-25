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

# Consultar links do banco de dados
$idUsuario = $_SESSION['idusuario'];
$sql = "SELECT * FROM links";
$resultado = mysqli_query($conexao, $sql);

# Exibir links
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Links</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            padding-top: 40px;
        }
        .link-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .link-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .link-card h3 {
            margin-bottom: 10px;
            color: #333;
        }
        .link-card a {
            text-decoration: none;
        }
        .link-card a:hover {
            text-decoration: underline;
        }
        .link-card .edit-link, .link-card .delete-link {
            color: #fff;
            margin-right: 10px;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        .edit-link {
            background-color: #28a745;
        }
        .edit-link:hover {
            background-color: #218838;
        }
        .delete-link {
            background-color: #dc3545;
        }
        .delete-link:hover {
            background-color: #c82333;
        }
        .add-link-btn {
            margin-bottom: 20px;
        }
        /* Estilo para links inativos */
        .inactive-link {
            pointer-events: none; /* Desativa o link */
            color: #6c757d; /* Altera a cor do texto para cinza */
        }
    </style>
</head>
<body>
    <div class="link-container">
        <div class="text-center">
            <h1 class="mb-4">Meta Links</h1>
            <a href="links.php" class="btn btn-primary add-link-btn">Adicionar Link</a>
        </div>
        <?php
        if(mysqli_num_rows($resultado) > 0){
            while($row = mysqli_fetch_assoc($resultado)){
        ?>
                <div class="link-card">
                    <h3><?php echo $row['titulo']; ?></h3>
                    <p><a <?php echo ($row['bolAtivo'] == 0 ? 'class="inactive-link"' : ''); ?> href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['link']; ?></a></p>
                    <p>Ativo: <?php echo ($row['bolAtivo'] == 1 ? 'Sim' : 'Não'); ?></p>
                    <a href="editar_link.php?id=<?php echo $row['idLinks']; ?>" class="edit-link">Editar</a>
                    <a href="excluir_link.php?id=<?php echo $row['idLinks']; ?>" class="delete-link">Excluir</a>
                </div>
        <?php
            }
        } else {
            echo "<p class='text-center'>Nenhum link encontrado.</p>";
        }
        ?>
        <div class="text-center">
            <a href="logout.php" class="btn btn-secondary">Sair</a>
        </div>
    </div>

    <!-- Adicionando jQuery e Popper.js para funcionalidades avançadas do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <!-- Adicionando Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>