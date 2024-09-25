<?php

include ("conexao.php");

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu email";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string(md5($_POST['senha']));

        $sql_login = "SELECT * FROM usuarios WHERE login = '$email' AND senha = '$senha'";
        $sql_consulta = $mysqli->query($sql_login) or die("Falha na consulta!" . $mysqli->error);

        $quantidade = $sql_consulta->num_rows;

        if ($quantidade == 1) {

            $usuario = $sql_consulta->fetch_assoc();


            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['nome_usuario'] = $usuario['nome'];
            $_SESSION['user'] = $usuario['id'];


            header("Location: bem-vindo.php");

        } else {
            echo "Usuário ou Senha incorretos!";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f25d5e2892.js" crossorigin="anonymous"></script>
</head>
</head>

<body class="index">
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid p-5">
                <a class="navbar-brand" href="#"><img src="assets/imagens/logo.png" alt="Logo" width="90" height="90"
                        class="d-inline-block align-text-top"></a>
                <button class="btn btn-light btn-lg btn-login" type="button" data-bs-toggle="modal"
                    data-bs-target="#login">Login</button>
            </div>
            </div>
        </nav>
    </header>

    <!--Inicio Modal Login -->

    <div class="modal fade" id="login" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h1>Acesse seu Login</h1>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="InputEmail" class="form-label">Login</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="InputPassword" class="form-label">Senha</label>
                            <input type="password" class="form-control" name="senha">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Final Modal Login -->

    <div class="index-propaganda">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="assets/imagens/police.gif" alt="GIF" class="img-fluid">
            </div>
            <div class="col-md-6 text-content align-items-center">
                <h1 class="propaganda">Controle Sua Frota de Viaturas</h1>
                <p class="propaganda">Essa tropa está feliz em usar o SIGV e acompanhar as suas viaturas, seja feliz também e assine o SIGV Gestão de Viaturas.</p>
                <button type="button" class="btn btn-assinatura">Assine Agora</button>            
            </div>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>