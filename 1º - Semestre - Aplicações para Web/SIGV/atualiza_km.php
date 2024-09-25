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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se o ID da viatura foi enviado via POST
    if (isset($_POST['viatura_id']) && isset($_POST['km_atual'])) {
        // Limpar e validar os dados recebidos
        $viatura_id = $_POST['viatura_id'];
        $nova_km_atual = $_POST['km_atual'];

        // Atualizar a quilometragem atual no banco de dados
        $sql_update = "UPDATE quilometros SET km_atual = $nova_km_atual WHERE id_viatura = $viatura_id";
        if ($mysqli->query($sql_update) === TRUE) {
            echo "Quilometragem atual atualizada com sucesso!";
            header("Location: acompanhamento.php");
        } else {
            echo "Erro ao atualizar a quilometragem atual: " . $mysqli->error;
        }
    } else {
        echo "ID da viatura ou nova quilometragem atual não fornecidos.";
    }
}

// Recuperar a quilometragem atual da viatura com base no ID fornecido na URL
if (isset($_GET['id'])) {
    $viatura_id = $_GET['id'];
    $sql_select = "SELECT km_atual FROM quilometros WHERE id_viatura = $viatura_id";
    $resultado = $mysqli->query($sql_select);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $km_atual = $row['km_atual'];
    } else {
        echo "Viatura não encontrada.";
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
        <h1 class="mt-5 mb-4">Atualizar Quilometragem Atual</h1>
        <?php if (isset($km_atual)): ?>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type="hidden" name="viatura_id" value="<?php echo $viatura_id; ?>">
                        <div class="form-group">
                            <label for="km_atual">Quilometragem Atual:</label>
                            <input type="number" id="km_atual" name="km_atual" value="<?php echo $km_atual; ?>"
                                class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
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