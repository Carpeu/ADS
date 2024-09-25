<?php
include 'conexao.php';

$result = $conn->query("SELECT * FROM Grupo");

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Grupos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Listagem de Grupos</h1>
        <a href="add_grupo.php" class="btn btn-success mb-3">Adicionar Grupo</a>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Tipo de Grupo</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?php echo $row['nome_grupo']; ?></td>
    <td><?php echo $row['desc_grupo']; ?></td>
    <td>
        <?php
        // Mapeamento dos valores do tipo de grupo
        $tipo_grupo = '';
        switch ($row['tipo_grupo']) {
            case 1:
                $tipo_grupo = 'Terceiros';
                break;
            case 2:
                $tipo_grupo = 'Funcionários';
                break;
            case 3:
                $tipo_grupo = 'Convidados';
                break;
            default:
                $tipo_grupo = 'Desconhecido';
                break;
        }
        echo $tipo_grupo;
        ?>
    </td>
    <td>
        <?php echo $row['bol_ativo'] == 1 ? 'Ativo' : 'Inativo'; ?>
    </td>
    <td>
        <a href="editar_grupo.php?id=<?php echo $row['idGrupo']; ?>" class="btn btn-primary btn-sm">Editar</a>
        <a href="excluir_grupo.php?idGrupo=<?php echo $row['idGrupo']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este grupo?');">Excluir</a>
    </td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
