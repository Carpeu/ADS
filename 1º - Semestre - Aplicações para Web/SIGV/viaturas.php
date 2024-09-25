<?php
include ("conexao.php");
include ("protecao.php");

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['nome_usuario'])) {
    $nome_usuario = $_SESSION['nome_usuario'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_excluir'])) {
    $id_viatura = $_POST['id_excluir'];

    $sql_delete = "DELETE FROM viaturas WHERE id = ?";
    $stmt = $mysqli->prepare($sql_delete);
    $stmt->bind_param("i", $id_viatura);
    $stmt->execute();

    $stmt->close();
}

$sql_select = "SELECT id, nome, login FROM usuarios";
$resultado = $mysqli->query($sql_select);

$contagem_viaturas = "SELECT m.modelo AS Modelo, COUNT(v.id_modelo) AS Unidades
FROM modelos_viaturas m
LEFT JOIN viaturas v ON m.id = v.id_modelo
GROUP BY m.id";
$resultado_contagem = mysqli_query($mysqli, $contagem_viaturas);

$consulta_adm = "SELECT adm FROM usuarios WHERE nome = '$nome_usuario'";
$resultado_adm = $mysqli->query($consulta_adm);
if ($resultado_adm) {
    if ($resultado_adm->num_rows > 0) {
        $row = $resultado_adm->fetch_assoc();
        $adm = $row['adm'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f25d5e2892.js" crossorigin="anonymous"></script>
    <title>Lista de Viaturas</title>
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
            <div class="col-md-8">
                <h1>Lista de Viaturas</h1>
                <div class="pb-3">
                    <a href="cadastra_viatura.php" class="btn btn-success">Cadastrar Novo Veículo</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Placa</th>
                            <th>Prefixo</th>
                            <th>Ano</th>
                            <th>Modelo</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_select = "SELECT viaturas.id, 
                viaturas.placa, 
                viaturas.prefixo, 
                modelos_viaturas.modelo,
                viaturas.ano,  
                tipo_manutencoes.manutencao 
                FROM `viaturas` 
                INNER JOIN modelos_viaturas ON viaturas.id_modelo = modelos_viaturas.id 
                INNER JOIN tipo_manutencoes ON viaturas.id_tipo_manutencao = tipo_manutencoes.id;";

                        $resultado = $mysqli->query($sql_select);

                        while ($row = $resultado->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['placa']; ?></td>
                                <td><?php echo $row['prefixo']; ?></td>
                                <td><?php echo $row['ano']; ?></td>
                                <td><?php echo $row['modelo']; ?></td>
                                <td><?php echo $row['manutencao']; ?></td>
                                <td>
                                    <a href="editar_viatura.php?id=<?php echo $row['id']; ?>"
                                        class="btn btn-primary">Editar</a>
                                    <form action="" method="POST" style="display: inline;">
                                        <input type="hidden" name="id_excluir" value="<?php echo $row['id']; ?>">
                                        <?php if ($adm == 1): ?>
                                            <form action="" method="POST" style="display: inline;">
                                                <input type="hidden" name="id_excluir" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-danger">Excluir</button>
                                            </form>
                                        <?php endif; ?>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <!-- Card com o total de viaturas -->
                <div class="card" style="border: solid 2px;">
                    <div class="card-body">
                        <h5 class="card-title">Total de Viaturas na Frota</h5>
                        <ul class="list-group list-group-flush">
                            <!-- Lista de viaturas aqui -->
                            <?php while ($row = mysqli_fetch_assoc($resultado_contagem)): ?>
                                <li class="list-group-item"><?php echo $row['Modelo']; ?> - <?php echo $row['Unidades']; ?>
                                    viaturas</li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
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