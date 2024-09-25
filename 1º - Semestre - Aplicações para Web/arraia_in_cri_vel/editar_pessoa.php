<?php
include 'conexao.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM pessoa WHERE idPessoa=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_pessoa'];
    $cpf = $_POST['cpf_pessoa'];
    $telefone = $_POST['telefone'];
    $tipo_pessoa = $_POST['tipo_pessoa'];
    $bol_ativo = $_POST['bol_ativo'];

    $sql = "UPDATE pessoa SET nome='$nome', cpf=$cpf, telefone=$telefone, telefone=$telefone, tipo_pessoa=$tipo_pessoa, bol_ativo=$bol_ativo WHERE id=$id";
    $conn->query($sql);
    
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pessoa</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Pessoa</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome_pessoa" name="nome_pessoa" value="<?php echo $row['nome_pessoa']; ?>" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="number" class="form-control" id="cpf_pessoa" name="cpf_pessoa" value="<?php echo $row['cpf_pessoa']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="number" class="form-control" id="telefone" name="telefone" value="<?php echo $row['telefone']; ?>" required>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo</label>
                <select class="form-control" id="tipo_pessoa" name="tipo_pessoa" required>
                    <option value="1" <?php if($row['tipo_pessoa'] == '1') echo 'selected'; ?>>Funcionário</option>
                    <option value="2" <?php if($row['tipo_pessoa'] == '2') echo 'selected'; ?>>Cliente</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bol_ativo">Status</label>
                <select class="form-control" id="bol_ativo" name="bol_ativo" required>
                    <option value="1" <?php if($row['bol_ativo'] == '1') echo 'selected'; ?>>Ativo</option>
                    <option value="0" <?php if($row['bol_ativo'] == '0') echo 'selected'; ?>>Desativado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
