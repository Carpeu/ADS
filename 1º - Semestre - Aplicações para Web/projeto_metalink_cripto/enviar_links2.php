<?php
//session_start();
$idUsuario = $_GET['idusuario'];
# Conectar ao banco de dados
$conexao = mysqli_connect("127.0.0.1", "root", "", "metalink"); 
if(!$conexao){
    die("Erro de conexão: " . mysqli_connect_error());
}


# Verificar se o ID do usuário está presente na sessão
//if(!isset($_SESSION['idusuario']) || empty($_SESSION['idusuario'])) {
///   header("Location: inicio.php"); // Redirecionar para a página inicial se o ID do usuário não estiver presente na sessão
//   exit();
//}

# Obter o ID do usuário da sessão

# Consultar links do banco de dados para o usuário especificado
$sql = "SELECT * FROM links INNER JOIN usuario ON links.Usuario_idUsuario =
 Usuario_idUsuario WHERE usuario.idusuario = $idUsuario";
$resultado = mysqli_query($conexao, $sql);
$X = mysqli_fetch_assoc($resultado);
print_r ($sql);
# Exibir links
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Links do Usuário</title>
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
            color: #007bff;
            text-decoration: none;
        }
        .link-card a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="link-container">
    <h1 class="text-center mb-4">Links do <?php echo  $X['nome']; ?></h1>
        <?php
        // Executar a consulta novamente para contar o número de linhas
        
        $resultado = mysqli_query($conexao, $sql);
        if(mysqli_num_rows($resultado) > 0){
            while($row = mysqli_fetch_assoc($resultado)){
        ?>      
                <div class="link-card">
                    <h3><?php echo $row['titulo']; ?></h3>
                    <p><a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['link']; ?></a></p>
                    <p>Ativo: <?php echo ($row['bolAtivo'] == 1 ? 'Sim' : 'Não'); ?></p>
                </div>
        <?php
            }
        } else {
            echo "<p class='text-center'>Nenhum link encontrado para este usuário.</p>";
        }
        ?>
    </div>
        


    <!-- Adicionando jQuery e Popper.js para funcionalidades avançadas do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <!-- Adicionando Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
