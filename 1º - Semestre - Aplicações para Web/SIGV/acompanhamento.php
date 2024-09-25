<?php
include ("conexao.php");
include ("protecao.php");

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['nome_usuario'])) {
    $nome_usuario = $_SESSION['nome_usuario'];
}

$sql_select = "SELECT id, nome, login FROM usuarios";
$resultado = $mysqli->query($sql_select);




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f25d5e2892.js" crossorigin="anonymous"></script>
    <title>Acompanhamento de Viaturas</title>
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
    </header>
    <div class="container">
        <div class="row pt-4">
            <div class="col-md">
                <h1>Histórico de Viaturas</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Placa</th>
                            <th>Prefixo</th>
                            <th>Km Atual</th>
                            <th>Km Última Revisão</th>
                            <th>Km Próxima Revisão</th>
                            <th>Faltantes</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_select = "SELECT
                        viaturas.id AS viatura_id, 
                        viaturas.placa AS placa,
                        viaturas.prefixo AS prefixo,
                        quilometros.km_atual AS km_atual,
                        quilometros.km_ultima_revisao AS km_ultima_revisao,
                        quilometros.km_proxima_revisao AS km_proxima_revisao
                    FROM
                        `quilometros`
                    INNER JOIN viaturas ON quilometros.id_viatura = viaturas.id;";

                        $resultado = $mysqli->query($sql_select);

                        while ($row = $resultado->fetch_assoc()) {
                            // Calculando a quilometragem faltante para a próxima revisão
                            $quilometragem_atual = $row['km_atual'];
                            $proxima_revisao = $row['km_proxima_revisao'];
                            $quilometragem_faltante = $proxima_revisao - $quilometragem_atual;

                            // Determinando o status com base na quilometragem faltante
                            if ($quilometragem_faltante <= 0) {
                                $status = 'Revisão necessária';
                                $status_class = 'text-danger'; // vermelho
                            } elseif ($quilometragem_faltante <= 1000) {
                                $status = 'Em dia';
                                $status_class = 'text-warning'; // amarelo
                            } else {
                                $status = 'Em dia';
                                $status_class = 'text-success'; // verde
                            }

                            ?>
                            <tr>
                                <td><?php echo $row['placa']; ?></td>
                                <td><?php echo $row['prefixo']; ?></td>
                                <td><?php echo $row['km_atual']; ?></td>
                                <td><?php echo $row['km_ultima_revisao']; ?></td>
                                <td><?php echo $row['km_proxima_revisao']; ?></td>
                                <td><?php echo $quilometragem_faltante; ?></td>
                                <td class="<?php echo $status_class; ?>"><?php echo $status; ?></td>
                                <td>
                                    <a href="atualiza_km.php?id=<?php echo $row['viatura_id']; ?>" class="btn btn-primary">Atualizar
                                        KM</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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