<?php
include ("conexao.php");
include ("protecao.php");

if (!isset($_SESSION)) {
    session_start();
}

$nome_usuario = "";
$id_usuario = 0;

if (isset($_SESSION['nome_usuario'])) {
    $nome_usuario = $_SESSION['nome_usuario'];
    $id_usuario = $_SESSION['user'];
}

if (!empty($nome_usuario)) {
    // Escapando a variável para evitar injeção de SQL
    $nome_usuario = mysqli_real_escape_string($mysqli, $nome_usuario);
    $consulta_id = "SELECT id FROM usuarios WHERE nome = '$nome_usuario'";
    $resultado_id = mysqli_query($mysqli, $consulta_id);

    if ($resultado_id) {
        $row = mysqli_fetch_assoc($resultado_id);
        $id_usuario = $row['id'] ?? 0;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f25d5e2892.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid p-5">
                <a class="navbar-brand" href="bem-vindo.php">
                    <img src="assets/imagens/logo.png" alt="Logo" width="90" height="90" class="d-inline-block align-text-top">
                </a>
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
                <div class="dropdown">
                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        <?php echo htmlspecialchars($nome_usuario); ?>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="logout.php">Logoff</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="bem-vindo">
        <h1>Bem Vindo ao SIGV </h1>
        <h2> Gestão de Viaturas</h2>
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
