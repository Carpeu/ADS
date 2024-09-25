<?php

include ("conexao.php");
include ("protecao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $acess = $_POST['acesso'];


    $sql_query_registro = "INSERT INTO usuarios (nome, login, senha,adm) VALUES ('$nome', '$email', '$senha','$acess')";

    if ($mysqli->query($sql_query_registro) === TRUE) {
        $sql_login = "SELECT * FROM usuarios WHERE login = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_login);

        $usuario = $sql_query->fetch_assoc();

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['user'] = $usuario['id'];
        $_SESSION['name'] = $usuario['nome'];

        header("Location: usuarios.php");

    } else {
        echo "Erro ao registrar o usuário: " . $mysqli->error;
    }
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
    <title>Cadastro</title>
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-lg">
            <div class="container-fluid p-5">
                <a class="navbar-brand" href="bem-vindo.php"><img src="assets/imagens/logo.png" alt="Logo" width="90" height="90"
                        class="d-inline-block align-text-top"></a>
                <ul class="nav menu">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="usuarios.php">USUÁRIOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viaturas.php">FROTA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="acompanhamento.php">ACOMPANHAMENTO</a>
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
            <h1>Cadastro de Usuário</h1>
            <form action="" method="POST">
                <div>
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" required>
                </div>
                <div>
                    <label>Login</label>
                    <input type="text" class="form-control" name="email" required>
                </div>
                <div>
                    <label>Senha</label>
                    <input type="password" class="form-control" name="senha" required>
                </div>
                <div class="form-group">
                    <label for="acesso">Função:</label>
                    <select class="form-control" name="acesso">
                        <option value="1">Administrador</option>
                        <option value="0">Operador</option>
                    </select>
                </div>
                <div style="padding-top: 10px;">
                    <button class="btn btn-success" type="submit">Cadastrar</button>
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