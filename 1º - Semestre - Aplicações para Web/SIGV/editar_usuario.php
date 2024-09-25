<?php

include ("conexao.php");
include ("protecao.php");

// Inicializa as variáveis
$nome_usuario = $email_usuario = "";

// Verifica se o ID do usuário a ser editado foi enviado via GET
if (isset($_GET['id'])) {
    $usuario_id = $_GET['id'];

    // Consulta o usuário no banco de dados
    $sql_select = "SELECT nome, login FROM usuarios WHERE id = ?";
    $stmt_select = $mysqli->prepare($sql_select);
    $stmt_select->bind_param("i", $usuario_id);
    $stmt_select->execute();
    $stmt_select->bind_result($nome_usuario, $email_usuario);
    $stmt_select->fetch();
    $stmt_select->close();

    // Verifica se o usuário foi encontrado
    if (empty($nome_usuario)) {
        // Redireciona com mensagem de erro se o usuário não foi encontrado
        header("Location: usuarios.php?erro=usuario_nao_encontrado");
        exit;
    }
} else {
    // Redireciona se o ID do usuário não foi fornecido
    header("Location: usuarios.php");
    exit;
}

// Verifica se o formulário foi submetido via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Validando entrada do usuário (exemplo simples)
    if (empty($nome) || empty($email)) {
        die("Por favor, preencha todos os campos obrigatórios.");
    }

    // Prepara a consulta de atualização
    $sql_update = "UPDATE usuarios SET nome = ?, login = ?";
    $params = array($nome, $email);

    // Verifica se uma nova senha foi fornecida
    if (!empty($senha)) {
        // Se uma nova senha foi fornecida, criptografa-a
        $sql_update .= ", senha = ?";
        $params[] = md5($senha);
    }

    // Adiciona o ID do usuário à lista de parâmetros
    $sql_update .= " WHERE id = ?";
    $params[] = $usuario_id;

    // Atualiza os dados do usuário no banco de dados
    $stmt = $mysqli->prepare($sql_update);
    $stmt->bind_param(str_repeat("s", count($params)), ...$params);

    if ($stmt->execute()) {
        header("Location: usuarios.php");
        echo "Erro ao atualizar usuário: " . $mysqli->error;
    }

    // Fecha a declaração preparada
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f25d5e2892.js" crossorigin="anonymous"></script>
    <title>Editar Usuário</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid p-5">
                <a class="navbar-brand" href="bem-vindo.php"><img src="assets/imagens/logo.png" alt="Logo" width="90"
                        height="90" class="d-inline-block align-text-top"></a>
                <ul class="nav menu">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="usuarios.php">USUÁRIOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viaturas.php">FROTA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="acompanhament.php">ACOMPANHAMENTO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manutencoes.php">MANUTENÇÕES</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="cardLogin">
            <h1>Editar Usuário</h1>
            <form action="" method="POST">
                <div>
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo $nome_usuario; ?>" required>
                </div>
                <div>
                    <label>Login</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $email_usuario; ?>" required>
                </div>
                <div>
                    <label>Nova Senha</label>
                    <input type="password" class="form-control" name="senha">
                </div>
                <div style="padding-top: 10px;">
                    <button class="btn btn-forms btn-success" type="submit">Atualizar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>
</body>

</html>