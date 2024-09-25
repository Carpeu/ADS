<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_pessoa'];
    $cpf = $_POST['cpf_pessoa'];
    $telefone = $_POST['telefone'];
    $tipo_pessoa = $_POST['tipo_pessoa'];
    $bol_ativo = $_POST['bol_ativo'];
    $sql = "INSERT INTO pessoa (nome_pessoa, cpf_pessoa, telefone, tipo_pessoa, bol_ativo) VALUES ('$nome', $cpf, $telefone, $tipo_pessoa, $bol_ativo)";
    $conn->query($sql);
    header("Location: listar_pessoa.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pessoa</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Adicionar Pessoa</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome_pessoa" name="nome_pessoa" placeholder="Digite o nome" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="number" class="form-control" id="cpf_pessoa" name="cpf_pessoa" placeholder="Digite o CPF" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="number" class="form-control" id="telefone" name="telefone" placeholder="Digite o Telefone" required>
            </div>  
            <div class="form-group">
                <label for="tipo">Status</label>
                <select class="form-control" id="bol_ativo" name="bol_ativo" required>
                    <option value="1">Funcionário</option>
                    <option value="2">Cliente</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo">Status</label>
                <select class="form-control" id="tipo_pessoa" name="tipo_pessoa" required>
                    <option value="1">Ativo</option>
                    <option value="0">Desativado</option>
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
