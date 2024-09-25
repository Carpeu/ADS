<?php
include ("conexao.php");
include ("protecao.php");

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['nome_usuario'])) {
    $nome_usuario = $_SESSION['nome_usuario'];

    // Recupera a informação de administrador do banco de dados
    $sql_admin_check = "SELECT adm FROM usuarios WHERE nome = ?";
    $stmt = $mysqli->prepare($sql_admin_check);
    $stmt->bind_param("s", $nome_usuario);
    $stmt->execute();
    $stmt->bind_result($is_admin);
    $stmt->fetch();
    $stmt->close();
}

$sql_select = "SELECT viaturas.prefixo AS prefixo, manutencoes.id AS id, DATE_FORMAT(manutencoes.dt_revisao, '%d/%m/%Y') AS dt_revisao, manutencoes.descricao AS descricao, manutencoes.status AS status FROM manutencoes INNER JOIN viaturas ON manutencoes.id_viatura = viaturas.id";
$resultado = $mysqli->query($sql_select);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['concluir_servico']) && isset($_POST['manutencao_id'])) {
    // Recupera o ID da manutenção
    $manutencao_id = $_POST['manutencao_id'];

    $_SESSION['manutencao_id'] = $manutencao_id;

    header("Location: concluir_servico.php");
    exit;
}

// Verifica se o formulário foi submetido via POST para excluir o usuário
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_excluir'])) {
    $id_manutencao = $_POST['id_excluir'];

    // Prepara e executa a consulta de exclusão
    $sql_delete = "DELETE FROM manutencoes WHERE id = ?";
    $stmt = $mysqli->prepare($sql_delete);
    $stmt->bind_param("i", $id_manutencao);

    if ($stmt->execute()) {
        echo "Manutenção excluída com sucesso.";
    } else {
        echo "Erro ao excluir manutenção: " . $stmt->error;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f25d5e2892.js" crossorigin="anonymous"></script>
    <title>Gerenciamento de Manutenções</title>
</head>

<body>
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
                    <i class="bi bi-person-circle"></i><?php echo "  $nome_usuario"; ?>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="logout.php">Logoff</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Gerenciamento de Manutenções</h1>
        <!-- Formulário de busca -->
        <form class="form-inline mb-4" method="GET" action="">
            <div class="form-group mr-2">
                <input type="text" class="form-control" name="prefixo" placeholder="Prefixo da Viatura">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <div class="pb-3">
            <a href="cadastra_manutencao.php" class="btn btn-success">Cadastrar Nova Manutenção</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Prefixo</th>
                    <th>Data da Manutenção</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Constrói a consulta SQL base
                $sql_select = "SELECT viaturas.prefixo AS prefixo, manutencoes.id AS id, DATE_FORMAT(manutencoes.dt_revisao, '%d/%m/%Y') AS dt_revisao, manutencoes.descricao AS descricao, manutencoes.status AS status FROM manutencoes INNER JOIN viaturas ON manutencoes.id_viatura = viaturas.id";

                // Verifica se houve uma busca
                if (isset($_GET['prefixo']) && !empty($_GET['prefixo'])) {
                    $prefixo = $_GET['prefixo'];
                    // Adiciona uma cláusula WHERE à consulta SQL
                    $sql_select .= " WHERE viaturas.prefixo LIKE '%$prefixo%'";
                }

                $resultado = $mysqli->query($sql_select);

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['prefixo'] . "</td>";
                        echo "<td>" . $row['dt_revisao'] . "</td>";
                        echo "<td>" . $row['descricao'] . "</td>";

                        if ($is_admin) {
                            echo "<td>";
                                echo "<div class='btn-group'>";
                                    echo "<a href='editar_manutencao.php?id=" . $row['id'] . "' class='btn btn-primary'><i class='fa-solid fa-pen-to-square'></i></a>";
                                    echo "<form action='' method='POST' style='display: inline; margin-left: 5px;'>";
                                        echo "<input type='hidden' name='id_excluir' value='" . $row['id'] . "'>";
                                        echo "<button type='submit' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button>";
                                    echo "</form>";
                                    if ($row['status'] == 0) {
                                        echo "<form method='post' action='' style='display: inline; margin-left: 5px;'>";
                                            echo "<input type='hidden' name='manutencao_id' value='" . $row['id'] . "'>";
                                            echo "<button type='submit' name='concluir_servico' class='btn btn-success'><i class='fa-solid fa-square-check'></i></button>";
                                        echo "</form>";
                                    }
                                echo "</div>";
                            echo "</td>";
                        } else {
                            echo "<td></td>";
                        }
                        echo "</tr>";
                    }

                } else {
                    echo "<tr><td colspan='5' class='text-center'>Nenhuma manutenção encontrada.</td></tr>";
                }
                ?>
            </tbody>
        </table>
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
