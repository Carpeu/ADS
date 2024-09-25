<?php
include 'conexao.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "SELECT FROM pessoa";
    $conn->query($sql);
    header("Location: listar_pessoa.php");
    exit;
}

$result = $conn->query("SELECT * FROM pessoa");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Pessoas</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Listagem de Pessoas</h1>
        <a href="add_pessoa.php" class="btn btn-success mb-3">Adicionar Pessoa</a>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Tipo</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['nome_pessoa']; ?></td>
                    <td><?php echo $row['cpf_pessoa']; ?></td>
                    <td><?php echo $row['telefone']; ?></td>
                    <td><?php echo $row['tipo_pessoa']; ?></td>
                    <td><?php echo $row['bol_ativo']; ?></td>
                    <td>
                        <a href="editar_pessoa.php?id=<?php echo $row['idPessoa']; ?>" class="btn btn-primary btn-sm">Editar</a>
                       
                        <a href="excluir_pessoa.php?id=<?php echo $row['idPessoa']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este grupo?');">Excluir</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
