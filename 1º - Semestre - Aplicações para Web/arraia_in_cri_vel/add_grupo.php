<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_grupo'];
    $descricao = $_POST['desc_grupo'];
    $tipo_grupo = $_POST['tipo_grupo'];
    $ativo = isset($_POST['bol_ativo']) ? 1 : 0;

    $sql = "INSERT INTO Grupo (nome_grupo, desc_grupo, tipo_grupo, bol_ativo) VALUES ('$nome', '$descricao', '$tipo_grupo', '$ativo')";
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
    <title>Adicionar Grupo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Adicionar Grupo</h1>
        <form method="POST">

            <div class="form-group">
                <label for="nome_grupo">Nome</label>
                <input type="text" class="form-control" id="nome_grupo" name="nome_grupo" placeholder="Digite o nome do grupo" required>
            </div>
            <div class="form-group">

                <label for="desc_grupo">Descrição</label>
                <textarea class="form-control" id="desc_grupo" name="desc_grupo" placeholder="Digite a descrição" required></textarea>
            </div>
            <div class="form-group">
            <div class="form-group">

    <label for="tipo_grupo">Tipo de Grupo</label>
    <select class="form-control" id="tipo_grupo" name="tipo_grupo" required>
        <option value="1">Terceiros</option>
        <option value="2">Funcionário</option>
        <option value="3">Convidado</option>
    </select>
</div>

<div class="form-group">
    <label for="bol_ativo">Status</label>
    <select class="form-control" id="bol_ativo" name="bol_ativo" required>
        <option value="1">Ativo</option>
        <option value="2">Inativo</option>
    </select>
</div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
