<?php
include ("conexao.php");
include ("protecao.php");

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['nome_usuario'])) {
    $nome_usuario = $_SESSION['nome_usuario'];
}

$consulta_adm = "SELECT adm FROM usuarios WHERE nome = '$nome_usuario'";
$resultado_adm = $mysqli->query($consulta_adm);

if ($resultado_adm) {
    // Verifica se algum resultado foi retornado
    if ($resultado_adm->num_rows > 0) {
        $row = $resultado_adm->fetch_assoc();
        $adm = $row['adm'];

        if ($adm != 1) {
            header("Location: acesso_negado.php");
            exit();
        }
    }
} else {
    echo "Erro na consulta: " . $mysqli->error;
}



// Verifica se o formulário foi submetido via POST para excluir o usuário
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_excluir'])) {
    $usuario_id = $_POST['id_excluir'];

    // Prepara e executa a consulta de exclusão
    $sql_delete = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $mysqli->prepare($sql_delete);
    $stmt->bind_param("i", $usuario_id);

    if ($usuario_id != 1) {
        if ($stmt->execute()) {
            // Redireciona de volta para a página de lista de usuários após a exclusão
            header("Location: usuarios.php");
            exit;
        } else {
            echo "Erro ao excluir usuário: " . $mysqli->error;
        }
    } else {
        echo "Operação Não Permitida!";
    }


    // Fecha a declaração preparada
    $stmt->close();
}

// Consulta todos os usuários no banco de dados
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
    <title>Lista de Usuários</title>
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
        <h1>Lista de Usuários</h1>
        <div class="pb-3">
            <a href="cadastra_usuario.php" class="btn btn-success">Cadastrar Novo</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include ("conexao.php");

                $sql_select = "SELECT id, nome, login FROM usuarios";
                $resultado = $mysqli->query($sql_select);

                while ($row = $resultado->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['login']; ?></td>
                        <td>
                            <a href="editar_usuario.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a>
                            <form action="" method="POST" style="display: inline;">
                                <input type="hidden" name="id_excluir" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
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