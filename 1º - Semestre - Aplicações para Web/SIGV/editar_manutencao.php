<?php

include ("conexao.php");
include ("protecao.php");

// Inicializa as variáveis
$tipo_manutencao = $descricao = $dt_manutencao = "";

// Verifica se o ID do usuário a ser editado foi enviado via GET
if (isset($_GET['id'])) {
    $id_manutencao = $_GET['id'];

    // Consulta a manutenção no banco de dados
    $sql_select = "SELECT id_tipo_manutencao, descricao, dt_revisao FROM manutencoes WHERE id = ?";
    $stmt_select = $mysqli->prepare($sql_select);
    $stmt_select->bind_param("i", $id_manutencao);
    $stmt_select->execute();
    $stmt_select->bind_result($tipo_manutencao, $descricao, $dt_manutencao);
    $stmt_select->fetch();
    $stmt_select->close();

    // Verifica se a viatura foi encontrada
    if (empty($id_manutencao)) {
        // Redireciona com mensagem de erro se a manutenção não foi encontrada
        header("Location: manutencoes.php?erro=manutencao_nao_encontrada");
        exit;
    }
} else {
    // Redireciona se o ID da manutencao não foi fornecido
    header("Location: manutencoes.php");
    exit;
}

// Verifica se o formulário foi submetido via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $tipo_manutencao = $_POST['id_tipo_manutencao'];
    $descricao = $_POST['descricao'];
    $dt_manutencao = $_POST['data_manutencao'];

    // Validando entrada do usuário (exemplo simples)
    if (empty($tipo_manutencao) || empty($descricao) || empty($dt_manutencao)) {
        die("Por favor, preencha todos os campos obrigatórios.");
    };

    // Prepara a consulta de atualização
    $sql_update = "UPDATE manutencoes SET id_tipo_manutencao = ?, descricao = ?, dt_revisao = ?";
    $params = array($tipo_manutencao, $descricao, $dt_manutencao);


    // Adiciona o ID da manutenção à lista de parâmetros
    $sql_update .= " WHERE id = ?";
    $params[] = $id_manutencao;

    // Atualiza os dados da manutencao no banco de dados
    $stmt = $mysqli->prepare($sql_update);
    $stmt->bind_param(str_repeat("s", count($params)), ...$params);

    if ($stmt->execute()) {
        header("Location: manutencoes.php");
        echo "Erro ao atualizar manutencao: " . $mysqli->error;
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
    <script src="https://kit.fontawesome.com/f25d5e2892.js" crossorigin="anonymous"></script>
    <title>Editar Viatura</title>
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
                        <a class="nav-link" href="acompanhamentos.php">ACOMPANHAMENTO</a>
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
            <h1>Editar Ordem de Serviço</h1>
            <form action="" method="POST">
                <div>
                    <label>Status</label>
                    <select class="form-control" id="id_tipo_manutencao" name="id_tipo_manutencao" required>
                                <option value="2"<?php if ($tipo_manutencao == 2)
                            echo 'selected'; ?>>CORRETIVA</option>
                                <option value="3"<?php if ($tipo_manutencao == 3)
                            echo 'selected'; ?>>PREVENTIVA</option>
                                <option value="4"<?php if ($tipo_manutencao == 4)
                            echo 'selected'; ?>>INSPEÇÃO TÉCNICA</option>
                            </select>
                </div>
                <div>
                    <label>Descrição</label>
                    <textarea class="form-control" rows="5" name="descricao"><?php echo $descricao; ?></textarea>
                </div>
                <div>
                    <label>Data da Manutenção</label>
                    <input type="date" class="form-control" id="data_manutencao" name="data_manutencao" value="<?php echo $dt_manutencao; ?>">
                </div>
                <div style="padding-top: 10px;">
                    <button class="btn btn-forms btn-success" type="submit">Atualizar</button>
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