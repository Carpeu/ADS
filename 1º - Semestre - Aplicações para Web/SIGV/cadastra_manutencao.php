<?php

include ("conexao.php");
include ("protecao.php");

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['nome_usuario'])) {
    $nome_usuario = $_SESSION['nome_usuario'];
    $id_usuario = $_SESSION['user'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $prefixo_viatura = $_POST["prefixo_viatura"];
    $tipo_manutencao = $_POST["id_tipo_manutencao"];
    $descricao = $_POST["descricao"];
    $km_atual = $_POST["km_atual"];
    $data_manutencao = $_POST["data_manutencao"];
    $consulta_viaturas = "SELECT id FROM viaturas WHERE prefixo = '$prefixo_viatura'";
    $resultado_viaturas = $mysqli->query($consulta_viaturas);

    if ($resultado_viaturas->num_rows > 0) {
        $row = $resultado_viaturas->fetch_assoc();
        $id_viatura = $row["id"];

        $registra_manutencao = "INSERT INTO manutencoes (id_viatura, id_usuario, id_tipo_manutencao, descricao, dt_revisao, dt_criacao) VALUES ('$id_viatura', '$id_usuario', '$tipo_manutencao', '$descricao', '$data_manutencao', CURDATE())";
        $registra_km = "UPDATE quilometros SET km_atual = $km_atual WHERE id_viatura = $id_viatura";
        $altera_status_viatura = "UPDATE viaturas SET id_tipo_manutencao = $tipo_manutencao WHERE id = $id_viatura";
        if($mysqli->query($registra_manutencao)){
            $mysqli->query($registra_km);
            $mysqli->query($altera_status_viatura);
            header("Location: viaturas.php");
        } else{
            echo "Erro ao cadastrar manutenção" . $mysqli->error;
        }
        
    } else {
        // Viatura não encontrada
        echo "Viatura não encontrada!";
    }
}
;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abertura de Manutenção</title>
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
                    <h2 class="mb-4">Nova Manutenção</h2>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="prefixo_viatura">Prefixo da Viatura:</label>
                            <input type="text" class="form-control" id="prefixo_viatura" name="prefixo_viatura">
                        </div>
                        <div class="form-group">
                            <label>Quilometragem Atual</label>
                            <input type="text" class="form-control" name="km_atual">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" id="id_tipo_manutencao" name="id_tipo_manutencao" required>
                                <option value="2">CORRETIVA</option>
                                <option value="3">PREVENTIVA</option>
                                <option value="4">INSPEÇÃO TÉCNICA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Descrição da Manutenção</label>
                            <textarea class="form-control" rows="5" name="descricao"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="data_manutencao">Data da Manutenção</label>
                            <input type="date" class="form-control" id="data_manutencao" name="data_manutencao">
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar Manutenção</button>
                </div>
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