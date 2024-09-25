<?php
include 'conexao.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM Grupo WHERE idGrupo=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_grupo'];
    $descricao = $_POST['desc_grupo'];
    $tipo_grupo = $_POST['tipo_grupo'];
    $ativo = isset($_POST['bol_ativo']) ? 1 : 0;

    $sql = "UPDATE Grupo SET nome_grupo='$nome', desc_grupo='$descricao', tipo_grupo='$tipo_grupo', bol_ativo='$ativo' WHERE idGrupo=$id";
    $conn->query($sql);
    header("Location: listar_grupo.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Grupo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Grupo</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome_grupo" name="nome_grupo" value="<?php echo $row['nome_grupo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="desc_grupo" name="desc_grupo" required><?php echo $row['desc_grupo']; ?></textarea>
            </div>
            <div class="form-group">
    <label for="tipo_grupo">Tipo de Grupo</label>
    <select class="form-control" id="tipo_grupo" name="tipo_grupo" required>
        <option value="1" <?php if ($row['tipo_grupo'] == 1) echo 'selected'; ?>>Terceiros</option>
        <option value="2" <?php if ($row['tipo_grupo'] == 2) echo 'selected'; ?>>Funcionários</option>
        <option value="3" <?php if ($row['tipo_grupo'] == 3) echo 'selected'; ?>>Convidados</option>
    </select>
</div>

<div class="form-group">
    <label for="ativo">Ativo</label>
    <select class="form-control" id="ativo" name="ativo" required>
        <option value="1" <?php if ($row['bol_ativo'] == 1) echo 'selected'; ?>>Ativo</option>
        <option value="0" <?php if ($row['bol_ativo'] == 0) echo 'selected'; ?>>Inativo</option>
    </select>
</div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="listar_grupo.php" class="btn btn-danger btn-sm">voltar</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
