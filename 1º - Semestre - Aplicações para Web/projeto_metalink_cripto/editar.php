<?php
session_start();

# Conectar ao banco de dados
$conexao = mysqli_connect("127.0.0.1", "root", "", "metalink"); 
if(!$conexao){
    die("Erro de conexão: " . mysqli_connect_error());
}

if(!isset($_SESSION['idusuario']) || empty($_SESSION['idusuario'])) {
    header("Location: inicio.php"); // Redirecionar para a página inicial se o ID do usuário não estiver presente na sessão
    exit();
}

# Obter o ID do usuário da sessão
$idUsuario = $_SESSION['idusuario'];

# Consultar informações do usuário
$stmt = $conexao->prepare("SELECT * FROM usuario WHERE idusuario = ?");
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$resultado = $stmt->get_result();

# Verificar resultado
if (!$resultado) {
    $msgERRO = "<p>Falha ao buscar Usuario. Verifique!</p>";
    $msgERRO .= mysqli_error($conexao);
    echo $msgERRO;
    exit();
}

# Obter dados do usuário
$arResultado = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Usuario | Editar</title> 
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            padding-top: 40px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        h3 {
            margin-bottom: 20px;
            text-align: center;
        }
        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        form a{
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head> 
<body> 
    <div class="container"> 
        <h3>Usuario | Editar</h3> 
        <form method="post" action="cEditar.php">
            <label for="nome">Nome:</label>
            <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $arResultado['idusuario']; ?>">
            Nome:
            <input type="text" id="nome" name="nome" value="<?php echo $arResultado['nome']; ?>">
            
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" value="<?php echo $arResultado['email']; ?>">
            
            <label for="password">Senha:</label>
            <input type="text" id="password" name="password" value="<?php echo $arResultado['password']; ?>">
            
            <label for="user">User:</label>
            <input type="text" id="user" name="user" value="<?php echo $arResultado['user']; ?>">
            
            <label for="telefone">Telefone:</label>
            <input type="number" id="telefone" name="telefone" value="<?php echo $arResultado['telefone']; ?>">
            
            <input type="submit" value="EDITAR"> 
            
            <a href="inicio.php" class="btn btn-secondary">VOLTAR</a>
        </form> 
            
    </div>
    <!-- Adicionando jQuery e Popper.js para funcionalidades avançadas do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <!-- Adicionando Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body> 
</html> 
