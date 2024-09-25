<?php

include ("conexao.php");
include ("protecao.php");

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['nome_usuario'])) {
    $nome_usuario = $_SESSION['nome_usuario']; 
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $placa = $_POST['placa'];
    $prefixo = $_POST['prefixo'];
    $ano = $_POST['ano'];
    $id_modelo = $_POST['id_modelo'];
    $km_atual = $_POST['km_atual'];
    $km_ultima_manutencao = $_POST['km_ultima_revisao'];
    $km_proxima_manutencao = $km_ultima_manutencao + 10000;


    $sql_viatura = "INSERT INTO viaturas (placa, prefixo, ano, id_modelo) VALUES ('$placa', '$prefixo', '$ano', $id_modelo)";
    if($mysqli->query($sql_viatura)){
        $id_viatura = $mysqli->insert_id;
        $sql_km = "INSERT INTO quilometros (km_atual, km_ultima_revisao, km_proxima_revisao, id_viatura) VALUES ('$km_atual', '$km_ultima_manutencao', '$km_proxima_manutencao', '$id_viatura')";
        if($mysqli->query($sql_km)){
            echo "Km criada no banco";
        } else{
            echo "Erro ao cadastrar km" . $mysqli->error;
        }
        echo "Viatura Cadastrada com Sucesso!";
    } else{
        echo "Erro ao cadastrar viatura" . $mysqli->error;
    }
};

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Viaturas</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f25d5e2892.js" crossorigin="anonymous"></script>
</head>
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
                        <a class="nav-link" href="acompanhamento.php">ACOMPANHAMENTO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manutencoes.php">MANUTENÇÕES</a>
                    </li>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle"></i><?php 
                        echo "  $nome_usuario"; ?>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="logout.php">Logoff</a>
                    </div>
                </div>
            </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2 class="mb-4">Cadastro de Viaturas</h2>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="placa">Placa:</label>
                            <input type="text" class="form-control" id="placa" name="placa" required>
                        </div>
                        <div class="form-group">
                            <label for="prefixo">Prefixo:</label>
                            <input type="text" class="form-control" id="prefixo" name="prefixo" required>
                        </div>
                        <div class="form-group">
                            <label for="ano">Ano:</label>
                            <input type="text" class="form-control" id="ano" name="ano" required>
                        </div>
                        <div class="form-group">
                            <label for="id_modelo">Modelo:</label>
                            <select class="form-control" id="id_modelo" name="id_modelo" required>
                                <option value="1">ASX 2.0</option>
                                <option value="2">JOURNEY</option>
                                <option value="3">PAJERO DAKAR</option>
                                <option value="4">TRAILBLAZER</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="km_atual">Km Atual:</label>
                            <input type="text" class="form-control" id="km_atual" name="km_atual" required>
                        </div>
                        <div class="form-group">
                            <label for="km_ultima_revisao">Km Ultima Manutenção:</label>
                            <input type="text" class="form-control" id="km_ultima_revisao" name="km_ultima_revisao" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

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